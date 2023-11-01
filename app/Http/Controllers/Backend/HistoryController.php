<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ClientRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Expense;
use App\Models\Sale;
use App\Models\Shed;
use App\Services\Backend\historyService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class historyController extends Controller
{
    use JsonResponse;

    protected $historyService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(historyService $historyService)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->historyService = $historyService;
    }

    /**
     * Display Mortality Weekly history.
     */
    public function getMortalityWeeklyhistory()
    {
        $companies = Company::get();
        return view('backend.history.mortality_weekly_history', compact('companies'));
    }

    public function showMortalityWeeklyhistory(Request $request)
    {
        $validatedData = $request->validate([
            'company_id_history' => 'required',
            'shed_id' => 'required'
        ]);

        $shed = Shed::where('company_id', $request->company_id_history)->where('is_active', 0)->where('id', $request->shed_id)->first();
        $groupedData = $this->historyService->showMortalityWeeklyhistory($request);
        // dd($shed);
        return view('backend.history.mortality_view_weekly_history', compact('groupedData', 'shed'));
    }


    /**
     * Display Feeds weekly history.
     */
    public function getFeedWeeklyhistory()
    {
        $companies = Company::get();
        return view('backend.history.feed_weekly_history', compact('companies'));
    }

    public function showFeedWeeklyhistory(Request $request)
    {
        $validatedData = $request->validate([
            'company_id_history' => 'required',
            'shed_id' => 'required'
        ]);

        $shed = Shed::where('company_id', $request->company_id_history)->where('is_active', 0)->where('id', $request->shed_id)->first();
        $groupedData = $this->historyService->showFeedWeeklyhistory($request);
        return view('backend.history.feed_view_weekly_history', compact('groupedData', 'shed'));
    }

    public function getExpenseWeeklyhistory()
    {
        $companies = Company::get();
        return view('backend.history.expense_weekly_history', compact('companies'));
    }


    public function showExpenseWeeklyhistory(Request $request)
    {
        $validatedData = $request->validate([
            'company_id_history' => 'required',
            'shed_id' => 'required'
        ]);

        $groupedData = $this->historyService->showExpenseWeeklyhistory($request);
        return view('backend.history.expense_view_weekly_history', compact('groupedData'));
    }

    public function getSalesTotalhistory()
    {
        $companies = Company::get();
        return view('backend.history.sales_total_history', compact('companies'));
    }


    public function showSalesTotalhistory(Request $request)
    {
        $validatedData = $request->validate([
            'company_id_history' => 'required',
            'shed_id' => 'required'
        ]);

        $expenses = Expense::where('shed_id', $request->shed_id)->get();
        $total_expense = $expenses->sum(function ($expense) {
            return $expense->price;
        });

        $shed = Shed::where('id', $request->shed_id)->first();
        $groupedData = $this->historyService->showSalestotalhistory($request);
        return view('backend.history.sales_view_total_history', compact('groupedData', 'shed', 'total_expense'));
    }

}

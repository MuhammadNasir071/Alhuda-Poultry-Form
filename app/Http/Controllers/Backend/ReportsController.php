<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ClientRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Expense;
use App\Models\Sale;
use App\Models\Shed;
use App\Services\Backend\ReportsService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    use JsonResponse;

    protected $reportService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportsService $reportService)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->reportService = $reportService;
    }

    /**
     * Display Mortality Weekly report.
     */
    public function getMortalityWeeklyReport()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.reports.mortality_weekly_report', compact('companies'));
    }

    public function showMortalityWeeklyReport(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required',
            'shed_id' => 'required'
        ]);

        $shed = Shed::where('company_id', $request->company_id)->where('is_active', 1)->where('id', $request->shed_id)->first();
        $groupedData = $this->reportService->showMortalityWeeklyReport($request);
        return view('backend.reports.mortality_view_weekly_report', compact('groupedData', 'shed'));
    }


    /**
     * Display Feeds weekly reports.
     */
    public function getFeedWeeklyReport()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.reports.feed_weekly_report', compact('companies'));
    }

    public function showFeedWeeklyReport(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required',
            'shed_id' => 'required'
        ]);

        $shed = Shed::where('company_id', $request->company_id)->where('is_active', 1)->where('id', $request->shed_id)->first();
        $groupedData = $this->reportService->showFeedWeeklyReport($request);
        return view('backend.reports.feed_view_weekly_report', compact('groupedData', 'shed'));
    }

    public function getExpenseWeeklyReport()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.reports.expense_weekly_report', compact('companies'));
    }


    public function showExpenseWeeklyReport(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required',
            'shed_id' => 'required'
        ]);

        $groupedData = $this->reportService->showExpenseWeeklyReport($request);
        return view('backend.reports.expense_view_weekly_report', compact('groupedData'));
    }

    public function getSalesTotalReport()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.reports.sales_total_report', compact('companies'));
    }


    public function showSalesTotalReport(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required',
            'shed_id' => 'required'
        ]);

        $expenses = Expense::where('shed_id', $request->shed_id)->get();
        $total_expense = $expenses->sum(function ($expense) {
            return $expense->price;
        });

        $shed = Shed::where('id', $request->shed_id)->first();
        $groupedData = $this->reportService->showSalestotalReport($request);
        return view('backend.reports.sales_view_total_report', compact('groupedData', 'shed', 'total_expense'));
    }

}

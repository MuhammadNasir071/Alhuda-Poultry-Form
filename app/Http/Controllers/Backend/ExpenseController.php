<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ExpenseRequest;
use App\Http\Requests\Backend\UpdateExpenseRequest;
use App\Models\Company;
use App\Services\Backend\ExpenseService;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    use JsonResponse;

    protected $expenseService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExpenseService $expenseService)
    {
        $this->middleware('auth');
        $this->expenseService = $expenseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = $this->expenseService->getExpense();
        return view('backend.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('is_active', 1)->get();
        $expensetypes = ExpenseType::all();
        return view('backend.expenses.create',compact('companies','expensetypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $this->expenseService->store($request);
        return $this->success('Expense added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('backend.expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $expensetypes = ExpenseType::all();
        return view('backend.expenses.edit', compact('expense','expensetypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $this->expenseService->update($request, $expense);
        return $this->success('Expense updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        try {
            $expense->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Expense not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}

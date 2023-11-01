<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ExpenseRequest;
use App\Models\ExpenseType;
use App\Models\Shed;
use App\Services\Backend\ExpenseService;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseTypeController extends Controller
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
        $expense_types = $this->expenseService->getExpenseTypes();
        return view('backend.expense_type.index', compact('expense_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.expense_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ExpenseType::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.expensetype.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $expense_type = ExpenseType::find($id);
            $expense_type->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Shed not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}

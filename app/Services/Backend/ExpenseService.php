<?php

namespace App\Services\Backend;

use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Support\Str;

class ExpenseService
{
    public function getExpense()
    {
        return Expense::whereHas('company', function ($query) {
            $query->where('is_active', 1);
        })->whereHas('sheds', function ($query) {
            $query->where('is_active', 1);
        })->get();
    }

    public function store($request)
    {
        Expense::create([
            'company_id' => $request->company_id,
            'shed_id' => $request->shed_id,
            'invoice_no' => $request->invoice_no,
            'expense_type_id' => $request->expense_type,
            'expense_detail' => $request->expense_detail,
            'quantity' => $request->quantity,
            'quantity_type' => $request->quantity_type,
            'price' => $request->price,
            'date' => $request->date,
            'agency' => $request->agency,
        ]);
    }

    public function update($request, $expense)
    {
        $expense->update([
            'invoice_no' => $request->invoice_no,
            'expense_type_id' => $request->expense_type,
            'expense_detail' => $request->expense_detail,
            'quantity' => $request->quantity,
            'quantity_type' => $request->quantity_type,
            'price' => $request->price,
            'date' => $request->date,
            'agency' => $request->agency,
        ]);
    }

    public function getExpenseTypes(){
        return ExpenseType::all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    //
    public function Index()
    {
        $allExpenses = Expense::all();
        return view('expenses');
    }
    public function showExpenses()
    {
        $allExpenses = Expense::all();
        return redirect('/expenses', compact('allExpenses'));
    }

    public function addExpense()
    {
        Expense::create(request(['expense', 'amount', 'category', 'paid', 'user', 'due date']));
        return redirect('/expenses');
    }
}

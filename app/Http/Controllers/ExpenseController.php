<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{
    //
    public function getIndex()
    {
        $allExpenses = Expense::all();
        return view('expenses', compact('allExpenses'));
    }

    public function addExpense(Request $request)
    {
        $request->validate([
            'expense'=> 'required',
            'amount'=> 'required'
        ]);

        Expense::create(request(['expense', 'amount', 'category', 'paid', auth::user()->name ]));
        return redirect('/expenses');
    }
}

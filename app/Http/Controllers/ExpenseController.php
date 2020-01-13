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
        $allExpenses = Expense::paginate(5);
        return view('expenses', compact('allExpenses'));
    }

    public function addExpense(Request $request)
    {
        $request->validate([
            'expense'=> 'required',
            'amount'=> 'required'
        ]);

        Expense::create(request(['expense', 'amount', 'category', 'duedate','paid', auth::user()->name ]));
        return redirect('/expenses');
    }

    public function deleteExpense($id){
        Expense::destroy($id);
        return redirect('/expenses');
    }

    public function editExpense($id){
        $allExpenses = Expense::get();
        $expense = Expense::find($id);
        return view('/expenseEdit', ['expense' => $expense]);
    }

    public function saveExpense(Request $request, $id)
    {
        $request->validate([
            'expense'=> 'required',
            'amount'=> 'required'
        ]);

        $expense = Expense::find($id);

        $expense->expense = $request->expense;
        $expense->amount = $request->amount;
        $expense->category = $request->category;
        $expense->duedate = $request->duedate;
        $expense->paid = $request->paid;
        $expense->save();

        return redirect('/expenses');
    }

//    public function searchExpense(){
//        $search = \request('search');
//        dd($search);
//        $result = Expense::where('expense', $search)->first();
//        return view('/result', ['search' => $result]);
//    }
}

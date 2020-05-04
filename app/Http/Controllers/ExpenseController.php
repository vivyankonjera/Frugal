<?php

namespace App\Http\Controllers;

use App\Mail\Report;
use App\Settings;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{
    //
    public function getIndex()
    {
        $allExpenses = Expense::where('user', auth::user()->email )->paginate(5);
        return view('expenses', compact('allExpenses'));
    }

    public function addExpense(Request $request)
    {
        $request->validate([
            'expense'=> 'required',
            'amount'=> 'required'
        ]);

        $expense = new Expense;
        $expense->expense = $request->expense;
        $expense->amount = $request->amount;
        $expense->category = $request->category;
        $expense->duedate = $request->duedate;
        $expense->paid = $request->paid;
        $expense->user = auth::user()->email;
        $expense->save();

        $userSettings = Settings::where('user', auth::user()->email)->first();
        if ($userSettings->reminders == 'enabled' && request()->paid == 'Unpaid') {
            $this->emailReminder($userSettings->reminderFrequency, $expense, $userSettings->reminders);
        }
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

    public function emailReminder($reminderFreq, $expense){
            $start_date = strtotime(date("y/m/d"));
            $end_date = strtotime($expense->duedate);
            $timeLeft = ($end_date - $start_date) / 60 / 60 / 24;

            $expenseReminder = $expense;
            \Mail::to(Auth::user()->email)->send(new Report($expenseReminder));
    }

    public function searchExpense(){
        $search = \request('search');
        $result = Expense::where('expense', $search)->get();
        return view('/result', ['search' => $result]);
    }
}

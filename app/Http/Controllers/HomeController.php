<?php

namespace App\Http\Controllers;

use App\Mail\Report;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->emailReminder(2);

        $categoryTotals = [
            $this->calculateCategory("Mortgage/Rent"),
            $this->calculateCategory("Transportation"),
            $this->calculateCategory("Insurance"),
            $this->calculateCategory("Loans"),
            $this->calculateCategory("Leisure"),
            $this->calculateCategory("Food"),
            $this->calculateCategory("Misc"),

            ];


        $upcomingExpense = $this->sortUpcomingExpenses();

        return view('home', compact('upcomingExpense'), compact('categoryTotals'));
    }

    public function sortUpcomingExpenses(){
        $upcomingExpense = Expense::where([

            ['user', auth::user()->email],
            ['paid', "Unpaid"]

        ])->get();

        $collection = Collect($upcomingExpense);
        $sorted = $collection->sortBy('duedate');
        $sorted->values()->all();


        return $sorted;
    }

    public function payExpense($id){

        $expense = Expense::find($id);

        $expense->paid = "Paid";
        $expense->save();
        return redirect('/home');
    }

    public function calculateCategory($category){
        $expenseCat = Expense::where([

            ['category', $category],
            ['user', auth::user()->email]

        ])->get();
        $amounts = array();

        foreach($expenseCat as $catItem) {
            $amounts[] = $catItem->amount;
        }

        $collection = Collect($amounts)->sum();

        return $collection;
    }

    public function emailReminder($reminderFreq){
        $upcomingExpenses = $this->sortUpcomingExpenses();
        $start_date = strtotime(date("y/m/d"));
        foreach($upcomingExpenses as $expense){
            $end_date = strtotime($expense->duedate);
            $timeLeft = ($end_date - $start_date)/60/60/24;
            if ($timeLeft < $reminderFreq){
                \Mail::to(Auth::user()->email)->send(new Report);
            }
        }
    }


}

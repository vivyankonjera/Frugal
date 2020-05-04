<?php

namespace App\Http\Controllers;

use App\budgets;
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

        $categoryTotals = [
            $this->calculateCategory("Mortgage/Rent"),
            $this->calculateCategory("Transportation"),
            $this->calculateCategory("Insurance"),
            $this->calculateCategory("Loans"),
            $this->calculateCategory("Leisure"),
            $this->calculateCategory("Food"),
            $this->calculateCategory("Misc"),

            ];

        $budgetTotals = [
            $this->budgets("Mortgage/Rent"),
            $this->budgets("Transportation"),
            $this->budgets("Insurance"),
            $this->budgets("Loans"),
            $this->budgets("Leisure"),
            $this->budgets("Food"),
            $this->budgets("Misc"),
        ];


        $upcomingExpense = $this->sortUpcomingExpenses();

        return view('home', compact('upcomingExpense'), compact('categoryTotals', 'budgetTotals'));
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

    public function budgets($category){
        $budgets = budgets::where([

            ['user', auth::user()->email],
            ['category', $category]

        ])->get();

        $amounts = array();

        foreach($budgets as $budItem) {
            $amounts[] = $budItem->budget;
        }

        $collection = Collect($amounts)->sum();

        return $collection;
    }

    public function payExpense($id){

        $expense = Expense::find($id);

        $expense->paid = "Paid";
        $expense->save();
        return redirect('/home');
    }

    public function addBudget(Request $request)
    {
        $request->validate([
            'budget'=> 'required',
        ]);

        $budgets = budgets::where([

            ['user', auth::user()->email],
            ['category', $request->category]

        ])->first();

        if ($budgets){
            $budgets->category = $request->category;
            $budgets->budget = $request->budget;
            $budgets->user = auth::user()->email;
            $budgets->save();
        }

        else {
            $budget = new budgets();
            $budget->category = $request->category;
            $budget->budget = $request->budget;
            $budget->user = auth::user()->email;
            $budget->save();
        }
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




}

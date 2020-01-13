@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white", style="background-color: #1d643b;">Add New Expense</div>

                    <div class="card-body">
                        <form action="/expenses" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="expenseInput">Expense</label>
                                <input type="text" class="form-control" id="expenseInput" name="expense" placeholder="Student Loan Repayment">

                                <label for="amountInput">Amount (£)</label>
                                <input type="text" class="form-control" id="amountInput" name="amount" placeholder="152">

                                <label for="categorySelect">Category</label>
                                <select class="form-control" id="categorySelect" name="category" >
                                    <option selected>Loans</option>
                                    <option>Transportation</option>
                                    <option>Insurance</option>
                                    <option>Mortgage/Rent</option>
                                    <option>Leisure</option>
                                    <option>Food</option>
                                    <option>Misc</option>
                                </select>

                                <label for="dueDateInput">Due Date</label>
                                <input type="date" class="form-control" id= "dueDateInput" name="duedate" placeholder="YYYY/MM/DD">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paid" id="unpaidInput" value="Unpaid" checked>
                                <label class="form-check-label" for="unpaidInput">
                                    Unpaid
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paid" id="paidInput" value="Paid">
                                <label class="form-check-label" for="paidInput">
                                    Paid
                                </label>
                            </div>


                            <button type="submit" class="btn btn-light float-right">add Expense</button>

                        </form>
                        <text style="color: red">@Error('expense'){{$message}}@enderror<br></text>
                        <text style="color: red">@Error('amount'){{$message}}@enderror</text>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white", style="background-color: #1d643b;">Expenses</div>

                    <div class="card-body">
                        <form action="/?search=" method="POST">
                        <div>
                            <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search expense...">
                            <button type="submit" class="btn btn-light float-right">Search</button>
                        </div>
                        </form>
                        <text style="color: red">@Error('Search term'){{$message}}@enderror</text>
                        </div>
                    <div class="container">
                        <table class="table table-hover" >
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Expense</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Category</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($allExpenses as $expense)
                                <tr>
                                    <td>{{$expense->expense}}</td>
                                    <td>£{{$expense->amount}}</td>
                                    <td>{{$expense->category}}</td>
                                    <td>{{$expense->duedate}}</td>
                                    <td>{{$expense->paid}}</td>
                                    <td><a href="/edit/{{$expense->id}}" style="color:slategray" >Edit</a></td>
                                    <td><a href="/delete/{{$expense->id}}" style="color: red" >Delete</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        {{ $allExpenses -> links () }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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


                            <button type="submit" class="btn btn-light float-right">Save</button>

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

                        <div class="form-group form-inline" style="width: 40%">
                            <select class="form-control" id="sortSelect" >
                                <option selected>Low - High</option>
                                <option>Unpaid Expenses</option>
                                <option>Category</option>
                                <option>High - Low</option>
                            </select>

                            <button type="button" class="btn btn-light">Sort</button>
                        </div>

                        <table class="table" >
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Expense</th>
                                <th scope="col">Amount (£)</th>
                                <th scope="col">Category</th>
                                <th scope="col">Paid</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($allExpenses as $expense)
                                <tr>
                                    <td>{{$expense->expense}}</td>
                                    <td>{{$expense->amount}}</td>
                                    <td>{{$expense->category}}</td>
                                    <td>{{$expense->paid}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-light">Edit</button>
                        <button type="button" class="btn btn-light bg-danger text-white">Delete</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

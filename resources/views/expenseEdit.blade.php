@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white", style="background-color: #1d643b;">Edit Expense</div>

                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="expenseInput">Expense</label>
                                <input type="text" class="form-control" id="expenseInput" name="expense"  value={{$expense->expense}}>

                                <label for="amountInput">Amount (£)</label>
                                <input type="text" class="form-control" id="amountInput" name="amount"  value={{$expense->amount}}>

                                <label for="categorySelect">Category</label>
                                <select class="form-control" id="categorySelect" name="category" >
                                    <option selected>{{$expense->category}}</option>
                                    <option>Loans</option>
                                    <option>Transportation</option>
                                    <option>Insurance</option>
                                    <option>Mortgage/Rent</option>
                                    <option>Leisure</option>
                                    <option>Food</option>
                                    <option>Misc</option>
                                </select>

                                <label for="dueDateInput">Due Date</label>
                                <input type="date" class="form-control" id= "dueDateInput" name="duedate" value={{$expense->duedate}}>
                            </div>

                            @if($expense->paid == "Unpaid")
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
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paid" id="unpaidInput" value="Unpaid" >
                                    <label class="form-check-label" for="unpaidInput">
                                        Unpaid
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paid" id="paidInput" value="Paid" checked>
                                    <label class="form-check-label" for="paidInput">
                                        Paid
                                    </label>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-light btn-outline-success float-right">Save</button>
                            <a href="/expenses">
                            <button type="" class="btn btn-light btn-outline-danger float-right">cancel</button>
                            </a>
                        </form>
                        <text style="color: red">@Error('expense'){{$message}}@enderror<br></text>
                        <text style="color: red">@Error('amount'){{$message}}@enderror</text>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

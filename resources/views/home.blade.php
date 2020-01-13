@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #1d643b;">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="card" style="width: content-box;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Mortgage/Rent</li>
                                <li class="list-group-item">Transportation</li>
                                <li class="list-group-item">Insurance</li>
                                <li class="list-group-item">Loans</li>
                                <li class="list-group-item">Leisure</li>
                                <li class="list-group-item">Food</li>
                                <li class="list-group-item">Misc</li>
                            </ul>
                        </div>

                        <a href="/expenses">
                        <button type="button" class="btn btn-light btn-md btn-block">View All Expenses</button>
                        </a>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white", style="background-color: #1d643b;">Add New Expense</div>

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="expenseInput">Expense</label>
                            <input type="text" class="form-control" id="expenseInput" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="amountInput">Amount</label>
                            <input type="integer" class="form-control" id="amountInput" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="categorySelect">Category</label>
                            <select class="form-control" id="categorySelect" >
                                <option>Mortgage/Rent</option>
                                <option>Transportation</option>
                                <option>Insurance</option>
                                <option>Loans</option>
                                <option>Leisure</option>
                                <option>Food</option>
                                <option>Misc</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="unpaid" id="unpaidInput" value="option1" checked>
                            <label class="form-check-label" for="unpaidInput">
                                Unpaid
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paid" id="paidInput" value="option2">
                            <label class="form-check-label" for="paidInput">
                                Paid
                            </label>
                        </div>

                    <button type="button" class="btn btn-light float-right">Add Expense</button>

                    </form>

                </div>
            </div>
        </div>
</div>
@endsection

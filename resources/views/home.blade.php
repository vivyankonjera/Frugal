@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-white" style="background-color: #1d643b;">Welcome</div>

                <div class="card-body">
                    <h3>Hello {{auth::user()->name}}</h3>
                    <p>
                        Welcome to your Frugal dashboard! From here you can view a breakdown of your expenses by category,
                        as well as any upcoming unpaid expenditure.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white" style="background-color: #1d643b;">Breakdown</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="card" style="width: content-box;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Mortgage/Rent
                                    <span class="badge float-right text-white" style="background-color: darkred">£{{$categoryTotals[0]}}</span>
                                </li>
                                <li class="list-group-item">
                                    Transportation
                                    <span class="badge float-right text-white" style="background-color: orange">£{{$categoryTotals[1]}}</span>
                                </li>
                                <li class="list-group-item">
                                    Insurance
                                    <span class="badge float-right text-white" style="background-color: olive">£{{$categoryTotals[2]}}</span>
                                </li>
                                <li class="list-group-item">
                                    Loans
                                    <span class="badge float-right text-white" style="background-color: seagreen">£{{$categoryTotals[3]}}</span>
                                </li>
                                <li class="list-group-item">
                                    Leisure
                                    <span class="badge float-right text-white" style="background-color: cadetblue">£{{$categoryTotals[4]}}</span>
                                </li>
                                <li class="list-group-item">
                                    Food
                                    <span class="badge float-right text-white" style="background-color: palevioletred">£{{$categoryTotals[5]}}</span>
                                </li>
                                <li class="list-group-item">
                                    Misc
                                    <span class="badge badge-primary badge float-right">£{{$categoryTotals[6]}}</span>
                                </li>
                            </ul>
                        </div>

                        <a href="/expenses">
                        <button type="button" class="btn btn-light btn-md btn-block">View All Expenses</button>
                        </a>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-white" style="background-color: #1d643b;">Upcoming expenses</div>

                <div class="card-body">
                    <div class="container">
                        <table class="table table-hover" >
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Expense</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($upcomingExpense as $expense)
                                <tr>
                                    <td>{{$expense->expense}}</td>
                                    <td>£{{$expense->amount}}</td>
                                    <td>{{$expense->duedate}}</td>
                                    <td>{{$expense->paid}}</td>
                                    <td><a href="/pay/{{$expense->id}}" style="color:green" >Settle</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>

</div>
@endsection

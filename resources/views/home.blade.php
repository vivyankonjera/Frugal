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
                                <th scope="col">Paid</th>
                            </tr>
                            </thead>
                            <tbody>

{{--                            @foreach ($allExpenses as $expense)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$expense->expense}}</td>--}}
{{--                                    <td>{{$expense->amount}}</td>--}}
{{--                                    <td>{{$expense->duedate}}</td>--}}
{{--                                    <td>{{$expense->paid}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}

                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>

</div>
@endsection

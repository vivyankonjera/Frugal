@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-white" style="background-color: #1d643b;">Welcome</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Hello {{auth::user()->name}}</h3>
                    <p>
                        Welcome to your Frugal dashboard! From here you can view a breakdown of your expenses by category,
                        as well as any upcoming unpaid expenditure.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-6">
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

        <div class="col-md-3">
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
                        <button type="button" class="btn btn-outline-success btn-md btn-block">View All Expenses</button>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 15px">
                <div class="card-header text-white" style="background-color: #1d643b;">Breakdown II</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <canvas id="budgetBarChart"></canvas>
                        </div>

                        <div class="col-md-6" style="padding-bottom: 40px">
                            <canvas id="catChart"></canvas>
                        </div>

                        <form class="form-inline" action="/home" method="post">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="categorySelect" style="padding: 10px">Category</label>
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

                            <div class="form-group mx-sm-3 mb-2">
                                <label for="budgetfield" class="sr-only">Budget</label>
                                <input type="" class="form-control" id="budgetAmount" name="budget" >
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Budget</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        let catChart = document.getElementById('catChart').getContext('2d');

        Chart.defaults.global.defaultFontFamily = 'Nunito';
        Chart.defaults.global.defaultFontSize = 14;

        let currentSpendPie = new Chart(catChart, {
            type: 'doughnut',
            data:{
                labels:['Mortgage/Rent', 'Travel', 'insurance','Loans','Leisure','Food','Misc' ],
                datasets:[{
                    label:'Spent',
                    data:[
                        {{$categoryTotals[0]}},
                        {{$categoryTotals[1]}},
                        {{$categoryTotals[2]}},
                        {{$categoryTotals[3]}},
                        {{$categoryTotals[4]}},
                        {{$categoryTotals[5]}},
                        {{$categoryTotals[6]}}
                    ],

                    backgroundColor: [
                        "darkred",
                        "orange",
                        "olive",
                        "seagreen",
                        "cadetblue",
                        "palevioletred",
                        "cornflowerblue"
                    ]
                }]
            },
            options:{
                title:{
                    display: true,
                    text: 'Amount spent by category'
                },
                legend:{
                    position: 'right'
                }
            },
        })

        let budChart = document.getElementById('budgetBarChart').getContext('2d');
        let currentSpendbar = new Chart(budChart, {
            type: 'horizontalBar',
            data:{
                labels:['Mortgage/Rent', 'Travel', 'insurance','Loans','Leisure','Food','Misc' ],
                datasets:[
                    {
                    data:[
                        {{$categoryTotals[0]}},
                        {{$categoryTotals[1]}},
                        {{$categoryTotals[2]}},
                        {{$categoryTotals[3]}},
                        {{$categoryTotals[4]}},
                        {{$categoryTotals[5]}},
                        {{$categoryTotals[6]}}
                    ],

                    backgroundColor: [
                        "darkred",
                        "orange",
                        "olive",
                        "seagreen",
                        "cadetblue",
                        "palevioletred",
                        "cornflowerblue"
                    ]
                    },

                    {
                        data:[
                            {{$budgetTotals[0]}},
                            {{$budgetTotals[1]}},
                            {{$budgetTotals[2]}},
                            {{$budgetTotals[3]}},
                            {{$budgetTotals[4]}},
                            {{$budgetTotals[5]}},
                            {{$budgetTotals[6]}}
                        ],

                        backgroundColor: [
                            "darkred",
                            "orange",
                            "olive",
                            "seagreen",
                            "cadetblue",
                            "palevioletred",
                            "cornflowerblue"
                        ]
                    }


                ]
            },
            options:{
                title:{
                    display: true,
                    text: 'Budget Utilisation'
                },

               legend: {
                   display: false
               }
            },
        })
    </script>
@endsection

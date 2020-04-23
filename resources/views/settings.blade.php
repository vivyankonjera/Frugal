@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white", style="background-color: #1d643b;">Settings</div>

                    <div class="card-body">
                        <form action="/settings" method="POST">
                            <label for="currencySelect">Currency</label>
                            <select class="form-control" id="currencySelect" name="currency" >
                                <option selected>GDP</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CHF</option>
                                <option>CAD</option>
                                <option>AUD</option>
                            </select>

                            <label style="padding-top: 10px">Alerts</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="textAlert">
                            <label class="form-check-label" for="textAlert">
                                Text
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="emailAlert">
                            <label class="form-check-label" for="emailAlert">
                                Email
                            </label>
                        </div>
                            <button type="submit" class="btn btn-success float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

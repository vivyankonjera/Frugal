@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white", style="background-color: #1d643b;">Settings</div>

                    <div class="card-body">
                        <form action="/settings" method="POST">

                            <label for="currencySelect" style="padding-top: 10px">Currency</label>
                            <select class="form-control" id="currencySelect" name="currency" >
                                <option selected>GDP</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CHF</option>
                                <option>CAD</option>
                                <option>AUD</option>
                            </select>

                            <label style="padding-top: 10px">Reminders</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="enableReport" value="Enable" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Enable
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="disableReport" value="Disable">
                                <label class="form-check-label" for="exampleRadios2">
                                    Disable
                                </label>
                            </div>

                            <label for="remFreqSelect" style="padding-top: 10px">Reminder occurence</label>
                            <select class="form-control" id="freqSelect" name="reminder" >
                                <option selected>1 day</option>
                                <option>2 days</option>
                                <option>1 week</option>

                            </select>
                            <button type="submit" class="btn btn-success float-right" style="margin-top: 20px">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

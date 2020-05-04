@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white", style="background-color: #1d643b;">Settings</div>

                    <div class="card-body">
                        <form method="POST">
                            @csrf
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
                                <input class="form-check-input" type="radio" name="reminders" id="enableReport" value="Enable" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Enabled
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="reminders" id="disableReport" value="Disable">
                                <label class="form-check-label" for="exampleRadios2">
                                    Disabled
                                </label>
                            </div>

                            </select>
                            <button type="submit" class="btn btn-success float-right" style="margin-top: 20px">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

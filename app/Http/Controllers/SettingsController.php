<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller{

    public function getIndex(){

        return view('settings');

    }
}

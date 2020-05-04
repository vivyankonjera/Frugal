<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller{

    public function getIndex(){

        return view('settings');

    }

    public function editSettings(Request $request){

        $settings = Settings::where('user', auth::user()->email)->first();

        $settings->user=auth::user()->email;
        $settings->currency = $request->currency;
        $settings->reminders = $request->reminders;
        $settings->reminderFrequency = $request->reminderFrequency;
        $settings->save();
        

        return view('/settings');
    }

}

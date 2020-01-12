<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //

    protected $guarded = [];
    public function pay(){
        $this->paid =  1;
        $this->save();
    }
}

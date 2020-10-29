<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function selected_days()
    {
        return $this->hasMany('App\SelectedDay');
    }
}

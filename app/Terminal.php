<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $guarded = [];

    public function fromSchedules()
    {
        return $this->hasMany('App\Schedule', 'from');
    }

    public function toSchedules()
    {
        return $this->hasMany('App\Schedule', 'to');
    }
}

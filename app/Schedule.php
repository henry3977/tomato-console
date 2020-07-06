<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Terminal;

class Schedule extends Model
{
    protected $guarded = [];

    public function getFromAttribute($value)
    {
        $terminal = new Terminal;
        return $terminal::find($value)->name;
    }

    public function getToAttribute($value)
    {
        $terminal = new Terminal;
        return $terminal::find($value)->name;
    }

    public function getTimeAttribute($value)
    {
        return date('H:i', strtotime($value));
    }
}

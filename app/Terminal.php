<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\UseScope;

class Terminal extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new UseScope);
    }

    public function fromSchedules()
    {
        return $this->hasMany('App\Schedule', 'from');
    }

    public function toSchedules()
    {
        return $this->hasMany('App\Schedule', 'to');
    }
}

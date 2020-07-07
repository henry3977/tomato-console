<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\UseScope;
use App\Terminal;

class Schedule extends Model
{
    protected $guarded = [];
    protected $appends = ['has_stop'];

    protected static function booted()
    {
        static::addGlobalScope(new UseScope);
    }
    
    public function stop()
    {
        return $this->hasOne('App\Stop');
    }

    public function scopeFromTomato($query)
    {
        return $query->select('id', 'from', 'to', 'time')
            ->where('from', 1)
            ->orderBy('time', 'ASC');
    }

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

    public function getHasStopAttribute()
    {
        $res = false;
        if ($this::with('stop')->find($this->id)->stop) $res = true;
        return $res;
    }
}

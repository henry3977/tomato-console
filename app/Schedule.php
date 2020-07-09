<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Terminal;

class Schedule extends Model
{
    protected $guarded = [];
    protected $appends = ['has_stop'];

    protected static function booted()
    {
        static::addGlobalScope('time', function (Builder $builder) {
            $builder->orderBy('time', 'ASC');
        });
    }

    public function stop()
    {
        return $this->hasOne('App\Stop');
    }

    public function scopeFromTomato($query)
    {
        return $query->where('from', 1);
    }

    public function scopeToTomato($query)
    {
        return $query->where('to', 1);
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

    public function getSchedules($to, $from)
    {
        return $this::select('id', 'from', 'to', 'time', 'use')
            ->where([
                ['to', $to],
                ['from', $from]
            ])
            ->get();
    }
}

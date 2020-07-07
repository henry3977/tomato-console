<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\UseScope;

class Terminal extends Model
{
    protected $guarded = [];

    public function scopeExceptTomato($query)
    {
        return $query->where('id', '!=', 1);
    }

    public function fromSchedules()
    {
        return $this->hasMany('App\Schedule', 'from');
    }

    public function toSchedules()
    {
        return $this->hasMany('App\Schedule', 'to');
    }

    public function getToList()
    {
        return $this::has('toSchedules')
            ->select('id', 'name')
            ->exceptTomato()
            ->get();
    }

    public function getToSchedules($to)
    {
        $terminal = $this::find($to);
        if ($terminal === null) return response()->json(['message'=> 'Not found id' ], 403);
        return $terminal->toSchedules()
            ->select('id', 'from', 'to', 'time')
            ->fromTomato()
            ->get();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function getUseToList($from)
    {
        return $this::whereHas('toSchedules', function (Builder $query) {
                $query->where('use', '=', 1);
            })
            ->select('id', 'name')
            ->where('id', '!=', 1)
            ->get();
    }

    public function getToList($from)
    {
        return $this::select('id', 'name', 'use')
            ->where('id', '!=', $from)
            ->get();
    }

    public function getUseToSchedules($to)
    {
        $terminal = $this::find($to);
        if ($terminal === null) return response()->json(['message'=> 'Not found id' ], 403);
        return $terminal->toSchedules()
            ->select('id', 'from', 'to', 'time')
            ->where('use', '=', 1)
            ->fromTomato()
            ->get();
    }
}

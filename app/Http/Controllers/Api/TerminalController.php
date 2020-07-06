<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Terminal;

class TerminalController extends Controller
{
    public function __construct(Terminal $terminal)
    {
        $this->terminal = $terminal;
    }

    public function getToList()
    {
        return $this->terminal::whereHas('toSchedules', function (Builder $query) {
                $query->where('use', '=', 1);
            })
            ->select('id', 'name')
            ->where('id', '!=', 1)
            ->get();
    }
}

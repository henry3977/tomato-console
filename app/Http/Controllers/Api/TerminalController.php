<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Terminal;

class TerminalController extends Controller
{
    public function __construct(Terminal $terminal)
    {
        $this->terminal = $terminal;
    }

    public function getToList()
    {
        return $this->terminal->getToList();
    }

    public function getToSchedules($to)
    {
        $terminal = $this->terminal::find($to);
        if ($terminal === null) return response()->json(['message'=> 'Not found id' ], 403);
        return $terminal->toSchedules()
            ->fromTomato()
            ->get();
    }
}

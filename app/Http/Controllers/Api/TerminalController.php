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
        return $this->terminal::has('toSchedules')
            ->select('id', 'name')
            ->where('id', '!=', 1)
            ->get();
    }
}

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

    public function getFromList()
    {
        return $this->terminal::has('fromSchedules')->get();
    }
}

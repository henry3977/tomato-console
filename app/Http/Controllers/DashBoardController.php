<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminal;

class DashBoardController extends Controller
{
    public function __construct(Terminal $terminal)
    {
        $this->terminal = $terminal;
    }

    public function view()
    {
        return view('dashboard', [
            'terminals' => $this->terminal::where('id', '!=', 1)->get()
        ]);
    }
}

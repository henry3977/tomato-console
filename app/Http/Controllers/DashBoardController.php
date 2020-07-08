<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddTerminalPost;
use App\Http\Requests\AddSchedulePost;
use App\Terminal;
use App\Schedule;
use App;

class DashBoardController extends Controller
{
    public function __construct(Terminal $terminal, Schedule $schedule)
    {
        $this->middleware('auth');
        $this->terminal = $terminal;
        $this->schedule = $schedule;
    }

    public function view()
    {
        return view('dashboard', [
            'terminals' => $this->terminal::select('id', 'name', 'use')
                ->exceptTomato()
                ->get()
        ]);
    }

    public function getToSchedules($id)
    {
        return $this->terminal::find($id)
            ->toSchedules()
            ->select('id', 'from', 'to', 'time', 'use')
            ->fromTomato()
            ->get();
    }

    public function getFromSchedules($id)
    {
        return $this->terminal::find($id)
            ->fromSchedules()
            ->select('id', 'from', 'to', 'time', 'use')
            ->toTomato()
            ->get();
    }

    public function setUseTerminal(Request $request)
    {
        $terminal = $this->terminal::find($request->id);
        $terminal->use = $request->use;
        return $terminal->save();
    }

    public function setUseSchedule(Request $request)
    {
        $schedule =  $this->schedule::find($request->id);
        $schedule->use = $request->use;
        return $schedule->save();
    }

    public function addTerminal(AddTerminalPost $request)
    {
        return $this->terminal->create([
            'name' => $request->name,
            'use' => 0
        ]);
    }

    public function addToSchedule(AddSchedulePost $request)
    {
        return $this->terminal::find($request->term_id)
            ->toSchedules()
            ->create([
                'from' => 1,
                'time' => $request->time,
                'use' => 0
            ]);
    }

    public function addFromSchedule(AddSchedulePost $request)
    {
        return $this->terminal::find($request->term_id)
            ->fromSchedules()
            ->create([
                'to' => 1,
                'time' => $request->time,
                'use' => 0
            ]);
    }

    public function delTerminal($id)
    {
        $terminal = $this->terminal::find($id);
        $terminal->toSchedules()->delete();
        $terminal->fromSchedules()->delete();
        $terminal->delete();
    }

    public function delSchedule($id)
    {
        $schedule = $this->schedule::find($id);
        $schedule->delete();
    }
}

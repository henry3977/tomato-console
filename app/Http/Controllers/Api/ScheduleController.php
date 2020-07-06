<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function getList($to)
    {
        return $this->schedule::select('id', 'from', 'to', 'time')
            ->where([
                ['from', 1],
                ['to', $to]
            ])
            ->orderBy('time', 'ASC')
            ->get();
    }
}

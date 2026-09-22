<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use App\Models\Team;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index', [
            'teams' => Team::active()->get(),
            'stats' => Stat::active()->get(),
        ]);
    }
}

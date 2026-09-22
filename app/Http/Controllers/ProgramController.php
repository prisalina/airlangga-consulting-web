<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::active()->paginate(12);

        return view('programs.index', compact('programs'));
    }

    public function show(Program $program)
    {
        abort_unless($program->is_active, 404);

        return view('programs.show', compact('program'));
    }
}

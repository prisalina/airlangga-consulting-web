<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::active()->paginate(9);

        return view('case-studies.index', compact('caseStudies'));
    }

    public function show(CaseStudy $caseStudy)
    {
        abort_unless($caseStudy->is_active, 404);

        return view('case-studies.show', compact('caseStudy'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Post;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Stat;
use App\Models\Team;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'services' => Service::active()->get(),
            'stats' => Stat::active()->get(),
            'teams' => Team::active()->limit(4)->get(),
            'testimonials' => Testimonial::active()->get(),
            'faqs' => Faq::active()->get(),
            'sectors' => Sector::active()->get(),
            'posts' => Post::published()->with('category')->limit(3)->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Activity;
use App\Models\Asesor;
use App\Models\Program;
use App\Models\SertifikasiSkema;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'programs'     => Program::count(),
            'skemas'       => SertifikasiSkema::count(),
            'asesors'      => Asesor::active()->count(),
            'activities'   => Activity::count(),
            'testimonials' => Testimonial::active()->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

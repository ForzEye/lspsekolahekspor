<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Activity;
use App\Models\Asesor;
use App\Models\ContactInfo;
use App\Models\Hero;
use App\Models\Program;
use App\Models\SertifikasiAlur;
use App\Models\SertifikasiSkema;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\SertifikasiStatistic;
use App\Models\SebaranPeserta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $hero        = Hero::active()->first();
        $about       = About::first();
        $programs    = SertifikasiSkema::active()->ordered()->take(3)->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $activities  = Activity::where('is_featured', true)->orderBy('order')->orderBy('date', 'desc')->take(6)->get();

        return view('pages.home', compact('hero', 'about', 'programs', 'testimonials', 'activities'));
    }

    public function profil(): View
    {
        $about  = About::first();
        $team   = TeamMember::active()->ordered()->get();
        $statistics = SertifikasiStatistic::orderBy('sort_order')->get();
        $sebarans = SebaranPeserta::where('jumlah_peserta', '>', 0)->get();

        return view('pages.profil', compact('about', 'team', 'statistics', 'sebarans'));
    }

    public function sertifikasi(): View
    {
        $skemas      = SertifikasiSkema::active()->ordered()->get();
        $alurTatap   = SertifikasiAlur::tatapMuka()->get();
        $alurJauh    = SertifikasiAlur::jarakJauh()->get();
        $asesors     = Asesor::active()->ordered()->get();

        return view('pages.sertifikasi', compact('skemas', 'alurTatap', 'alurJauh', 'asesors'));
    }

    public function kontak(): View
    {
        $contact = ContactInfo::first();

        return view('pages.kontak', compact('contact'));
    }

    public function daftar(): View
    {
        $contact = ContactInfo::first();

        return view('pages.daftar', compact('contact'));
    }

    public function gallery(): View
    {
        $activities = Activity::orderBy('order')->orderBy('date', 'desc')->paginate(12);
        return view('pages.gallery', compact('activities'));
    }

    public function sendMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:20',
            'keperluan' => 'nullable|string|max:100',
            'message'   => 'required|string|max:2000',
        ]);

        // TODO: implement mail sending in production
        return back()->with('success', 'Pesan Anda berhasil terkirim! Kami akan segera menghubungi Anda.');
    }

    public function sertifikasiDetail($id): View
    {
        $skema = SertifikasiSkema::findOrFail($id);
        return view('pages.sertifikasi_detail', compact('skema'));
    }
}

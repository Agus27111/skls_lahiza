<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\CompanyAbout;
use Illuminate\Http\Request;
use App\Models\CompanyStatistic;
use App\Models\OurPrinciple;
use App\Models\Product;
use App\Models\OurTeam;
use App\Models\Testimonial;
use App\Models\HeroSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    //
    public function index(){
        $heroSections = HeroSection::orderByDesc('id')->take(4)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();
        $testimonials = Testimonial::take(5)->get();

        return view('front.index', compact('statistics', 'principles','products', 'teams', 'testimonials', 'heroSections'));
    }

    public function team(){
        $teams = OurTeam::take(7)->get();
        $statistics = CompanyStatistic::take(4)->get();
        return view('front.team', compact('teams', 'statistics'));
    }

    public function about(){
        $products = Product::take(3)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $testimonials = Testimonial::take(5)->get();
        $abouts = CompanyAbout::take(2)->get();

        return view('front.about', compact('products', 'statistics', 'testimonials', 'abouts'));
    }

    public function blog(){
        $products = Product::take(3)->get(); //misal
        return view('front.blog', compact('products'));
    }

    public function appointment(){
        $testimonials = Testimonial::take(5)->get();
        $products = Product::take(3)->get();
        return view('front.appointment', compact('testimonials', 'products'));
    }

    public function appointment_store(StoreAppointmentRequest $request){

        $whatsappUrl = null;
        DB::transaction(function () use ($request, &$whatsappUrl) {
            $validated = $request->validated();
            $newAppointment = Appointment::create($validated);

            // Kirim pesan WhatsApp ke owner
            $ownerPhone = '6287822368008'; // Ganti dengan nomor WhatsApp owner
            $message = urlencode("Pendaftar Baru:\n"
                . "Name: {$newAppointment->name}\n"
                . "Email: {$newAppointment->email}\n"
                . "Phone: {$newAppointment->phone_number}\n"
                . "Meeting Date: {$newAppointment->meeting_at}\n"
                . "Product Interest: {$newAppointment->product->name}\n"
                . "Budget: Rp {$newAppointment->budget}\n"
                . "Brief: {$newAppointment->brief}");

            $whatsappUrl = "https://wa.me/{$ownerPhone}?text={$message}";
        });

        return redirect()->route('front.index')->with('whatsappUrl', $whatsappUrl);
    }
}

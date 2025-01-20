<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\HeroSection;
use App\Models\Testimonial;
use App\Models\CompanyAbout;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;
use App\Models\CompanyStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreAppointmentRequest;

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
        $blogs=Blog::take(10)->get();

        return view('front.index', compact('statistics', 'principles','products', 'teams', 'testimonials', 'heroSections', 'blogs'));
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

    public function blog(Request $request){
          //
          $query = Blog::query();

          // Untuk filter pencarian, jika ada
          if ($request->has('search')) {
              $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
          }

          // Ambil data blog dengan pagination
          $blogs = $query->paginate(6); // Gantilah angka 6 dengan jumlah artikel per halaman sesuai kebutuhan

          return view('front.blogs', compact('blogs'));
    }

    public function ppdb(){

    }
    public function book(){

    }

}

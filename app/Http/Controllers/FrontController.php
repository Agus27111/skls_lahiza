<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Category;
use App\Models\Appointment;
use App\Models\HeroSection;
use App\Models\Testimonial;
use App\Models\CompanyAbout;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;
use App\Models\CompanyStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Book;
use App\Models\ClassModel;
use App\Models\Ppdb;

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
            $ownerPhone = env('WHATSAPP_OWNER_PHONE');
            $message = urlencode("Pendaftar Baru:\n"
            . "Nama Lengkap: {$newAppointment->name}\n"
            . "Email: {$newAppointment->email}\n"
            . "Nomor Telepon: {$newAppointment->phone_number}\n"
            . "Tanggal Lahir: {$newAppointment->date_of_birth}\n"
            . "Tempat Lahir: {$newAppointment->birth_place}\n"
            . "Alamat: {$newAppointment->address}\n"
            . "Nama Ayah: {$newAppointment->father}\n"
            . "Nama Ibu: {$newAppointment->mother}\n"
            . "Pesan: {$newAppointment->message}\n"
            . "Jenjang: {$newAppointment->product->name}\n"
        );


            $whatsappUrl = "https://wa.me/{$ownerPhone}?text={$message}";
        });

        return redirect()->route('front.index')->with('whatsappUrl', $whatsappUrl);
    }

    public function blogs(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $author = $request->input('author');

        $blogs = Blog::select('id', 'title', 'slug', 'content', 'category_id', 'author', 'created_at')
            ->with('category')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');
            })
            ->when($category, function ($query, $category) {
                $query->whereHas('category', function($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->when($author, function ($query, $author) {
                $query->where('author', 'like', '%' . $author . '%');
            })
            ->latest() // Urutkan berdasarkan terbaru
            ->paginate(6);

        return view('front.blogs.index', [
            'title' => 'Blog',
            'blogs' => $blogs,
            'search' => $search,
        ]);
    }

    public function blogsByCategory($category, Request $request)
    {
        // Cari kategori berdasarkan slug
        $category = Category::where('slug', $category)->firstOrFail();

        // Ambil parameter pencarian jika ada
        $search = $request->input('search');

        // Query blog berdasarkan kategori dan pencarian (jika ada)
        $blogs = Blog::where('category_id', $category->id)
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(6);

        return view('front.blogs.index', [
            'title' => 'Blogs in ' . $category->name,
            'blogs' => $blogs,
            'category' => $category,
            'search' => $search,
        ]);
    }

    public function ppdb(){
        $ppdb = Ppdb::all();
        return view('front.ppdb', compact('ppdb'));
    }
    public function book(){
        $books = Book::all();
        $kelas = ClassModel::all();
        return view('front.book', compact('books', 'kelas'));
    }

}

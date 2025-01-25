<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmationMail;
use App\Http\Requests\StoreAppointmentRequest;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $appointments = Appointment::with('product') // Eager load produk
        ->orderByDesc('id')
        ->paginate(10);

    return view('admin.appointments.index', compact('appointments'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.appointments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
{
    DB::transaction(function () use ($request) {
        $validated = $request->validated();

        // Simpan ke database
        $appointment = Appointment::create($validated);

        // Ambil nama produk untuk email
        $product = Product::find($validated['product_id']);

        // Data untuk email
        $userData = array_merge($validated, ['product_name' => $product->name]);

        // Kirim email
        try {
            Mail::to($validated['email'])->send(new AppointmentConfirmationMail($userData));
            Log::info('Email berhasil dikirim ke ' . $validated['email']);
            if (Mail::failures()) {
                Log::error("Email gagal terkirim ke: " . $validated['email']);
            } else {
                Log::info('Email berhasil dikirim ke ' . $validated['email']);
            }
        } catch (\Exception $e) {
            Log::error('Gagal mengirim email ke ' . $validated['email'] . ': ' . $e->getMessage());
            throw $e; // Memastikan rollback
        }

    });

    return redirect()->back()->with('success', 'Data berhasil dikirim, dan notifikasi telah dikirim ke email Anda.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // Ambil data appointment berdasarkan ID
    $appointment = Appointment::with('product')->findOrFail($id);

    // Kirim data ke view
    return view('admin.appointments.details', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

}

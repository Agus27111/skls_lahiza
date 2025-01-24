<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePpdbRequest;
use App\Http\Requests\UpdatePpdbRequest;
use App\Models\CompanyAbout;
use App\Models\Ppdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $ppdbs = Ppdb::orderByDesc('id')->paginate(2);
         return view('admin.ppdb.index', compact('ppdbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Ppdb $ppdb)
    {
        //
        return view('admin.ppdb.create', compact('ppdb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePpdbRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

             // Memeriksa dan meng-upload image1
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('image1s', 'public');
            $validated['image1'] = $image1Path;
        }

        // Memeriksa dan meng-upload image2
        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('image2s', 'public');
            $validated['image2'] = $image2Path;
        }

        // Membuat entri baru di database
        $newDataRecord = Ppdb::create($validated);
        });

        return redirect()->route('admin.ppdb.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ppdb $ppdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ppdb $ppdb)
    {
        //
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePpdbRequest $request, Ppdb $ppdb)
    {
        //
        DB::transaction(function () use ($request, $ppdb) {
            $validated = $request->validated();

            if ($request->hasFile('image1')) {
                $image1Path = $request->file('image1')->store('image1s', 'public');
                $validated['image1'] = $image1Path;
            }

            // Memeriksa dan meng-upload image2
            if ($request->hasFile('image2')) {
                $image2Path = $request->file('image2')->store('image2s', 'public');
                $validated['image2'] = $image2Path;
            }

            $ppdb->update($validated);
        });

        return redirect()->route('admin.ppdb.index')->with('success', 'Ppdb updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ppdb $ppdb)
    {
        //
        DB::transaction(function () use ($ppdb) {
            $ppdb->delete();
        });
        return redirect()->route('admin.ppdb.index');
    }
}

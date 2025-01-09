<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatisticRequest;
use App\Http\Requests\UpdateStatiticRequest;
use App\Models\CompanyStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompanyStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $statistics = CompanyStatistic::orderByDesc('id')->paginate(10);
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        //validasi dulu di Request -> insert kepada database tertentu
        //closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath; //storage/icons/abc.jpg
            }

            $newDataRecord = CompanyStatistic::create($validated);

        });

        return redirect()->route('admin.statistics.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyStatistic $statistic)
    {
        //
        return view('admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatiticRequest $request, CompanyStatistic $statistic)
    {
        //
        $validated = $request->validated();
        // Jika ada gambar baru, simpan dan perbarui nama file icon
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $validated['icon'] = $path;
        }

        // Update data statistik
        $statistic->update($validated);

        // Redirect ke halaman yang sesuai setelah update
        return redirect()->route('admin.statistics.index')->with('success', 'Statistic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStatistic $statistic)
    {
        // delete the fil
        DB::transaction(function () use ($statistic) {
            $statistic->delete();
        });

        return redirect()->route('admin.statistics.index');
    }
}

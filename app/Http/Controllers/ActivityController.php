<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activities = Activity::orderByDesc('id')->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Activity $activity)
    {
        //
        return view('admin.activities.create', compact('activity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            if($request->hasFile('image')){
                $thumbnailPath = $request->file('image')->store('images', 'public');
                $validated['image'] = $thumbnailPath;
            }

            $newDataRecord = Activity::create($validated);
        });
        return redirect()->route('admin.activities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        //
        DB::transaction(function () use ($request, $activity) {
            $validated = $request->validated();

            if($request->hasFile('image')){
                $thumbnailPath = $request->file('image')->store('images', 'public');
                $validated['image'] = $thumbnailPath;
            }

            $activity->update($validated);
        });

        return redirect()->route('admin.activities.index')->with('success', 'Activity updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
        DB::transaction(function () use ($activity) {
            $activity->delete();
        });
        return redirect()->route('admin.activities.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            // Initialize category outside the transaction
            $category = null;

            DB::transaction(function () use ($request, &$category) {
                // Validating the request data
                $validated = $request->validated();

                // Check and create a slug if it's not provided
                if (empty($validated['slug'])) {
                    $validated['slug'] = Str::slug($validated['name']);
                }

                // Creating a new category with the validated data
                $category = Category::create($validated);
            });

            // Return response with category data after transaction
            return response()->json([
                'success' => true,
                'category' => $category,
            ]);
        } catch (\Exception $e) {
            // Handle error and log if needed
            // Log::error('Category store error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

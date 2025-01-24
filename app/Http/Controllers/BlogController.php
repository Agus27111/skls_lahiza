<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Blog::orderByDesc('id');

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $blogs = $query->paginate(10);
        $categories = Category::orderByDesc('id')->get();
        return view('admin.blogs.index', compact('blogs', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::orderByDesc('id')->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('images', 'public');
                $validated['image'] = $imagePath;
            }

            // Memastikan slug di-set dengan benar
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

            if ($request->has('category_id')) {
                $validated['category_id'] = $request->category_id;
            }

            $newDataRecord = Blog::create($validated);

        });

        return redirect()->route('admin.blogs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            abort(404); // Atau bisa redirect jika blog tidak ditemukan
        }
        return view('front.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        $categories =Category::orderByDesc('id')->get();
        return view('admin.blogs.edit', compact('categories',  'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
        DB::transaction(function () use ($request, $blog) {
            $validated = $request->validated();

            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('images', 'public');
                $validated['image'] = $imagePath;
            }

            if ($request->has('category_id')) {
                $validated['category_id'] = $request->category_id;
            }

            $blog->update($validated);

        });

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        DB::transaction(function () use ($blog) {
            $blog->delete();
        });

        return redirect()->route('admin.blogs.index');
    }
}

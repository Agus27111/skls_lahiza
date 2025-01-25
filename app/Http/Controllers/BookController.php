<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelas = ClassModel::orderByDesc('id')->paginate(10);
        $books = Book::orderByDesc('id')->paginate(10);
        return view('admin.books.index', compact('books', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = ClassModel::orderByDesc('id')->get();
        return view('admin.books.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            if ($request->hasFile('pdf')) {
                $pdfPath = $request->file('pdf')->store('pdfs', 'public'); // Simpan di folder 'pdfs'
                $validated['url'] = $pdfPath; // Gunakan kolom 'url' untuk menyimpan path PDF
            }

            if ($request->has('class_model_id')) {
                $validated['class_model_id'] = $request->class_model_id;
            }

            $newDataRecord = Book::create($validated);

        });

        return redirect()->route('admin.books.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $classes = ClassModel::orderByDesc('id')->get();
        return view('admin.books.edit', compact('book', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
        DB::transaction(function () use ($request, $book) {
            $validated = $request->validated();
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            if ($request->hasFile('pdf')) {
                $pdfPath = $request->file('pdf')->store('pdfs', 'public'); // Simpan di folder 'pdfs'
                $validated['url'] = $pdfPath; // Gunakan kolom 'url' untuk menyimpan path PDF
            }
            if ($request->hasFile('pdf')) {
                $pdfPath = $request->file('pdf')->store('pdfs', 'public'); // Simpan di folder 'pdfs'
                $validated['url'] = $pdfPath; // Gunakan kolom 'url' untuk menyimpan path PDF
            }

            if ($request->has('class_model_id')) {
                $validated['class_model_id'] = $request->class_model_id;
            }

            $book->update($validated);
        });

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        DB::transaction(function () use ($book) {
            $book->delete();
        });

        return redirect()->route('admin.books.index');
    }
}

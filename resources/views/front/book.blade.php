@extends('front.layouts.app')
@section('content')

    <div id="header" class="bg-[#F6F7FA] relative">
      <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
          <x-navbar />
          <div class="flex flex-col gap-[50px] items-center py-20">
            <div class="breadcrumb flex items-center justify-center gap-[30px]">
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
              <span class="text-cp-light-grey">/</span>
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Kumpulan Buku</p>
            </div>
            <h2 class="font-bold text-4xl leading-[45px] text-center">Gunakanlah buku ini  <br> sebagai pelengkap kegiatan belajar</h2>
          </div>
      </div>
    </div>
    <div id="Books" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
        <div class="flex flex-col gap-y-10">
            @forelse ($kelas as $class)
                <div class="overflow-x-auto bg-white border rounded-lg shadow-sm p-5">
                    <!-- Judul Kelas -->
                    <h2 class="text-indigo-950 text-2xl font-bold mb-5">Kelas: {{ $class->name }}</h2>
                    <table class="min-w-full bg-white border rounded-lg">
                        <thead>
                            <tr class="bg-indigo-700 text-white">
                                <th class="py-3 px-4 text-left">Judul Buku</th>
                                <th class="py-3 px-4 text-left">Thumbnail</th>
                                <th class="py-3 px-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Filter books untuk kelas ini
                                $filteredBooks = $books->where('class_model_id', $class->id);
                            @endphp
                            @forelse ($filteredBooks as $book)
                                <tr class="border-b">
                                    <td class="py-3 px-4">{{ $book->title }}</td>
                                    <td class="py-3 px-4">
                                        <img src="{{ Storage::url($book->thumbnail) }}" alt="{{ $book->title }}" class="w-20 h-20 object-cover rounded-md">
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <a href="{{ Storage::url($book->url) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600" download>
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-3 px-4 text-center text-gray-500">
                                        No books available for this class.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @empty
                <p class="text-center text-gray-500">No classes found.</p>
            @endforelse
        </div>
    </div>

    <x-footer/>



@endsection

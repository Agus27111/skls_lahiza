<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Books') }}
            </h2>
            <a href="{{ route('admin.books.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-10">
                @forelse ($kelas as $class)
                    <!-- Tampilkan Kelas -->
                    <div>
                        <h2 class="text-indigo-950 text-2xl font-bold mb-5">Kelas: {{ $class->name }}</h2>
                        @php
                            $filteredBooks = $books->where('class_model_id', $class->id);
                        @endphp

                        <!-- Tabel Buku untuk Kelas Ini -->
                        @if ($filteredBooks->count() > 0)
                            <table class="min-w-full bg-white border rounded-lg">
                                <thead>
                                    <tr class="bg-indigo-700 text-white">
                                        <th class="py-3 px-4 text-left">Thumbnail</th>
                                        <th class="py-3 px-4 text-left">Title</th>
                                        <th class="py-3 px-4 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filteredBooks as $book)
                                        <tr class="border-b">
                                            <td class="py-3 px-4">
                                                <img src="{{ $book->thubmnail }}" alt="Thumbnail" class="w-[90px] h-[90px] object-cover rounded-2xl">
                                            </td>
                                            <td class="py-3 px-4">
                                                <h3 class="text-indigo-950 text-xl font-bold">{{ $book->title }}</h3>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <a href="{{ asset('storage/' . $book->url) }}" class="text-indigo-600 hover:underline mr-4" target="_blank">View PDF</a>
                                                <a href="{{ asset('storage/' . $book->url) }}" class="text-green-600 hover:underline" download>Download PDF</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-gray-500">No books available for this class.</p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500">No classes found.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>

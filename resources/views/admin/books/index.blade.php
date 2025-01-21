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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($books as  $book)
                <div class="item-card flex flex-row justify-between items-center">
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Kelas</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $book->classModel->name }}</h3>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ $book->thubmnail }} " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $book->title }}</h3>
                        </div>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <a href="{{ asset('storage/' . $book->url) }}" target="_blank">View PDF</a>
                        <a href="{{ asset('storage/' . $book->url) }}" download>Download PDF</a>
                    </div>

                    {{-- Button --}}
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.books.edit', $book)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action=" {{route('admin.books.destroy', $book)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>No Abouts Found</p>

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

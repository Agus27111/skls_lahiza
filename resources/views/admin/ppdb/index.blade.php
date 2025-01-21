<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage PPDB') }}
            </h2>
            <a href="{{ route('admin.ppdb.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 hidden md:flex flex-row items-center gap-x-3 gap-y-5">
                @forelse ($ppdbs as  $ppdb)
                <div class="item-card flex flex-row justify-around items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <div class="flex flex-row items-center gap-x-3">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $ppdb->name }}</h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                        <img src="{{ $ppdb->image1 }} " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <img src="{{ $ppdb->image2 }} " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.ppdb.edit', $ppdb) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.ppdb.destroy', $ppdb) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
                @empty
                <p>No Image PPdb founds</p>

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Blogs') }}
            </h2>
            <a href="{{ route('admin.blogs.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($blogs as  $blog)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ $blog->image }} " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Judul</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $blog->title }}</h3>
                        </div>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Kategori</p>

                        <h3 class="text-indigo-950 text-xl font-bold">{{ $blog->category ? $blog->category->name : 'No Category' }}</h3>

                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Date</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $blog->created_at->format('M d, Y') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.blogs.edit', $blog)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action=" {{route('admin.blogs.destroy', $blog)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>No Articles Found</p>

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

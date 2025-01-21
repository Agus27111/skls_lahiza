<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Activities') }}
            </h2>
            <a href="{{ route('admin.activities.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($activities as  $activity)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ $activity->image }} " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $activity->exp }}</h3>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.activities.edit', $activity)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action=" {{route('admin.activities.destroy', $activity)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>


                </div>
                @empty
                <p>No activities Found</p>

                @endforelse
                <div class="mt-5">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

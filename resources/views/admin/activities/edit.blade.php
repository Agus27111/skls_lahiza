<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.activities.update', $activity) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="exp" :value="__('exp')" />
                        <x-text-input id="exp" class="block mt-1 w-full" type="text" name="exp"
                          required autofocus autocomplete="exp" value='{{ $activity->exp }}' />
                        <x-input-error :messages="$errors->get('exp')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('image')" />
                        <img src="{{ Storage::url($activity->image) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Activity
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

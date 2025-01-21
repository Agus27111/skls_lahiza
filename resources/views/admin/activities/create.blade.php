<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach ($errors->all() as $error )
                    <div class="py-3 w-full rounded-3xl bg-red-500 text-white">{{ $error }}</div>

                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.activities.store') }} " enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="exp" :value="__('exp')" />
                        <x-text-input id="exp" class="block mt-1 w-full" type="text" name="exp" :value="old('exp')" required autofocus autocomplete="exp" />
                        <x-input-error :messages="$errors->get('exp')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New About
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

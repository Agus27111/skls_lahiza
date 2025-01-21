<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit PPDB') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.ppdb.update', $ppdb) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                          required autofocus autocomplete="name" value='{{ $ppdb->name }}' />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image1" :value="__('image1')" />
                        <img src="{{ Storage::url($ppdb->image1) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="image1" class="block mt-1 w-full" type="file" name="image1" autofocus autocomplete="image1" />
                        <x-input-error :messages="$errors->get('image1')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="image2" :value="__('image2')" />
                        <img src="{{ Storage::url($ppdb->image2) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="image2" class="block mt-1 w-full" type="file" name="image2" autofocus autocomplete="image2" />
                        <x-input-error :messages="$errors->get('image2')" class="mt-2" />
                    </div>


                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update PPDB
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

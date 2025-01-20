<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.abouts.update', $about) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                          required autofocus autocomplete="name" value='{{ $about->name }}' />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thubmnail" :value="__('thubmnail')" />
                        <img src="{{ Storage::url($about->thubmnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="thubmnail" class="block mt-1 w-full" type="file" name="thubmnail" autofocus autocomplete="thubmnail" />
                        <x-input-error :messages="$errors->get('thubmnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('type')" />

                        <select name="type" id="type" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Visions">Visions</option>
                            <option value="Missions">Missions</option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <h3 class="text-indigo-950 text-lg font-bold mt-4">Keypoints</h3>

                    <div class="mt-4">

                        <div id="keypoints-container" class="flex flex-col gap-y-2">
                            <x-input-label for='kepoints' :value="_('keypoints')" />
                            @foreach ($about->keypoints as $keypoint)
                                <input type="text" class="py-3 rounded-lg border-slate-300 border w-full"
                                       name="keypoints[]" value="{{ $keypoint->keypoint }}">
                                       @empty

                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('keypoint')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update About
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

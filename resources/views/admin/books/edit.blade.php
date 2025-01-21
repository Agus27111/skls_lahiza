<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.books.update', $book) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                          required autofocus autocomplete="title" value='{{ $book->title }}' />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thubmnail" :value="__('thubmnail')" />
                        <img src="{{ Storage::url($book->thubmnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="thubmnail" class="block mt-1 w-full" type="file" name="thubmnail" autofocus autocomplete="thubmnail" value='{{ $book->thubmnail }}'/>
                        <x-input-error :messages="$errors->get('thubmnail')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="pdf" :value="__('PDF')" />
                        <x-text-input id="pdf" class="block mt-1 w-full" type="file" name="pdf" autofocus autocomplete="pdf" value='{{ $book->url }}' />

                        <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="class_model_id" :value="__('Class')" />
                        <select name="class_model_id" id="class_model_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}"
                                    @if(old('class_model_id', $book->class_model_id) == $class->id)
                                        selected
                                    @endif>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('class_model_id')" class="mt-2" />
                    </div>



                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Book
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Books') }}
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

                <form method="POST" action="{{ route('admin.books.store') }} " enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thubmnail" :value="__('thubmnail')" />
                        <x-text-input id="thubmnail" class="block mt-1 w-full" type="file" name="thubmnail" required autofocus autocomplete="thubmnail" />
                        <x-input-error :messages="$errors->get('thubmnail')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="pdf" :value="__('pdf')" />
                        <x-text-input id="pdf" class="block mt-1 w-full" type="file" name="pdf" required autofocus autocomplete="pdf" />
                        <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="class_model_id" :value="__('Class')" />
                        <select name="class_model_id" id="class_model_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('class_model_id')" class="mt-2" />

                        <!-- Button untuk membuka form tambah kelas -->
                        <button type="button" id="addClassButton" class="mt-2 text-indigo-700 underline">Add New Class</button>

                        <!-- Form untuk menambahkan kelas -->
                        <div id="addClassForm" class="hidden mt-4">
                            <x-input-label for="newClassName" :value="__('New Class Name')" />
                            <x-text-input id="newClassName" class="block mt-1 w-full" type="text" name="newClassName" placeholder="Enter new class name" />
                            <button type="button" id="saveClassButton" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full mt-2">
                                Save New Class
                            </button>
                        </div>
                    </div>



                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Books
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>


<script>
   document.getElementById('addClassButton').addEventListener('click', function () {
    document.getElementById('addClassForm').classList.toggle('hidden');
});

document.getElementById('saveClassButton').addEventListener('click', function () {
    const newClassName = document.getElementById('newClassName').value.trim();

    if (!newClassName) {
        alert('Class name cannot be empty.');
        return;
    }

    fetch('{{ route("admin.classModels.store") }}', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
    },
    body: JSON.stringify({ name: newClassName }),
})
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tambahkan opsi baru ke dropdown
                const classDropdown = document.getElementById('class_model_id');
                const newOption = document.createElement('option');
                newOption.value = data.class.id;
                newOption.textContent = data.class.name;
                classDropdown.appendChild(newOption);

                // Pilih kelas baru secara otomatis
                classDropdown.value = data.class.id;

                // Kosongkan input dan sembunyikan form
                document.getElementById('newClassName').value = '';
                document.getElementById('addClassForm').classList.add('hidden');

                alert('Class added successfully!');
            } else {
                alert(data.message || 'Failed to add class.');
            }
        })
        .catch(error => {
            console.error('Error adding class:', error);
            alert('An error occurred. Please try again.');
        });
});


</script>

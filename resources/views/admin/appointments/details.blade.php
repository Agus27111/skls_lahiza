<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Pendaftar') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($appointment->product->thumbnail) }}" alt="thumbnail" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Jenjang</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->product->name }}</h3>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Nama</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->name }}</h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Tanggal Lahir</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->date_of_birth }}</h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Alamat</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->address }}</h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Nama Ayah</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->father }}</h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Nama Ibu</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->mother }}</h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Pesan</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->message }}</h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Email</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->email }}</h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">No HP</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->phone_number }}</h3>
                        </div>
                    </div>

                    </div>
                </div>

                <hr class="my-5">

                <a href="https://wa.me/{{ preg_replace('/\D/', '', $appointment->phone_number) }}?text={{ urlencode('Halo ' . $appointment->name . ', kami ingin mendiskusikan lebih lanjut mengenai produk ' . $appointment->product->name . '.') }}" class="text-center font-bold py-4 px-6 bg-indigo-700 text-white rounded-full" target="_blank">
                    Follow Up
                </a>
                <a href="/admin/appointments" class="ml-4 text-center font-bold py-4 px-6 bg-indigo-700 text-white rounded-full" >
                   Kembali ke Pendaftar
                </a>

            </div>
        </div>
    </div>
</x-app-layout>

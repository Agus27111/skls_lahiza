@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar />
    <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
      <div class="flex items-center justify-between">

        <div class="flex flex-col gap-[14px]">
          <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">Sekolah Karakter</p>
          <h2 class="font-bold text-4xl leading-[45px]">Penerimaan Peserta Didik Baru<br>Lahiza Sunnah</h2>
        </div>
        <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Daftar</a>
      </div>
      <div class="awards-card-container grid grid-cols-4 gap-[30px] justify-center">
        @forelse ($ppdb as $item)
            <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <!-- Information -->
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $item->name }}</h2>
                    </div>

                    <!-- Image 1 -->
                    <div class="flex justify-center">
                        <img src="{{ Storage::url($item->image1) }}" alt="Image 1" class="w-full h-40 object-cover">
                    </div>

                    <!-- Image 2 -->
                    <div class="flex justify-center">
                        <img src="{{ Storage::url($item->image2) }}" alt="Image 2" class="w-full h-40 object-cover">
                    </div>


                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">PPDB belum dibuka.</p>
        @endforelse

      </div>
    </div>
</div>
<x-footer/>
</div>


@endsection

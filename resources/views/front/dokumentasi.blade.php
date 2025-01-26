@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar />
    <div id="activity" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        {{-- TITLE --}}
      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-[14px]">
          <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">Sekolah Karakter</p>
          <h2 class="font-bold text-4xl leading-[45px]">Dokumentasi Kegiatan</h2>
        </div>
      </div>

      @forelse ($dokumentasi as $item)
    @if ($loop->index % 2 == 0)
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
    @endif
                <!-- Image and Exp (Explanation) -->
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ Storage::url($item->image) }}" alt="Image" class="w-full h-full object-cover rounded-md mb-2">
                    <p>{{ $item->exp }}</p>
                </div>
    @if ($loop->index % 2 == 1 || $loop->last)
            </div>
        </div>
    @endif
@empty
    <p class="text-center text-gray-500">Data tidak ditemukan.</p>
@endforelse
    </div>
</div>

<x-footer/>
</div>


@endsection

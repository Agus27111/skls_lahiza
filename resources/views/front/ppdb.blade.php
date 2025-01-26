@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar />
    <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">

      <div id="activity" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        {{-- TITLE --}}
      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-[14px]">
          <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">Sekolah Karakter</p>
          <h2 class="font-bold text-4xl leading-[45px]">Brosur PPDB</h2>
        </div>
      </div>

      @forelse ($ppdb as $item)
    <p>{{ $item->name }}</p>
    @if ($loop->index % 2 == 0)
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
    @endif
                <!-- Image and Exp (Explanation) -->
                <div class="flex flex-col justify-center items-center">
                    <div class="mb-2 w-full flex justify-center gap-4">
                        <div class="w-1/2">
                            <img src="{{ Storage::url($item->image1) }}" alt="Image 1" class="w-full h-auto object-cover rounded-md">
                            <a href="{{ Storage::url($item->image1) }}" download class="btn-download text-center mt-2 block bg-blue-500 text-white py-2 px-4 rounded-md">Download Image 1</a>
                        </div>
                        <div class="w-1/2">
                            <img src="{{ Storage::url($item->image2) }}" alt="Image 2" class="w-full h-auto object-cover rounded-md">
                            <a href="{{ Storage::url($item->image2) }}" download class="btn-download text-center mt-2 block bg-blue-500 text-white py-2 px-4 rounded-md">Download Image 2</a>
                        </div>
                    </div>
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
</div>
<x-footer/>
</div>


@endsection

@extends('front.layouts.app')
@section('content')

    <div id="header" class="bg-[#F6F7FA] relative h-[600px] -mb-[388px]">
      <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
      <x-navbar />
      </div>
    </div>
    <div id="Teams" class="w-full px-[10px] relative z-10">
      <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center">
        <div class="flex flex-col gap-[50px] items-center">
          <div class="breadcrumb flex items-center justify-center gap-[30px]">
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
            <span class="text-cp-light-grey">/</span>
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Our Team</p>
          </div>
          <h2 class="font-bold text-4xl leading-[45px] text-center">Kami Hadir Untuk Memastikan <br>  Bakat Anak Berkembang Baik</h2>
        </div>
        <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
            @forelse ($teams as $team )


          <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
              <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                <img src="{{ Storage::url($team->avatar) }}" class="object-cover w-full h-full object-center" alt="photo">
              </div>
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">{{ $team->name }}</p>
              <p class="text-cp-light-grey">{{ $team->occupation }}</p>
            </div>
            <div class="flex items-center justify-center gap-[10px]">
              <div class="w-6 h-6 flex shrink-0">
                <img src="assets/icons/global.svg" alt="icon">
              </div>
                <p class="text-cp-dark-blue font-semibold">{{ $team->location }}</p>
            </div>
          </div>

          @empty
          <p>Tidak ada data team</p>

          @endforelse

        </div>
      </div>
    </div>

      <x-footer/>


@endsection

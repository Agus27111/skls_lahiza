@extends('front.layouts.app')
@section('content')
  <div id="header" class="bg-[#F6F7FA] relative overflow-hidden">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar />
        @forelse ($heroSections as  $heroSection)


        <div id="Hero" class="flex flex-col gap-[30px] mt-10 pb-10 lg:pb-20 p-5 lg:p-0">
          <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit">
            <div class="w-5 h-5 flex shrink-0 overflow-hidden">
              <img src="{{asset('assets/icons/crown.svg')}}" class="object-contain" alt="icon">
            </div>
            <p class="font-semibold text-sm">"Sekolah Karakter Nabawiyah"</p>
          </div>
          <div class="flex flex-col gap-[10px]">
            <h1 class="font-extrabold text-[50px] leading-[65px] max-w-[536px]">{{$heroSection->heading}} <br>{{$heroSection->subheading}}</h1>
            <p class="text-cp-light-grey leading-[30px] max-w-[437px]">{{$heroSection->achievement}}</p>
          </div>
          <div class="flex items-center gap-4">
            <a href="/about" class="bg-cp-dark-blue p-5 w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Explore Now</a>

          </div>
        </div>

    </div>
    <div class="lg:absolute md:absolute relative w-full lg:w-[43%] md:w-[43%] h-full top-0 right-0 overflow-hidden z-0">
        <img src="{{Storage::url($heroSection->banner)}}" class="object-cover w-full h-full" alt="banner">
    </div>
    @empty
    <p>Tidak ada data Hero</p>
    @endforelse
  </div>


  {{-- <div id="Stats" class="bg-violet-700 w-[80%] rounded-xl mt-20 z-10 relative -mt-12 left-1/2 transform -translate-x-1/2">
    <div class="container max-w-[1000px] mx-auto py-6">
      <div class="flex flex-wrap items-center justify-between p-[10px]">

        @forelse ($statistics as $statistic )


        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{Storage::url($statistic->icon)}}" class="object-contain w-full h-full" alt="icon">
          </div>
          <p class="text-cp-pale-orange font-bold text-2xl leading-[34px]">{{ $statistic->goal }}</p>
          <p class="text-cp-light-grey">{{ $statistic->name }}</p>
        </div>
        @empty
        <p>belum ada data terbaru </p>

        @endforelse
      </div>
    </div>
  </div> --}}

  <div id="Stats" class="bg-[#F6F7FA] w-[90%] md:w-[80%] rounded-xl mt-20 z-5 relative -mt-12 left-1/2 transform -translate-x-1/2">
    <div class="container max-w-[1000px] mx-auto py-8 px-4 lg:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-center justify-center">
            @forelse ($statistics as $statistic)
            <div class="card flex flex-col items-center gap-3 text-center
                @media(min-width: 1024px) ? 'lg:bg-transparent lg:shadow-none' : 'bg-white p-5 rounded-lg shadow-md hover:shadow-lg'">

                <!-- Icon -->
                <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($statistic->icon) }}" class="object-contain w-full h-full" alt="icon">
                </div>
                <!-- Goal  -->
                <p class="text-light font-bold text-2xl leading-[34px]">{{ $statistic->goal }}</p>
                <!-- Name -->
                <p class="text-cp-light-grey text-sm lg:text-base">{{ $statistic->name }}</p>
            </div>
            @empty
            <p class="text-center w-full text-cp-light-grey">Belum ada data terbaru</p>
            @endforelse
        </div>
    </div>
</div>


  {{-- <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
    <h2 class="font-bold text-lg">Trusted by 500+ Top Leaders Worldwide</h2>
    <div class="logo-container flex flex-wrap gap-5 justify-center">
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-54.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-52.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-55.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-44.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-51.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-55.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-52.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-54.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
      <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
        <div class="overflow-hidden h-9">
          <img src="{{asset('assets/logo/logo-51.svg')}}" class="object-contain w-full h-full" alt="logo">
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
    <div class="flex items-center justify-between">
      <div class="flex flex-col gap-[14px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR PRINCIPLES</p>
        <h2 class="font-bold text-4xl leading-[45px]">We Might Best Choice <br> For Your Company</h2>
      </div>
      <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
    </div>
    <div class="flex flex-wrap items-center gap-[30px] justify-center">

    @forelse ($principles as $principle )
      <div class="card w-[356.67px] flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
          <img src="{{Storage::url($principle->thumbnail)}}" class="object-cover object-center w-full h-full" alt="thumbnails">
        </div>
        <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{Storage::url($principle->icon)}}" class="w-full h-full object-contain" alt="icon">
          </div>
          <div class="flex flex-col gap-1">
            <p class="title font-bold text-xl leading-[30px]">{{ $principle->name }}</p>
            <p class="leading-[30px] text-cp-light-grey">{{ $principle->subtitle }}</p>
          </div>
          <a href="" class="font-semibold text-cp-dark-blue">Learn More</a>
        </div>
      </div>
      @empty
      <p>Data principles kosong</p>
    @endforelse

    </div>
  </div> --}}

  <div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
    @forelse ($products as  $product)
    <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
      <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden rounded-xl">
        <img src="{{Storage::url($product->thumbnail)}}" class="w-full h-full object-cover rounded-xl" alt="thumbnail">
      </div>
      <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px] p-5 lg:p-0">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $product->tagline }}</p>
        <div class="flex flex-col gap-[10px]">
          <h2 class="font-bold text-4xl leading-[45px]">{{ $product->name }}</h2>
          <p class="leading-[30px] text-cp-light-grey">{{ $product->about }}</p>
        </div>
        <a href="{{ route('front.appointment') }}" class="bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Daftar</a>
      </div>
    </div>
    @empty
    <p>Tidak ada data produk</p>
    @endforelse

  </div>
  <div id="Teams" class="bg-[#F6F7FA] w-full py-20 px-[10px] mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] items-center">
      <div class="flex flex-col gap-[14px] items-center">
        <p class="badge w-fit bg-cp-light-blue text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR POWERFUL TEACHER</p>
        <h2 class="font-bold text-4xl leading-[45px] text-center">Kami Mendampingi <br> Penumbuhan Bakat Siswa/i</h2>
      </div>
      <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
        @forelse ($teams as $team )
        <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
            <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
              <img src="{{Storage::url($team->avatar)}}" class="object-cover w-full h-full object-center" alt="photo">
            </div>
          </div>
          <div class="flex flex-col gap-1 text-center">
            <p class="font-bold text-xl leading-[30px]">{{ $team->name }}</p>
            <p class="text-cp-light-grey">{{ $team->occupation }}</p>
          </div>
          <div class="flex items-center justify-center gap-[10px]">
            <div class="w-6 h-6 flex shrink-0">
              <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
            </div>
            <p class="text-cp-dark-blue font-semibold">{{ $team->location }}</p>
          </div>
        </div>
        @empty
        <p>Data Teams tidak ada</p>
        @endforelse

        <a href="{{ route('front.team') }}" class="view-all-card">
          <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="{{asset('assets/icons/profile-2user.svg')}}" alt="icon">
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">View All</p>
              <p class="text-cp-light-grey">Our Great People</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  {{-- <div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20">
    <div class="flex flex-col gap-[14px] items-center">
      <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">SUCCESS CLIENTS</p>
      <h2 class="font-bold text-4xl leading-[45px] text-center">Our Satisfied Clients<br>From Worldwide Company</h2>
    </div>
    <div class="main-carousel w-full">
        @forelse ($testimonials as $testimonial )
      <div class="carousel-card container max-w-[1130px] w-full flex flex-wrap justify-between items-center lg:mx-[calc((100vw-1130px)/2)]">
        <div class="testimonial-container flex flex-col gap-[112px] w-[565px]">
          <div class="flex flex-col gap-[30px]">
            <div class="h-9 overflow-hidden">
              <img src="{{Storage::url($testimonial->client->logo)}}" class="object-contain" alt="icon">
            </div>
            <div class="relative pt-[27px] pl-[30px]">
              <div class="absolute top-0 left-0">
                <img src="{{asset('assets/icons/quote.svg')}}" alt="icon">
              </div>
              <p class="font-semibold text-2xl leading-[46px] relative z-10">{{ $testimonial->message }}</p>
            </div>
            <div class="flex items-center justify-between pl-[30px]">
              <div class="flex items-center gap-6">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
                  <img src="{{Storage::url($testimonial->client->avatar)}}" class="w-full h-full object-cover" alt="photo">
                </div>
                <div class="flex flex-col justify-center gap-1">
                  <p class="font-bold">{{ $testimonial->client->name }}</p>
                  <p class="text-sm text-cp-light-grey">{{ $testimonial->client->occupation }}</p>
                </div>
              </div>
              <div class="flex flex-nowrap">
                <div class="w-6 h-6 flex shrink-0">
                  <img src="{{asset('assets/icons/Star-rating.svg')}}" alt="star">
                </div>
                <div class="w-6 h-6 flex shrink-0">
                  <img src="{{asset('assets/icons/Star-rating.svg')}}" alt="star">
                </div>
                <div class="w-6 h-6 flex shrink-0">
                  <img src="{{asset('assets/icons/Star-rating.svg')}}" alt="star">
                </div>
                <div class="w-6 h-6 flex shrink-0">
                  <img src="{{asset('assets/icons/Star-rating.svg')}}" alt="star">
                </div>
                <div class="w-6 h-6 flex shrink-0">
                  <img src="{{asset('assets/icons/Star-rating.svg')}}" alt="star">
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-indicator flex items-center justify-center gap-2 h-4 shrink-0">
          </div>
        </div>
        <div class="testimonial-thumbnail w-[470px] h-[550px] rounded-[20px] overflow-hidden bg-[#D9D9D9]">
          <img src="{{Storage::url($testimonial->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
        </div>
      </div>
      @empty
      <p>Tidak ada data Testimonial</p>
    @endforelse

    </div>
  </div> --}}
  {{-- <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
    <div class="flex items-center justify-between">
      <div class="flex flex-col gap-[14px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR AWARDS</p>
        <h2 class="font-bold text-4xl leading-[45px]">We’ve Dedicated Our<br>Best Team Efforts</h2>
      </div>
      <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
    </div>
    <div class="awards-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
      <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
        <div class="w-[55px] h-[55px] flex shrink-0">
          <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
        </div>
        <hr class="border-[#E8EAF2]">
        <p class="font-bold text-xl leading-[30px]">Solid Fundamental Crafter Async</p>
        <hr class="border-[#E8EAF2]">
        <p class="text-cp-light-grey">Bali, 2020</p>
      </div>
      <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
        <div class="w-[55px] h-[55px] flex shrink-0">
          <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
        </div>
        <hr class="border-[#E8EAF2]">
        <p class="font-bold text-xl leading-[30px]">Most Crowded Yet Harmony Place</p>
        <hr class="border-[#E8EAF2]">
        <p class="text-cp-light-grey">Shanghai, 2021</p>
      </div>
      <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
        <div class="w-[55px] h-[55px] flex shrink-0">
          <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
        </div>
        <hr class="border-[#E8EAF2]">
        <p class="font-bold text-xl leading-[30px]">Small Things Made Much Big Impacts</p>
        <hr class="border-[#E8EAF2]">
        <p class="text-cp-light-grey">Zurich, 2022</p>
      </div>
      <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
        <div class="w-[55px] h-[55px] flex shrink-0">
          <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
        </div>
        <hr class="border-[#E8EAF2]">
        <p class="font-bold text-xl leading-[30px]">Teamwork and Solidarity</p>
        <hr class="border-[#E8EAF2]">
        <p class="text-cp-light-grey">Bandung, 2023</p>
      </div>
    </div>
  </div> --}}
  <div id="FAQ" class="bg-[#F6F7FA] w-full py-20 px-[10px] mt-20 -mb-20">
    <div class="container max-w-[1000px] mx-auto">
      <div class="flex flex-col lg:flex-row gap-[50px] sm:gap-[70px] items-center">
          <div class="flex flex-col gap-[30px]">
              <div class="flex flex-col gap-[10px]">
                  <h2 class="font-bold text-4xl leading-[45px]">Frequently Asked Questions</h2>
              </div>
              <a href="{{ route('front.appointment') }}" class="p-5 bg-cp-black rounded-xl text-white w-fit font-bold">Contact Us</a>
          </div>
          <div class="flex flex-col gap-[30px] sm:w-[603px] shrink-0">
              <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                      <span class="font-bold text-lg leading-[27px] text-left">Apa yang dimaksud fitrah?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-1" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">Fitrah adalah potensi bawaan yang diberikan Allah kepada setiap manusia sejak lahir. Fitrah mencakup kemampuan dasar, bakat alami, dan kecenderungan untuk mengenal kebaikan, kebenaran, serta Tuhannya. Dalam pendidikan, fitrah berarti membimbing anak agar potensi alami tersebut berkembang dengan optimal sesuai dengan nilai-nilai Islam dan tuntunan Allah Subhanahu wa Ta'ala.</p>
                  </div>
              </div>
              <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                      <span class="font-bold text-lg leading-[27px] text-left">Apa perbedaan dengan sekolah islam lain?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-2" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">Sekolah kami fokus pada pengembangan bakat alami setiap anak sesuai fitrahnya, dengan pendekatan holistik yang menggabungkan pendidikan dunia dan akhirat. Kami tidak hanya mengajarkan ilmu pengetahuan, tetapi juga memberikan perhatian khusus untuk membentuk karakter dan keterampilan sosial yang diperlukan dalam kehidupan sehari-hari.</p>
                  </div>
              </div>
              <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                      <span class="font-bold text-lg leading-[27px] text-left">Apakah di sekolah di ajarkan materi umum?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-3" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">Tentu, di Sekolah  kami mengajarkan materi umum sesuai kurikulum nasional. Namun, kami telah menganalisis kebutuhan esensial siswa agar waktu belajar fokus pada hal yang relevan dan bermanfaat. Ditambah pendidikan Islam untuk akhlak mulia dan pengembangan karakter, siswa siap hadapi masa depan.</p>
                  </div>
              </div>
              <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                      <span class="font-bold text-lg leading-[27px] text-left">Apakah akan ada penjurusan bakat?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-4" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">Ya, di Sekolah kami menyediakan program penjurusan bakat yang dimulai sejak kelas 4 atau sekitar usia 10 tahun. Anak-anak akan mendapatkan bimbingan intensif, termasuk magang dan kegiatan sesuai minat serta bakatnya. Pendekatan ini dirancang untuk mengasah keterampilan mereka sejak dini, membantu mereka memahami potensi diri, dan mempersiapkan masa depan dengan lebih terarah.</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

  <div id="Blogs" class="bg-[#F6F7FA] w-full py-20 px-[10px] mt-20 -mb-20">
  <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
    <div class="flex flex-col gap-[14px] items-center">
        <a href="/blog" class="badge w-fit bg-cp-light-blue text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">
            OUR BLOGS
        </a>
    </div>

    <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 mt-12">
        @if($blogs->isEmpty())
            <p>No blogs found for this category.</p>
        @else
        @foreach ($blogs->take(3) as $blog)
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <a href="{{ route('front.blogs.category', ['category' => $blog->category->slug]) }}">
                        <span class="text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:underline" style="background-color: {{ $blog->category->color }};">
                            {{ $blog->category->name }}
                        </span>
                    </a>
                    <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $blog->created_at->diffForHumans() }}</p>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">
                    <a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a>
                </h2>
                <div class="mt-4">
                    <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="rounded-lg object-cover w-full h-[200px]">
                </div>
                <p class="mt-4 mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($blog->content, 100) }}</p>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <a href="/blogs?author={{ $blog->author }}" class="font-medium text-gray-900 dark:text-white hover:underline">
                            {{ $blog->author }}
                        </a>
                    </div>
                    <a href="/blog/{{ $blog->slug }}"  class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>

        @endforeach
        @endif
    </div>
</div>
  </div>

  <x-footer/>
  <div id="video-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full lg:w-1/2 max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-[20px] overflow-hidden shadow">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                  <h3 class="text-xl font-semibold text-cp-black">
                      Lahiza Profile Video
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" onclick="{modal.hide()}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="">
                <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src="" title="Demo Project Laravel Portfolio" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
          </div>
      </div>
  </div>

  @endsection


  @push('after-scripts')

  @if (session('whatsappUrl'))
  <script>
      window.open("{{ session('whatsappUrl') }}", "_blank");
  </script>
    @endif


  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- JavaScript -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
  <script src="{{asset('js/carousel.js') }}"></script>
  <script src="{{asset ('js/accordion.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  @endpush


  @section('floating-whatsapp')
  <a
  href="{{ config('app.whatsapp_link') }}"
  class="fixed bottom-4 right-4 bg-green-500 text-white w-16 h-16 p-4 rounded-full shadow-lg hover:bg-green-600 transition duration-300 flex items-center justify-center z-100"
  target="_blank"
  rel="noopener noreferrer"
  aria-label="Chat via WhatsApp"
>
  <!-- Ikon WhatsApp dari FontAwesome -->
  <i class="fab fa-whatsapp text-2xl"></i>
</a>


    @endsection

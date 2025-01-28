@extends('front.layouts.app')
@section('content')

<div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3">
            <!-- Logo dan Nama Perusahaan -->
            <div class="flex items-center gap-3">
                <div class="flex shrink-0 h-[43px] overflow-hidden">
                    <img src="../assets/logo/yls.png" class="object-contain w-full h-full" alt="logo">
                </div>
                <div class="flex flex-col">
                  <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">Lahiza Sunnah</p>
                  <p id="CompanyTagline" class="text-sm text-cp-light-grey">Sekolah Karakter Nabawiyah</p>
                </div>
            </div>

            <!-- Hamburger Menu -->
            <button id="hamburger-menu" class="lg:hidden flex items-center p-2 rounded-md hover:bg-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Navigasi -->
            <ul id="nav-menu" class="hidden flex-col lg:flex lg:flex-row items-start lg:items-center gap-3 lg:gap-[30px] w-full lg:w-auto">
                <li class="{{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                    <a href="{{ route('front.index') }}">Home</a>
                </li>
                <li class="relative font-semibold cursor-pointer">
                    <button id="dropdown-toggle" class="hover:text-cp-dark-blue transition-all duration-300 focus:outline-none">
                        Tentang Kami
                    </button>
                    <!-- Dropdown Menu -->
                    <ul id="dropdown-menu" class="hidden absolute bg-white shadow-lg rounded-md mt-2 w-[200px]">
                        <li class="{{ request()->routeIs('front.team') ? 'bg-gray-100' : '' }} hover:bg-gray-100 transition-all duration-300">
                            <a href="{{ route('front.team') }}" class="block py-2 px-4">Team Guru</a>
                        </li>
                        <li class="{{ request()->routeIs('front.about') ? 'bg-gray-100' : '' }} hover:bg-gray-100 transition-all duration-300">
                            <a href="{{ route('front.about') }}" class="block py-2 px-4">Tentang Kami</a>
                        </li>
                        <li class="{{ request()->routeIs('front.dokumentasi') ? 'bg-gray-100' : '' }} hover:bg-gray-100 transition-all duration-300">
                            <a href="{{ route('front.dokumentasi') }}" class="block py-2 px-4">Dokumentasi</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('front.blogs') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                    <a href="{{ route('front.blogs') }}">Blog</a>
                </li>
                <li class="{{ request()->routeIs('front.book') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                    <a href="{{ route('front.book') }}">Modul</a>
                </li>
                <li class="{{ request()->routeIs('front.ppdb') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                    <a href="{{ route('front.ppdb') }}">PPDB</a>
                </li>
                <li class="mt-3 lg:mt-0 w-full lg:w-auto p-2">
                    <a href="{{ route('front.appointment') }}" class="block bg-cp-dark-blue p-3 text-center w-full lg:w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">
                        Daftar PPDB
                    </a>
                </li>
            </ul>
        </nav>


        <div class="flex flex-col gap-[50px] items-center py-20">
            <div class="breadcrumb flex items-center justify-center gap-[30px]">
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
              <span class="text-cp-light-grey">/</span>
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Blog</p>
              <span class="text-cp-light-grey">/</span>
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">{{ $blog->title }}</p>
            </div>
          </div>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/blog" class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back to all blogs </a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            {{-- <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $blog->author}}" /> --}}
                            <div>
                                <a href="/blog?author={{ $blog->author }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $blog->created_at->diffForHumans() }}</p>
                                <a href="/blog?category={{ $blog->category->slug }}">
                                    <span class="text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:underline" style="background-color: {{ $blog->category->color }};">
                                        {{ $blog->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $blog->title }}</h1>
                </header>
                <div class="mt-4">
                    <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="rounded-lg object-cover w-full h-[400px]">
                </div>

                <div class="prose dark:prose-invert mt-4">
                    <p>{!! nl2br(e($blog->content)) !!}</p>
                </div>
            </article>
        </div>
    </main>
    </div>
</div>
<footer class="bg-cp-black w-full relative overflow-hidden mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-between pt-[100px] pb-[50px] relative z-10">
      <div class="flex flex-col gap-10">
        <div class="flex items-center gap-3 p-4">
          <div class="flex shrink-0 h-[43px] overflow-hidden">
              <img src="../assets/logo/yls.png" class="object-contain w-full h-full" alt="logo">
          </div>
          <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">Lahiza Sunnah</p>
            <p id="CompanyTagline" class="text-sm text-cp-light-grey">Sekolah Karakter Nabawiyah</p>
          </div>
        </div>
        <div class="flex items-center gap-4 p-4">
          <a href="{{ config('app.youtube_link') }}" target="_blank">
            <div class="w-6 h-6 flex shrink-0 overflow-hidden">
              <img src="../assets/icons/youtube.svg" class="w-full h-full object-contain" alt="youtube">
            </div>
          </a>
          <a href="{{ config('app.whatsapp_link') }}" target="_blank">
            <div class="w-6 h-6 flex shrink-0 overflow-hidden">
              <img src="../assets/icons/whatsapp.svg" class="w-full h-full object-contain" alt="whatsapp">
            </div>
          </a>
          <a href="{{ config('app.fecebook_link') }}" target="_blank">
            <div class="w-6 h-6 flex shrink-0 overflow-hidden">
              <img src="../assets/icons/facebook.svg" class="w-full h-full object-contain" alt="facebook">
            </div>
          </a>
          <a href="">
            <div class="w-6 h-6 flex shrink-0 overflow-hidden" target="_blank">
              <img src="../assets/icons/instagram.svg" class="w-full h-full object-contain" alt="instagram">
            </div>
          </a>
        </div>
      </div>
      <div class="flex flex-wrap gap-[50px] p-4">

        <div class="flex flex-col w-[200px] gap-3">
          <p class="font-bold text-lg text-white">Useful Links</p>
          <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Privacy & Policy</a>
          <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Terms & Conditions</a>
          <a href="{{ config('app.whatsapp_link') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Contact Us</a>
          <a
          href="https://maps.app.goo.gl/556J4kdrJhwRvSzz6"
          class="text-cp-light-grey hover:text-white transition-all duration-300"
          target="_blank"
          rel="noopener noreferrer"
          >
          Our Position
          </a>

        </div>
      </div>
    </div>
    <div class="absolute -bottom-[135px] w-full">
      <p class="font-extrabold text-[160px] leading-[375px] text-center text-white opacity-5">LAHIZA SUNNAH</p>
    </div>
  </footer>

    @endsection

    @push('after-scripts')
<!-- JavaScript -->
<script>
    const hamburgerMenu = document.getElementById('hamburger-menu');
    const navMenu = document.getElementById('nav-menu');
    const dropdownToggle = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');

    // Toggle nav menu for mobile
    hamburgerMenu.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });

    // Toggle dropdown visibility
    dropdownToggle.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', () => {
        dropdownMenu.classList.add('hidden');
    });
</script>
@endpush

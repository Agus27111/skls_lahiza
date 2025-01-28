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
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Blogs</p>
            </div>
          </div>

        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <form action="/blog" >
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for article" type="search" id="search" name="search" autocomplete="off"  value="{{ old('search', $search) }}">
                        </div>
                        <div>
                            <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
            <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
                @if($blogs->isEmpty())
                    <p>No blogs found for this category.</p>
                @else
                @foreach ($blogs as $blog)
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

            <!-- Pagination -->
            <div class="py-4 px-4">
                {{ $blogs->links() }}  <!-- Pagination Links -->
            </div>
        </div>

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


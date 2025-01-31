<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3">
    <!-- Logo dan Nama Perusahaan -->
    <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="assets/logo/yls.png" class="object-contain w-full h-full" alt="logo">
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

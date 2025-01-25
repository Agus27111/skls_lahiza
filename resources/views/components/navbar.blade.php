<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3">
    <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="assets/logo/logo.svg" class="object-contain w-full h-full" alt="logo">
        </div>
        <div class="flex flex-col">
          <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">ShaynaComp</p>
          <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
        </div>
    </div>
    <ul class="flex flex-wrap items-center gap-[30px]">
        <li class="{{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.index') }}">Home</a>
        </li>

        <!-- Tentang Kami Dropdown -->
        <li class="relative font-semibold cursor-pointer">
            <button id="dropdown-toggle" class="hover:text-cp-dark-blue transition-all duration-300 focus:outline-none">
                Tentang Kami
            </button>
            <!-- Dropdown Menu -->
            <ul
                id="dropdown-menu"
                class="hidden absolute bg-white shadow-lg rounded-md mt-2 w-[200px]"
            >
                <li class="{{ request()->routeIs('front.team') ? 'bg-gray-100' : '' }} hover:bg-gray-100 transition-all duration-300">
                    <a href="{{ route('front.team') }}" class="block py-2 px-4">Team</a>
                </li>
                <li class="{{ request()->routeIs('front.about') ? 'bg-gray-100' : '' }} hover:bg-gray-100 transition-all duration-300">
                    <a href="{{ route('front.about') }}" class="block py-2 px-4">About</a>
                </li>
            </ul>
        </li>

        <li class="{{ request()->routeIs('front.blogs') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.blogs') }}">Blog</a>
        </li>
        <li class="{{ request()->routeIs('front.book') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.book') }}">Buku</a>
        </li>
        <li class="{{ request()->routeIs('front.ppdb') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.ppdb') }}">PPDB</a>
        </li>
    </ul>


    <a href="{{ route('front.appointment') }}" class="bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Dafftar PPDB</a>
</nav>


<!-- JavaScript -->
<script>
    const dropdownToggle = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');

    // Toggle dropdown visibility on click
    dropdownToggle.addEventListener('click', () => {
        const isHidden = dropdownMenu.classList.contains('hidden');
        if (isHidden) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>

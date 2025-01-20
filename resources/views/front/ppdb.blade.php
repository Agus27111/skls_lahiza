@extends('front.layouts.app')
@section('content')

    <h1>PPDB Page</h1>
    <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-[14px]">
          <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR AWARDS</p>
          <h2 class="font-bold text-4xl leading-[45px]">We’ve Dedicated Our<br>Best Team Efforts</h2>
        </div>
        <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
      </div>
      <div class="awards-card-container grid grid-cols-4 gap-[30px] justify-center">
        <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[55px] h-[55px] flex shrink-0">
            <img src="assets/icons/cup-blue.svg" alt="icon">
          </div>
          <hr class="border-[#E8EAF2]">
          <p class="font-bold text-xl leading-[30px]">Solid Fundamental Crafter Async</p>
          <hr class="border-[#E8EAF2]">
          <p class="text-cp-light-grey">Bali, 2020</p>
        </div>
        <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[55px] h-[55px] flex shrink-0">
            <img src="assets/icons/cup-blue.svg" alt="icon">
          </div>
          <hr class="border-[#E8EAF2]">
          <p class="font-bold text-xl leading-[30px]">Most Crowded Yet Harmony Place</p>
          <hr class="border-[#E8EAF2]">
          <p class="text-cp-light-grey">Shanghai, 2021</p>
        </div>
        <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[55px] h-[55px] flex shrink-0">
            <img src="assets/icons/cup-blue.svg" alt="icon">
          </div>
          <hr class="border-[#E8EAF2]">
          <p class="font-bold text-xl leading-[30px]">Small Things Made Much Big Impacts</p>
          <hr class="border-[#E8EAF2]">
          <p class="text-cp-light-grey">Zurich, 2022</p>
        </div>
        <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[55px] h-[55px] flex shrink-0">
            <img src="assets/icons/cup-blue.svg" alt="icon">
          </div>
          <hr class="border-[#E8EAF2]">
          <p class="font-bold text-xl leading-[30px]">Teamwork and Solidarity</p>
          <hr class="border-[#E8EAF2]">
          <p class="text-cp-light-grey">Bandung, 2023</p>
        </div>
      </div>
    </div>
    <footer class="bg-cp-black w-full relative overflow-hidden mt-20">
      <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-between pt-[100px] pb-[220px] relative z-10">
        <div class="flex flex-col gap-10">
          <div class="flex items-center gap-3">
            <div class="flex shrink-0 h-[43px] overflow-hidden">
                <img src="assets/logo/logo.svg" class="object-contain w-full h-full" alt="logo">
            </div>
            <div class="flex flex-col">
              <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">ShaynaComp</p>
              <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <a href="">
              <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="assets/icons/youtube.svg" class="w-full h-full object-contain" alt="youtube">
              </div>
            </a>
            <a href="">
              <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="assets/icons/whatsapp.svg" class="w-full h-full object-contain" alt="whatsapp">
              </div>
            </a>
            <a href="">
              <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="assets/icons/facebook.svg" class="w-full h-full object-contain" alt="facebook">
              </div>
            </a>
            <a href="">
              <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="assets/icons/instagram.svg" class="w-full h-full object-contain" alt="instagram">
              </div>
            </a>
          </div>
        </div>
        <div class="flex flex-wrap gap-[50px]">
          <div class="flex flex-col w-[200px] gap-3">
            <p class="font-bold text-lg text-white">Products</p>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">General Contract</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Building Assessment</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">3D Paper Builder</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Legal Constructions</a>
          </div>
          <div class="flex flex-col w-[200px] gap-3">
            <p class="font-bold text-lg text-white">About</p>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">We’re Hiring</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Our Big Purposes</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Investor Relations</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Media Press</a>
          </div>
          <div class="flex flex-col w-[200px] gap-3">
            <p class="font-bold text-lg text-white">Useful Links</p>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Privacy & Policy</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Terms & Conditions</a>
            <a href="contact.html" class="text-cp-light-grey hover:text-white transition-all duration-300">Contact Us</a>
            <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Download Template</a>
          </div>
        </div>
      </div>
      <div class="absolute -bottom-[135px] w-full">
        <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">SHAYNA</p>
      </div>
    </footer>



@endsection

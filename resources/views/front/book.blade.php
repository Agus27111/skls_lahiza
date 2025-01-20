@extends('front.layouts.app')
@section('content')

    <div id="header" class="bg-[#F6F7FA] relative">
      <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
          <x-navbar />
          <div class="flex flex-col gap-[50px] items-center py-20">
            <div class="breadcrumb flex items-center justify-center gap-[30px]">
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Book Page</p>
              <span class="text-cp-light-grey"></span>
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">About Us</p>
            </div>
            <h2 class="font-bold text-4xl leading-[45px] text-center">Since Beginning We Only <br> Want to Make World Better</h2>
          </div>
      </div>
    </div>
    <div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">

    </div>
    <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
      <h2 class="font-bold text-lg">Trusted by 500+ Top Leaders Worldwide</h2>
      <div class="logo-container flex flex-wrap gap-5 justify-center">
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-54.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-52.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-55.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-44.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-51.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-55.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-52.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-54.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
        <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
          <div class="overflow-hidden h-9">
            <img src="assets/logo/logo-51.svg" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
      </div>
    </div>
    <div id="Stats" class="bg-cp-black w-full mt-20">

      </div>
    <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">

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

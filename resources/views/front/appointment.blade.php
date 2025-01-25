@extends('front.layouts.app')
@section('content')


    <div id="header" class="bg-[#F6F7FA] relative h-[700px] -mb-[488px]">
      <div class="container max-w-[1130px] mx-auto relative pt-10  z-10">
         <x-navbar />
      </div>
    </div>
    <div id="Contact" class="container max-w-[1130px] mx-auto flex flex-wrap xl:flex-nowrap justify-between gap-[50px] relative z-10">
        <div class="flex flex-col mt-20 gap-[50px]">
          <div class="breadcrumb flex items-center gap-[30px]">
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
            <span class="text-cp-light-grey">/</span>
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">PPDB</p>
            <span class="text-cp-light-grey">/</span>
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Daftar</p>
          </div>
          <h1 class="font-extrabold text-4xl leading-[45px]">Bersama menemukan bakat anak</h1>
          <div class="flex flex-col gap-5">
            <div class="flex items-center gap-[10px]">
              <div class="w-6 h-6 flex shrink-0">
                <img src="assets/icons/global.svg" alt="icon">
              </div>
              <p class="text-cp-dark-blue font-semibold">Kandanghaur, Indramayu</p>
            </div>
            <div class="flex items-center gap-[10px]">
              <div class="w-6 h-6 flex shrink-0">
                <img src="assets/icons/call.svg" alt="icon">
              </div>
              <p class="text-cp-dark-blue font-semibold">xxxxxxx</p>
            </div>
            <div class="flex items-center gap-[10px]">
              <div class="w-6 h-6 flex shrink-0">
                <img src="assets/icons/monitor-mobbile.svg" alt="icon">
              </div>
              <p class="text-cp-dark-blue font-semibold">lahizasunnah.com</p>
            </div>
          </div>
        </div>
        <form action="{{ route('front.appointment_store') }}" class="flex flex-col p-[30px] rounded-[20px] gap-[18px] bg-white shadow-[0_10px_30px_0_#D1D4DF40] w-full md:w-[700px] shrink-0" method="POST">
            @csrf
            @method('POST')

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif


            <!-- Nama Lengkap -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Nama Lengkap</p>
              <input type="text" name="name" placeholder="Masukkan nama lengkap calon siswa" class="p-3 border rounded-lg {{ $errors->has('name') ? 'border-red-500' : '' }}" value="{{ old('name') }}" required>
              @if ($errors->has('name'))
                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <!-- Nomor Telepon -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Nomor Telepon</p>
              <input type="tel" name="phone_number" placeholder="6287xxxxxxxxxxx" class="p-3 border rounded-lg {{ $errors->has('phone_number') ? 'border-red-500' : '' }}" value="{{ old('phone_number') }}" required pattern="^62\d{9,13}$">
              @if ($errors->has('phone_number'))
                <span class="text-red-500 text-sm">{{ $errors->first('phone_number') }}</span>
              @endif
            </div>

            <!-- Jenis Kelamin -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Jenis Kelamin</p>
              <select name="gender" class="p-3 border rounded-lg {{ $errors->has('gender') ? 'border-red-500' : '' }}" required>
                <option value="" hidden>Pilih jenis kelamin</option>
                <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
              </select>
              @if ($errors->has('gender'))
                <span class="text-red-500 text-sm">{{ $errors->first('gender') }}</span>
              @endif
            </div>

            <!-- Tanggal Lahir -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Tanggal Lahir</p>
              <input type="date" name="date_of_birth" class="p-3 border rounded-lg {{ $errors->has('date_of_birth') ? 'border-red-500' : '' }}" value="{{ old('date_of_birth') }}" required>
              @if ($errors->has('date_of_birth'))
                <span class="text-red-500 text-sm">{{ $errors->first('date_of_birth') }}</span>
              @endif
            </div>

            <!-- Tempat Lahir -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Tempat Lahir</p>
              <input type="text" name="birth_place" placeholder="Masukkan tempat lahir Anda" class="p-3 border rounded-lg {{ $errors->has('birth_place') ? 'border-red-500' : '' }}" value="{{ old('birth_place') }}" required>
              @if ($errors->has('birth_place'))
                <span class="text-red-500 text-sm">{{ $errors->first('birth_place') }}</span>
              @endif
            </div>

            <!-- Alamat -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Alamat</p>
              <textarea name="address" placeholder="Masukkan alamat lengkap Anda" rows="4" class="p-3 border rounded-lg {{ $errors->has('address') ? 'border-red-500' : '' }}" required>{{ old('address') }}</textarea>
              @if ($errors->has('address'))
                <span class="text-red-500 text-sm">{{ $errors->first('address') }}</span>
              @endif
            </div>

            <!-- Nama Ayah -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Nama Ayah</p>
              <input type="text" name="father" placeholder="Masukkan nama ayah Anda" class="p-3 border rounded-lg {{ $errors->has('father') ? 'border-red-500' : '' }}" value="{{ old('father') }}" required>
              @if ($errors->has('father'))
                <span class="text-red-500 text-sm">{{ $errors->first('father') }}</span>
              @endif
            </div>

            <!-- Nama Ibu -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Nama Ibu</p>
              <input type="text" name="mother" placeholder="Masukkan nama ibu Anda" class="p-3 border rounded-lg {{ $errors->has('mother') ? 'border-red-500' : '' }}" value="{{ old('mother') }}" required>
              @if ($errors->has('mother'))
                <span class="text-red-500 text-sm">{{ $errors->first('mother') }}</span>
              @endif
            </div>

            <!-- Email -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Email</p>
              <input type="email" name="email" placeholder="Masukkan email Anda" class="p-3 border rounded-lg {{ $errors->has('email') ? 'border-red-500' : '' }}" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <!-- Pesan -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Pesan</p>
              <textarea name="message" placeholder="Tambahkan pesan (opsional)" rows="4" class="p-3 border rounded-lg {{ $errors->has('message') ? 'border-red-500' : '' }}">{{ old('message') }}</textarea>
              @if ($errors->has('message'))
                <span class="text-red-500 text-sm">{{ $errors->first('message') }}</span>
              @endif
            </div>

            <!-- Jenjang -->
            <div class="flex flex-col gap-2">
              <p class="font-semibold">Pilih Jenjang Pendidikan</p>
              <select name="product_id" class="p-3 border rounded-lg {{ $errors->has('product_id') ? 'border-red-500' : '' }}" required>
                <option value="" hidden>Pilih produk</option>
                @foreach ($products as $product)
                  <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                  </option>
                @endforeach
              </select>
              @if ($errors->has('product_id'))
                <span class="text-red-500 text-sm">{{ $errors->first('product_id') }}</span>
              @endif
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
              Kirim Data
            </button>
          </form>
      </div>

    <div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20">
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
      </div>
    <x-footer/>

    @endsection

    @push('after-scripts')
    <script src="js/contact-form.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="js/carousel.js"></script>
    @endpush

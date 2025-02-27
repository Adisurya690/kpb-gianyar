<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  @php
      $isProduction = app()->environment('production');
      $manifestPath = $isProduction ? '../public_html/build/manifest.json' : public_path('build/manifest.json');
  @endphp

  @if ($isProduction && file_exists($manifestPath))
      @php
          $manifest = json_decode(file_get_contents($manifestPath), true);
      @endphp
      <link rel="stylesheet" href="{{ config('app.url') }}/build/{{ $manifest['resources/css/app.css']['file'] }}">
      <script type="module" src="{{ config('app.url') }}/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
  @else
      @viteReactRefresh
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  @endif
  <style>
    body {
        font-family: Helvetica, Arial, sans-serif;
    }
  </style>
  <title>KPB Gianyar</title>
</head>
<body>
  {{-- Header --}}
  @include('partials.navbar') 

  <section class="py-24 relative lg:pt-40">
      <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
          <div class="w-full justify-start items-center gap-8 grid lg:grid-cols-2 grid-cols-1">
              <div class="w-full flex-col justify-start lg:items-start items-center gap-10 inline-flex">
                  <div class="w-full flex-col justify-start lg:items-start items-center gap-4 flex">
                      <h2 class="text-gray-900 text-3xl md:text-5xl lg:text-5xl font-bold font-manrope leading-normal lg:text-start text-center">Kader Pelestari Budaya Kabupaten Gianyar</h1>
                      <p class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">Organisasi Kader Pelestari Budaya Kabupaten Gianyar
                        beranggotakan Putra dan Putri terbaik Kabupaten Gianyar yang
                        dalam pelaksanaan tugasnya sebagai pelestari budaya selalu didasari
                        oleh niat suci untuk menghasilkan manfaat terbaik bagi masyarakat
                        luas</p>
                  </div>
              </div>
              <div x-data="{ currentImage: 0, images: [
                    '{{ asset('storage/images/kb14.jpg') }}',
                    '{{ asset('storage/images/pengurus.png') }}',
                    '{{ asset('storage/images/bor.jpg') }}'
                ] }" 
                x-init="setInterval(() => { currentImage = (currentImage + 1) % images.length }, 10000)" 
                class="relative w-full h-[400px] overflow-hidden rounded-3xl">
                <template x-for="(image, index) in images" :key="index">
                    <img :src="image" 
                        x-show="currentImage === index"
                        x-transition:enter="opacity-0"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="opacity-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 w-full h-full object-cover rounded-3xl transition-opacity duration-1000 ease-in-out" />
                </template>
              </div>
          </div>
      </div>
  </section>
  
  <section class="lg:py-24 relative">
      <div class="w-full max-w-7xl md:px-5 lg:px-3 mx-auto">
          <div class="w-full justify-start items-center gap-12 grid lg:grid-cols-2 grid-cols-1">
              <div class="w-full sm:grid sm:grid-cols-2 flex flex-row justify-center items-start gap-6 lg:order-first order-last">
                  <!-- Gambar Kiri -->
                  <div class="flex justify-center items-center translate-y-2 sm:translate-y-0">
                      <img class="rounded-xl object-cover sm:w-auto w-[150px] h-full" 
                          src="{{ asset('storage/images/pura.jpg') }}" 
                          alt="about Us image" />
                  </div>
                  
                  <!-- Gambar Kanan -->
                  <div class="-translate-y-2 sm:translate-y-0">
                      <img class="rounded-xl object-cover sm:w-auto w-[150px] h-full" 
                          src="{{ asset('storage/images/tabus.jpg') }}" 
                          alt="about Us image" />
                  </div>
              </div>                      
              <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                  <div class="w-full flex-col justify-center items-start gap-8 flex">
                      <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                          <h2
                              class="text-gray-900 text-3xl md:text-4xl lg:text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                              Sejarah Kelahiran Kader Pelestari Budaya Gianyar</h2>
                          <p class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">
                            Kelahiran Kader Pelestari Budaya Kabupaten Gianyar Angkatan I pada
                            Kamis, 23 Juni 2011 bertepatan dengan pelaksanaan Kemah Budaya I
                            Kabupaten Gianyar di Jaba Pura Samuan Tiga, Desa Bedulu, Kecamatan
                            Blahbatuh, Gianyar.</p>
                      </div>
                      <div class="w-full lg:justify-start justify-center items-center sm:gap-10 gap-5 inline-flex">
                          <div class="flex-col justify-start items-start inline-flex">
                              <h3 class="text-gray-900 text-4xl font-bold font-manrope leading-normal">10 Juli 2011</h3>
                              <h6 class="text-gray-500 text-base font-normal leading-relaxed">Kelahiran Organisasi</h6>
                          </div>
                          {{-- <div class="flex-col justify-start items-start inline-flex">
                              <h4 class="text-gray-900 text-4xl font-bold font-manrope leading-normal">125+</h4>
                              <h6 class="text-gray-500 text-base font-normal leading-relaxed">Successful Projects</h6>
                          </div>
                          <div class="flex-col justify-start items-start inline-flex">
                              <h4 class="text-gray-900 text-4xl font-bold font-manrope leading-normal">52+</h4>
                              <h6 class="text-gray-500 text-base font-normal leading-relaxed">Happy Clients</h6>
                          </div> --}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <section class="py-24 relative xl:mr-0 lg:mr-5 mr-0">
      <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
          <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
              <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                  <div class="w-full flex-col justify-center items-start gap-8 flex">
                      <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                          <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                              <h2
                                  class="text-3xl md:text-4xl lg:text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                                  Kiprah Organisasi</h2>
                              <p
                                  class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">
                                  KPB Gianyar berperan dalam pelestarian budaya melalui edukasi, revitalisasi seni, dan perlindungan cagar budaya, demi menjaga warisan bagi generasi mendatang.</p>
                          </div>
                      </div>
                      <div class="w-full flex-col justify-center items-start gap-6 flex">
                          <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                              <div
                                  class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-100 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                  <h4 class="text-gray-900 text-xl sm:text-2xl font-bold font-manrope leading-9">Rekonstruksi Tari Rejang Ilud</h4>
                                  <p class="text-gray-500 text-base font-normal leading-relaxed">Tari Rejang Ilud Buahan ditetapkan sebagai WBTB Nasional pada 2021.</p>
                              </div>
                              <div
                                  class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-100 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                  <h4 class="text-gray-900 text-xl sm:text-2xl font-bold font-manrope leading-9">Penghargaan Pelestarian Budaya</h4>
                                  <p class="text-gray-500 text-base font-normal leading-relaxed">Meraih Penghargaan 2018 atas pelestarian cagar budaya dari Kemendikbud dan IAAI.</p>
                              </div>
                          </div>
                          <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                              <div
                                  class="w-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-100 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                  <h4 class="text-gray-900 text-xl sm:text-2xl font-bold font-manrope leading-9">Revitalisasi Tari Baris Irengan</h4>
                                  <p class="text-gray-500 text-base font-normal leading-relaxed">Melestarikan Tari Baris Irengan melalui program revitalisasi untuk menjaga warisan budaya.</p>
                              </div>
                              <div
                                  class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-100 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                  <h4 class="text-gray-900 text-xl sm:text-2xl font-bold font-manrope leading-9">Pembersihan Candi Tebing</h4>
                                  <p class="text-gray-500 text-base font-normal leading-relaxed">Pelestarian Candi Tebing melalui kegiatan pembersihan dan perawatan berkala.</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <button
                      class="sm:w-fit w-full group px-3.5 py-2 bg-white border border-red-700 hover:bg-red-50 rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] transition-all duration-100 ease-in-out justify-center items-center flex">
                      <span
                          class="px-1.5 text-red-700 text-sm font-medium leading-6 group-hover:-translate-x-0.5 transition-all duration-100 ease-in-out">
                          Lihat Selengkapnya
                      </span>
                      <svg class="group-hover:translate-x-0.5 transition-all duration-100 ease-in-out"
                          xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path d="M6.75265 4.49658L11.2528 8.99677L6.75 13.4996" stroke="#B91C1C" stroke-width="1.6"
                              stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                  </button>
              </div>
              <div class="w-full lg:justify-start justify-center items-start flex">
                  <div
                      class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-gray-100 rounded-3xl sm:border border-gray-200 relative">
                      <img class="sm:mt-5 sm:ml-5 w-full h-full rounded-3xl object-cover"
                          src="https://www.baliekbis.com/wp-content/uploads/2018/06/img-20180629-wa0016.jpg" alt="about Us image" />
                  </div>
              </div>
          </div>
      </div>
  </section>                 
  
  <section class="py-16 px-6">
      <div class="max-w-5xl mx-auto text-center">
          <h2 class="text-3xl md:text-4xl lg:text-4xl md:text-4xl font-bold mb-4">Jajaran Kepengurusan</h2>
          <p class="text-gray-400 mb-8">
            Jajaran kepengurusan KPB Gianyar terdiri dari Dewan Penanggung Jawab, Pembina, Asisten Pembina, Pengurus, dan Anggota yang berperan dalam pengelolaan serta pengembangan organisasi. Dengan dedikasi dan komitmen, mereka berkontribusi dalam pelestarian budaya dan mewujudkan visi serta misi KPB Gianyar.
          </p>
      </div>
      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">
        <div class="lg:col-span-2">
          <img src="{{ asset('storage/images/kb14.webp') }}" class="w-full h-[250px] object-cover rounded-lg" />
        </div>
        <div>
          <img src="{{ asset('storage/images/melem.webp') }}" class="w-full h-[250px] object-cover rounded-lg" />
        </div>
        <div>
          <img src="{{ asset('storage/images/edinitya.jpg') }}" class="w-full h-[250px] object-cover rounded-lg" />
        </div>
        <div>
          <img src="{{ asset('storage/images/bor.jpg') }}" class="w-full h-[250px] object-cover rounded-lg" />
        </div>
        <div>
          <img src="{{ asset('storage/images/triadi.png') }}" class="w-full h-[250px] object-cover rounded-lg" />
        </div>
        <div class="lg:col-span-2">
          <img src="{{ asset('storage/images/pengurus.png') }}" class="w-full h-[250px] object-cover rounded-lg" />
        </div>
      </div>
      <div class="justify-items-center pt-6">
        <button
            class="sm:w-fit w-full group px-3.5 py-2 bg-white border border-red-700 hover:bg-red-50 rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] transition-all duration-100 ease-in-out justify-center items-center flex">
            <span
                class="px-1.5 text-red-700 text-sm font-medium leading-6 group-hover:-translate-x-0.5 transition-all duration-100 ease-in-out">
                Lihat Selengkapnya
            </span>
            <svg class="group-hover:translate-x-0.5 transition-all duration-100 ease-in-out"
                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M6.75265 4.49658L11.2528 8.99677L6.75 13.4996" stroke="#B91C1C" stroke-width="1.6"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
      </div>
  </section>

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
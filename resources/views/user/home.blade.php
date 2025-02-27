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
      <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  @endif
  <link rel="icon" href="{{ asset('storage/images/Logo-KPB.png') }}" type="image/png">
  <title>KPB Gianyar</title>
  <style>
      @keyframes floating {
          0% {
              top: -40px;
          }
          50% {
              top: -60px;
          }
          100% {
              top: -40px;
          }
      }

      .floating-img {
          animation: floating 3s ease-in-out infinite;
      }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <style>
    body {
        font-family: Helvetica, Arial, sans-serif;
    }
  </style>
</head>
<body>
  {{-- Header --}}
  @include('partials.navbar') 

  {{-- hero-banner --}}
  <section class="relative bg-[url('')] bg-cover bg-center bg-no-repeat">
    <div class="absolute inset-0 bg-gradient-to-r from-white/100 to-transparent"></div>
    <div class="relative mx-auto max-w-screen-xl px-4 pt-28 pb-12 sm:py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
      <div class="sm:hidden relative mt-12 mb-8" style="width: 100%; height: 300px;">
        <img class="lg:ml-24 absolute z-10 floating-img" src="{{ asset('storage/app/public/images/lingga-yoni.png') }}" alt="lingga yoni" style="max-width: 100%; height: auto;">
        <img class="lg:ml-24 absolute z-0" src="{{ asset('storage/app/public/images/blob1.gif') }}" alt="blob" style="opacity: 0.7; width: 94%; height: auto; top: -50px;">
        <img class="lg:ml-24 absolute z-0" src="{{ asset('storage/app/public/images/blob2.gif') }}" alt="blob" style="opacity: 0.6; width: 99%; height: auto; top: -50px;">
      </div>
      <div class="max-w-xl text-center sm:text-left">
        <h1 class="text-5xl font-extrabold text-7xl text-red-700">KPB Gianyar</h1>
        <p class="mt-4 sm:text-xl">
          Kader Pelestari Budaya Kabupaten Gianyar adalah lembaga sosial yang bergerak di bidang pendidikan pelestarian budaya dan pengembangan potensi bagi generasi muda di Kabupaten Gianyar
        </p>
      </div>
      <div class="hidden lg:mt-0 lg:col-span-5 lg:flex relative lg:mr-12" style="width: 100%; height: 500px;">
          <img class="lg:ml-24 absolute z-10 floating-img" src="{{ asset('storage/app/public/images/lingga-yoni.png') }}" alt="lingga yoni" style="max-width: 100%; height: auto;">
          <img class="lg:ml-24 absolute z-0" src="{{ asset('storage/app/public/images/blob1.gif') }}" alt="blob" style="opacity: 0.7; width: 94%; height: auto; top: -50px;">
          <img class="lg:ml-24 absolute z-0" src="{{ asset('storage/app/public/images/blob2.gif') }}" alt="blob" style="opacity: 0.6; width: 99%; height: auto; top: -50px;">
      </div>            
    </div>
  </section>  
  
  {{-- card budaya --}}
  <div class="space-x-4 bg-gray-50 py-10">
    <div class="text-center">
      <h2 class="text-4xl font-bold text-red-700">Kebudayaan</h2>
      <p class="text-gray-500 lg:text-xl">Kategori kebudayaan di Kabupaten Gianyar</p>
    </div>
    <div class="flex flex-col md:flex-row justify-center items-center py-5 pr-5 space-y-4 md:space-y-0 md:space-x-4">
      <!-- Card 1: Budaya Benda -->
      <a href="{{ route('user.kebudayaan', ['category' => 'Benda']) }}" 
          class="flex flex-row md:flex-col items-center bg-white border border-gray-200 rounded-lg shadow w-full md:max-w-md hover:bg-gray-100 transform hover:scale-105 transition-all">
            <div class="w-32 h-32 md:w-full md:h-48 overflow-hidden flex-shrink-0">
                <img class="object-cover w-full h-full rounded-l-lg md:rounded-t-lg md:rounded-bl-none" 
                    src="https://www.rentalmobilbali.net/wp-content/uploads/2021/04/Candi-Tebing-Gunung-Kawi-Facebook.jpg" 
                    alt="Card Image">
            </div>
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Budaya Benda</h5>
                <p class="text-sm text-gray-700">Warisan budaya berbentuk fisik seperti bangunan, artefak, dan benda-benda bersejarah.</p>
            </div>
      </a>
        <!-- Card 2: Budaya Tak Benda -->
        <a href="{{ route('user.kebudayaan', ['category' => 'Tak Benda']) }}" 
            class="flex flex-row md:flex-col items-center bg-white border border-gray-200 rounded-lg shadow w-full md:max-w-md hover:bg-gray-100 transform hover:scale-105 transition-all">
              <div class="w-32 h-32 md:w-full md:h-48 overflow-hidden flex-shrink-0">
                  <img class="object-cover w-full h-full rounded-l-lg md:rounded-t-lg md:rounded-bl-none" 
                      src="https://statik.tempo.co/data/2023/02/08/id_1179591/1179591_720.jpg" 
                      alt="Card Image">
              </div>
              <div class="flex flex-col justify-between p-4 leading-normal">
                  <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Budaya Tak Benda</h5>
                  <p class="text-sm text-gray-700">Warisan budaya berbentuk non-fisik seperti kesenian, bahasa, dan adat istiadat.</p>
              </div>
        </a>
    </div>     
  </div> 

  {{-- tentang kpb gianyar --}}
  <section class="mt-5">
    <div class="grid max-w-screen-xl pb-6 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12">
        <div class="mr-auto px-6 place-self-center lg:col-span-7">
          <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl">KPB Gianyar</h1>
          <p class="max-w-2xl mb-1 font-light text-gray-500 mb-4 md:text-lg lg:text-xl">Lembaga Sosial yang bergerak di bidang Pendidikan Pelestarian Budaya bagi generasi muda di kab. Gianyar.</p>
          <a href="{{ route('tentang') }}" 
              class="text-red-700 bg-white border border-red-700 hover:bg-red-50 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center">
              Tentang Kami
          </a>             
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
          <div class="relative w-full h-64 overflow-hidden rounded-lg">
            <img class="w-full h-full object-cover transition-all transform hover:scale-110 hover:object-center" src="https://www.sma1-sukawati.sch.id/aset/uploads/1.jpeg" alt="mockup">
          </div>
        </div>                                   
    </div>
  </section>

  {{-- Blog Section --}}
  <div class="bg-gray-50 py-10">
    <div class="text-center">
        <h2 class="text-4xl font-bold text-red-700">Blog</h2>
        <p class="text-gray-500 px-6 lg:text-xl mx-auto max-w-xl pt-2">
            Temukan artikel seputar kebudayaan serta informasi yang menginspirasi dan memperkaya wawasan Anda
        </p>
    </div>
    
    <div class="block md:hidden py-4">
      <div class="swiper-container">
          <div class="swiper-wrapper">
              @foreach ($blogs as $blog)
                  <div class="swiper-slide">
                      <a class="block" href="{{ route('blogDetail', $blog->slug) }}">
                          <div class="relative flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg w-80 sm:w-96 transform hover:bg-gray-100 transition-all">
                              <div class="relative h-48 sm:h-56 m-2.5 overflow-hidden text-white rounded-md">
                                  <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-full">
                              </div>
                              <div class="p-4">
                                  <div class="mb-4 inline-block rounded-full bg-red-700 py-0.5 px-2.5 text-xs text-white shadow-sm text-center">
                                      KEBUDAYAAN
                                  </div>
                                  <h6 class="mb-2 text-slate-800 text-lg sm:text-xl font-semibold">
                                      {{ $blog->title }}
                                  </h6>
                                  <p class="text-slate-600 text-sm sm:text-base leading-normal font-light">
                                      {{ Str::limit(strip_tags($blog->content), 100) }}
                                  </p>
                              </div>
                              <div class="flex items-center justify-between p-4">
                                  <div class="flex items-center">
                                      <img 
                                          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s" 
                                          alt="{{ $blog->author }}" 
                                          class="h-8 w-8 sm:h-10 sm:w-10 rounded-full object-cover mr-3"
                                      />
                                      <div class="flex flex-col">
                                          <span class="text-slate-800 font-semibold text-sm sm:text-base">{{ $blog->author }}</span>
                                          <span class="text-slate-600 text-xs sm:text-sm">{{ $blog->created_at->translatedFormat('d F Y') }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  
  <!-- Tampilan Normal (Grid) di Desktop -->
  <div class="hidden md:flex flex-wrap justify-center items-center">
      @foreach ($blogs as $blog)
          <a class="px-3" href="{{ route('blogDetail', $blog->slug) }}">
              <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                      <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-full">
                  </div>
                  <div class="p-4">
                      <div class="mb-4 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                          KEBUDAYAAN
                      </div>
                      <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                          {{ $blog->title }}
                      </h6>
                      <p class="text-slate-600 leading-normal font-light">
                          {{ Str::limit(strip_tags($blog->content), 100) }}
                      </p>
                  </div>
                  <div class="flex items-center justify-between p-4">
                      <div class="flex items-center">
                          <img 
                              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s" 
                              alt="{{ $blog->author }}" 
                              class="h-10 w-10 rounded-full object-cover mr-3"
                          />
                          <div class="flex flex-col">
                              <span class="text-slate-800 font-semibold">{{ $blog->author }}</span>
                              <span class="text-slate-600">{{ $blog->created_at->translatedFormat('d F Y') }}</span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
      @endforeach
  </div>

    <div class="flex items-center justify-center">
      <a href="{{ route('blog') }}" 
          class="text-red-700 bg-gray-50 border border-red-700 hover:bg-red-50 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center">
          Baca Artikel Lainnya
      </a>  
    </div>
  </div>

  {{-- Footer --}}
  @include('partials/footer') 
</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      new Swiper('.swiper-container', {
          slidesPerView: 1.2,  // Card utama besar, yang lain lebih kecil
          centeredSlides: true, 
          spaceBetween: 10,  // Jarak antar card
          loop: true,  // Bisa diputar terus
          breakpoints: {
              640: { slidesPerView: 2.2, spaceBetween: 15 } // Jika ukuran > 640px, tampilkan lebih banyak
          }
      });
  });
</script>

</html>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="icon" href="{{ asset('storage/images/Logo-KPB.png') }}" type="image/png">
  <title>KPB Gianyar</title>
</head>
<body>
  {{-- Header --}}
  @include('partials.navbar') 

  {{-- hero-banner --}}
  <div class="relative h-64 w-full mt-16">
    <img src="https://cdn1-production-images-kly.akamaized.net/RvgFMqx94Ax7Z0c9rL_93ESSNcY=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3600501/original/012868700_1634080256-WhatsApp_Image_2021-10-11_at_23.40.40__1_.jpeg" alt="Background Image" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-white bg-opacity-70"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
      <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl text-red-700 text-center">Kebudayaan Kab Gianyar</h1>
      <p class="text-center max-w-2xl font-light lg:mb-4 md:text-lg lg:text-xl">
        Telusuri kebudayaan yang ada di Kabupaten Gianyar
      </p>
    </div>
  </div> 

  {{-- Search --}}
  <div class="mt-6">
    <form class="flex items-center max-w-lg mx-auto">   
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
            </svg>            
          </div>
          <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5" placeholder="Cari berdasarkan nama atau kategori atau lokasi..." required />
      </div>
      <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search</span>
      </button>
    </form>
  </div>

  <div class="flex justify-center items-center">
    <!-- Card -->
    <a class="px-3" href="javascript:void(0)">
      <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
          <img src="https://nusantara7.id/wp-content/uploads/2022/05/Tradisi-Mejarag-Ekspresi-Rasa-Syukur-pada-Sang-Hyang-Widhi-di-Pulau-Bali-2.png" alt="card-image" />
        </div>
        <div class="px-4 pb-4">
          <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
            Tak Benda
          </div>
          <h5 class="text-slate-800 text-2xl font-semibold">
            Mejarag
          </h5>
          <p class="text-sm text-gray-400">Sebatu, Tegallalang</p>
          <p class="text-slate-600 leading-normal font-light">
            Sesuai dengan Undang-Undang Republik Indonesia Nomor 11 Tahun 2010 tentang Cagar...
          </p>
        </div>
      </div> 
    </a>
    <!-- Card -->
    <a class="px-3" href="javascript:void(0)">
      <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
          <img src="https://img.trvcdn.net/https://bb.trvcdn.net/uploads/galleries/pegulingan4_1518511940.jpg?imgeng=m_box/w_1418/h_946" alt="card-image" />
        </div>
        <div class="px-4 pb-4">
          <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
            Benda
          </div>
          <h5 class="text-slate-800 text-2xl font-semibold">
            Pura Pegulingan
          </h5>
          <p class="text-sm text-gray-400">Manukaya, Tampaksiring</p>
          <p class="text-slate-600 leading-normal font-light">
            Sesuai dengan Undang-Undang Republik Indonesia Nomor 11 Tahun 2010 tentang Cagar...
          </p>
        </div>
      </div> 
    </a>
    <!-- Card -->
    <a class="px-3" href="javascript:void(0)">
      <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
          <img src="https://asset.kompas.com/crops/IsZ-rUPpSY8QtzOVtvWhB4dyKSE=/4x0:4342x2892/750x500/data/photo/2023/09/07/64f9eed1ea2d8.jpg" alt="card-image" />
        </div>
        <div class="px-4 pb-4">
          <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
            Tak Benda
          </div>
          <h5 class="text-slate-800 text-2xl font-semibold">
            Ngerebeg
          </h5>
          <p class="text-sm text-gray-400">Tegallalang</p>
          <p class="text-slate-600 leading-normal font-light">
            Sesuai dengan Undang-Undang Republik Indonesia Nomor 11 Tahun 2010 tentang Cagar...
          </p>
        </div>
      </div> 
    </a>
  </div>

  <div id="pagination" class="flex justify-center space-x-2 mt-6">
    <button id="prevPage" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 disabled:bg-red-700" disabled>
      1
    </button>
    <span id="currentPage" class="text-gray-700 font-semibold"></span>
    <button id="nextPage" class="bg-white px-4 py-2 rounded hover:bg-gray-200 disabled:bg-red-200">
      2
    </button>
  </div>

  <div class="fixed bottom-4 right-4">
    <button class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-full shadow-lg">
      Lapor Budaya
    </button>
  </div>

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
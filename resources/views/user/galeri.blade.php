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
      <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-red-700 text-red-700">Galeri Kegiatan</h1>
      <p class="text-center max-w-2xl font-light lg:mb-4 md:text-lg lg:text-xl dark:text-white-400">
        Jelajahi dokumentasi kegiatan yang telah dilaksanakan oleh Kader Pelestari Budaya Kabupaten Gianyar
      </p>
    </div>
  </div>  

  {{-- Search --}}
  <div class="my-6">
    <form class="flex items-center max-w-lg mx-auto">   
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>                    
          </div>
          <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5" placeholder="Cari berdasarkan judul" required />
      </div>
      <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search</span>
      </button>
    </form>
  </div>

  {{-- Card --}}
  <div class="flex justify-center items-center">
    <a href="link-ke-halaman-1" class="max-w-sm bg-white border border-gray-100 rounded-lg shadow mx-3 transform hover:scale-105 hover:bg-gray-50 transition-all">
      <img class="rounded-t-lg object-cover h-48 w-full transition-all" src="https://www.baliekbis.com/wp-content/uploads/2019/07/DSCF9054-800x445.jpg" alt="" />
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Kemah Budaya IX KPB Gianyar di Guwang, Sukawati</h5>
        <p class="text-gray-500">Arsip KPB Gianyar</p>
      </div>
    </a>

    <a href="link-ke-halaman-2" class="max-w-sm bg-white border border-gray-100 rounded-lg shadow mx-3 transform hover:scale-105 hover:bg-gray-50 transition-all">
      <img class="rounded-t-lg object-cover h-48 w-full transition-all" src="https://asset.kompas.com/crops/IkLhgxOmsy6z7VU21bt84dgjw90=/0x0:2896x1931/1200x800/data/photo/2023/12/07/65717a1769c4b.jpg" alt="" />
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Pembersihan Candi Tebing Kerobokan</h5>
        <p class="text-gray-500">Arsip KPB Gianyar</p>
      </div>
    </a>

    <a href="link-ke-halaman-3" class="max-w-sm bg-white border border-gray-100 rounded-lg shadow mx-3 transform hover:scale-105 hover:bg-gray-50 transition-all">
      <img class="rounded-t-lg object-cover h-48 w-full transition-all" src="https://www.baliekbis.com/wp-content/uploads/2018/06/img-20180629-wa0016.jpg" alt="" />
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Kemah Budaya VIII KPB Gianyar</h5>
        <p class="text-gray-500">Arsip KPB Gianyar</p>
      </div>
    </a>
  </div>



  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
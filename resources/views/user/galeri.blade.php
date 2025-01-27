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
    <div class="absolute inset-0 bg-white bg-opacity-70 dark:bg-black"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
      <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-red-700 text-red-700">Galeri Kegiatan</h1>
      <p class="text-center max-w-2xl font-light lg:mb-4 md:text-lg lg:text-xl dark:text-white-400">
        Jelajahi dokumentasi kegiatan yang telah dilaksanakan oleh Kader Pelestari Budaya Kabupaten Gianyar
      </p>
    </div>
  </div>  

  {{-- Card --}}
  <div class="flex justify-center items-center my-16">
    <a href="link-ke-halaman-1" class="max-w-sm bg-white border border-gray-100 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-3 transform hover:scale-105 hover:bg-gray-50 transition-all">
      <img class="rounded-t-lg object-cover h-48 w-full transition-all" src="https://www.baliekbis.com/wp-content/uploads/2019/07/DSCF9054-800x445.jpg" alt="" />
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kemah Budaya IX KPB Gianyar di Guwang, Sukawati</h5>
        <p class="text-gray-500">Arsip KPB Gianyar</p>
      </div>
    </a>

    <a href="link-ke-halaman-2" class="max-w-sm bg-white border border-gray-100 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-3 transform hover:scale-105 hover:bg-gray-50 transition-all">
      <img class="rounded-t-lg object-cover h-48 w-full transition-all" src="https://asset.kompas.com/crops/IkLhgxOmsy6z7VU21bt84dgjw90=/0x0:2896x1931/1200x800/data/photo/2023/12/07/65717a1769c4b.jpg" alt="" />
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pembersihan Candi Tebing Kerobokan</h5>
        <p class="text-gray-500">Arsip KPB Gianyar</p>
      </div>
    </a>

    <a href="link-ke-halaman-3" class="max-w-sm bg-white border border-gray-100 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-3 transform hover:scale-105 hover:bg-gray-50 transition-all">
      <img class="rounded-t-lg object-cover h-48 w-full transition-all" src="https://www.baliekbis.com/wp-content/uploads/2018/06/img-20180629-wa0016.jpg" alt="" />
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kemah Budaya VIII KPB Gianyar</h5>
        <p class="text-gray-500">Arsip KPB Gianyar</p>
      </div>
    </a>
  </div>



  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
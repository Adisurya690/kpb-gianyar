<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
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
      <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl text-red-700 text-center">Blog</h1>
      <p class="text-center max-w-2xl font-light lg:mb-4 md:text-lg lg:text-xl">
        Temukan artikel seputar kebudayaan serta informasi yang menginspirasi dan memperkaya wawasan Anda
      </p>
    </div>
  </div> 

  <div class="mt-6">
    <form class="flex items-center max-w-lg mx-auto">   
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>                                  
          </div>
          <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5" placeholder="Temukan artikel seputar kebudayaan..." required />
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
    {{-- card 1 --}}
    <a class="px-3" href="javascript:void(0)">
      <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
          <img src="https://www.sejarahbali.com/public/uploads/berita/Berita_231005020550_sejarah-pura-mengening-tampaksiring-gianyar.webp" alt="card-image" />
        </div>
        <div class="px-4 pb-4">
          <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
            KEBUDAYAAN
          </div>
          <h6 class="mb-2 text-slate-800 text-xl font-semibold">
            Cagar Budaya | Membuka Wawasan Kebudayaan
          </h6>
          <p class="text-slate-600 leading-normal font-light">
            Sesuai dengan Undang-Undang Republik Indonesia Nomor 11 Tahun 2010 tentang Cagar budaya, BAB I Pasal 1 menyebutkan bahwa Cagar Budaya adalah...
          </p>
        </div>
    
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center">
            <img
              alt="Nitya Nanda"
              src="https://scontent.fdps2-1.fna.fbcdn.net/v/t1.6435-9/39453341_1031206197040755_8185257855633326080_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5bbf69&_nc_eui2=AeGMl837T0II-LNh_FpIMMNcp5LY0Dm7LRanktjQObstFjzVax-yhA5WPzpRml20b3iMgw1SkDxMRZUUItvmC7sX&_nc_ohc=02DLNKufuuEQ7kNvgFQG_aV&_nc_zt=23&_nc_ht=scontent.fdps2-1.fna&_nc_gid=A3Yy_h7jIf16kIq16Vxw0JO&oh=00_AYBNYoBKLieP_Hj-6LDL7wyS01d2t8wxP6FcQyQepSpzQQ&oe=67851878"
              class="relative inline-block h-8 w-8 rounded-full object-cover"
            />
            <div class="flex flex-col ml-3 text-sm">
              <span class="text-slate-800 font-semibold">Nitya Nanda</span>
              <span class="text-slate-600">
                January 10, 2024
              </span>
            </div>
          </div>
        </div>
      </div> 
    </a>

    {{-- card 2 --}}
    <a class="px-3" href="javascript:void(0)">
      <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
          <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/baliexpress/2017/12/pakaian-adat-ungkap-simbolik-dharma-ini-penjelasannya_m_35526.jpeg" alt="card-image" />
        </div>
        <div class="px-4 pb-4">
          <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
            KEBUDAYAAN
          </div>            
          <h6 class="mb-2 text-slate-800 text-xl font-semibold">
            Memahami Makna filosofis Busana Adat Bali
          </h6>
          <p class="text-slate-600 leading-normal font-light">
            Dewasa ini globalisasi sangat mempengaruhi kehidupan manusia, mulai dari cara berpikir, prilaku, hingga mempengaruhi sosial budaya salah satunya dalam menggunakan busana...
          </p>
        </div>
    
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center">
            <img
              alt="Triadi Adnyani"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s"
              class="relative inline-block h-8 w-8 rounded-full object-cover"
            />
            <div class="flex flex-col ml-3 text-sm">
              <span class="text-slate-800 font-semibold">Triadi Adnyani</span>
              <span class="text-slate-600">
                January 10, 2024
              </span>
            </div>
          </div>
        </div>
      </div> 
    </a>

    {{-- card 3 --}}
    <a class="px-3" href="javascript:void(0)">
      <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
          <img src="https://puragunungsalak.or.id/wp-content/uploads/2018/07/Canang-sari.jpg" alt="card-image" />
        </div>
        <div class="px-4 pb-4">
          <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
            KEBUDAYAAN
          </div>
          <h6 class="mb-2 text-slate-800 text-xl font-semibold">
            Makna Upakara Canang Sari dan Uparengga Kelabang Mantri
          </h6>
          <p class="text-slate-600 leading-normal font-light">
            Beragama di zaman modern seperti sekarang ini, tidak dapat disamakan dengan kehidupan beragama pada masa silam. Kehidupan masyarakat masa lalu yang secara...
          </p>
        </div>
    
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center">
            <img
            alt="Dewa Edi"
            src="https://sakti.unmas.ac.id/dosen/808/foto/hwJjIK06pDoFdWN7DI9c6iCqGWwZvWgFbvRVL1OP.jpg"
            class="relative inline-block h-8 w-8 rounded-full object-cover"
            />            
            <div class="flex flex-col ml-3 text-sm">
              <span class="text-slate-800 font-semibold">Dewa Edi</span>
              <span class="text-slate-600">
                January 10, 2024
              </span>
            </div>
          </div>
        </div>
      </div> 
    </a>
  </div>

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
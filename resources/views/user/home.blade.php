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
  <section class="relative bg-[url('')] bg-cover bg-center bg-no-repeat">
    <div class="absolute inset-0 bg-gradient-to-r from-white/100 to-transparent"></div>
    <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
      <div class="max-w-xl text-center sm:text-left">
        <h1 class="text-3xl font-extrabold sm:text-7xl text-red-700">KPB Gianyar</h1>
        <p class="mt-4 sm:text-xl">
          Kader Pelestari Budaya Kabupaten Gianyar adalah lembaga sosial yang bergerak di bidang pendidikan pelestarian budaya dan pengembangan potensi bagi generasi muda di Kabupaten Gianyar
        </p>
      </div>
    </div>
  </section>  
  
  {{-- card budaya --}}
  <div class="space-x-4 bg-gray-50 py-10">
    <div class="text-center">
      <h2 class="text-4xl font-bold text-red-700">Kebudayaan</h2>
      <p class="text-gray-500 lg:text-xl">Daftar kebudayaan di Kabupaten Gianyar</p>
    </div>
    <div class="flex justify-center items-center py-5">
      <!-- Card 1 -->
      <a href="{{ route('kebudayaan') }}" class="flex flex-col items-center bg-white mx-3 border border-gray-200 rounded-lg shadow max-w-md hover:bg-gray-100 transform hover:scale-105 transition-all">
        <div class="w-full h-48 overflow-hidden">
          <img class="object-cover w-full h-full rounded-t-lg" src="https://www.rentalmobilbali.net/wp-content/uploads/2021/04/Candi-Tebing-Gunung-Kawi-Facebook.jpg" alt="Card Image">
        </div>
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Budaya Benda</h5>
          <p class="mb-3 font-normal text-gray-700">Warisan budaya yang berbentuk fisik, seperti bangunan, artefak, dan benda-benda bersejarah yang memiliki nilai sejarah dan budaya</p>
        </div>
      </a>
      
      <!-- Card 2 -->
      <a href="{{ route('kebudayaan') }}" class="flex flex-col items-center bg-white mx-3 border border-gray-200 rounded-lg shadow max-w-md hover:bg-gray-100 transform hover:scale-105 transition-all">
        <div class="w-full h-48 overflow-hidden">
          <img class="object-cover w-full h-full rounded-t-lg" src="https://statik.tempo.co/data/2023/02/08/id_1179591/1179591_720.jpg" alt="Card Image">
        </div>
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Budaya Tak Benda</h5>
          <p class="mb-3 font-normal text-gray-700">Nilai, tradisi, dan ekspresi budaya yang tidak berbentuk fisik, seperti kesenian, bahasa, dan adat istiadat yang diwariskan secara turun-temurun.</p>
        </div>
      </a>
    </div> 
  </div> 

  {{-- tentang kpb gianyar --}}
  <section class="bg-white mt-5">
    <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
          <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl">KPB Gianyar</h1>
          <p class="max-w-2xl mb-1 font-light text-gray-500 lg:mb-4 md:text-lg lg:text-xl">Lembaga Sosial yang bergerak di bidang Pendidikan Pelestarian Budaya bagi generasi muda di kab. Gianyar.</p>
          <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center">Tentang Kami</button>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
          <div class="relative w-full h-64 overflow-hidden rounded-lg">
            <img class="w-full h-full object-cover transition-all transform hover:scale-110 hover:object-center" src="https://www.sma1-sukawati.sch.id/aset/uploads/1.jpeg" alt="mockup">
          </div>
        </div>                                   
    </div>
  </section>

  {{-- blog --}}
  <div class="bg-gray-50 py-10">
    <div class="text-center">
      <h2 class="text-4xl font-bold text-red-700">Blog</h2>
      <p class="text-gray-500 lg:text-xl mx-auto max-w-xl pt-2">Temukan artikel seputar kebudayaan serta informasi yang menginspirasi dan memperkaya wawasan Anda</p>
    </div>
    <div class="flex justify-center items-center">
      {{-- card 1 --}}
      <a class="px-3" href="javascript:void(0)">
        <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 transform hover:bg-gray-100 hover:scale-105 transition-all">
          <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
            <img src="https://www.sejarahbali.com/public/uploads/berita/Berita_231005020550_sejarah-pura-mengening-tampaksiring-gianyar.webp" alt="card-image" />
          </div>
          <div class="p-4">
            <div class="mb-4 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
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
          <div class="p-4">
            <div class="mb-4 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
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
          <div class="p-4">
            <div class="mb-4 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
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
    <div class="flex items-center justify-center">
      <a href="{{ route('blog') }}" 
        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center">
        Baca Artikel Lainnya
      </a>
    </div>    
  </div>

  {{-- Footer --}}
  @include('partials/footer') 
</body>
</html>
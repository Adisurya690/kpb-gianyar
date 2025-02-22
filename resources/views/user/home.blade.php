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
      <div class="hidden lg:mt-0 lg:col-span-5 lg:flex relative" style="width: 100%; height: 500px;">
          <img class="lg:ml-24 absolute z-10 floating-img" src="{{ asset('storage/images/lingga-yoni.png') }}" alt="lingga yoni" style="max-width: 100%; height: auto;">
          <img class="lg:ml-24 absolute z-0" src="{{ asset('storage/images/blob1.gif') }}" alt="blob" style="opacity: 0.7; width: 94%; height: auto; top: -50px;">
          <img class="lg:ml-24 absolute z-0" src="{{ asset('storage/images/blob2.gif') }}" alt="blob" style="opacity: 0.6; width: 99%; height: auto; top: -50px;">
      </div>            
    </div>
  </section>  
  
  {{-- card budaya --}}
  <div class="space-x-4 bg-gray-50 py-10">
    <div class="text-center">
      <h2 class="text-4xl font-bold text-red-700">Kebudayaan</h2>
      <p class="text-gray-500 lg:text-xl">Kategori kebudayaan di Kabupaten Gianyar</p>
    </div>
    <div class="flex justify-center items-center py-5">
      <!-- Card 1: Budaya Benda -->
      <a href="{{ route('user.kebudayaan', ['category' => 'Benda']) }}" class="flex flex-col items-center bg-white mx-3 border border-gray-200 rounded-lg shadow max-w-md hover:bg-gray-100 transform hover:scale-105 transition-all">
        <div class="w-full h-48 overflow-hidden">
          <img class="object-cover w-full h-full rounded-t-lg" src="https://www.rentalmobilbali.net/wp-content/uploads/2021/04/Candi-Tebing-Gunung-Kawi-Facebook.jpg" alt="Card Image">
        </div>
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Budaya Benda</h5>
          <p class="mb-3 font-normal text-gray-700">Warisan budaya yang berbentuk fisik, seperti bangunan, artefak, dan benda-benda bersejarah yang memiliki nilai sejarah dan budaya</p>
        </div>
      </a>
      
      <!-- Card 2: Budaya Tak Benda -->
      <a href="{{ route('user.kebudayaan', ['category' => 'Tak Benda']) }}" class="flex flex-col items-center bg-white mx-3 border border-gray-200 rounded-lg shadow max-w-md hover:bg-gray-100 transform hover:scale-105 transition-all">
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

  {{-- Blog Section --}}
  <div class="bg-gray-50 py-10">
    <div class="text-center">
        <h2 class="text-4xl font-bold text-red-700">Blog</h2>
        <p class="text-gray-500 lg:text-xl mx-auto max-w-xl pt-2">
            Temukan artikel seputar kebudayaan serta informasi yang menginspirasi dan memperkaya wawasan Anda
        </p>
    </div>
    
    <div class="flex flex-wrap justify-center items-center">
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
                                <span class="text-slate-600">{{ $blog->created_at->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
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
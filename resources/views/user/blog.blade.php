<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  <style>
    body {
        font-family: Helvetica, Arial, sans-serif;
    }
  </style>
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
      <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl text-red-700 text-center">Blog</h1>
      <p class="text-center max-w-2xl font-light lg:mb-4 md:text-lg lg:text-xl">
        Temukan artikel seputar kebudayaan serta informasi yang menginspirasi dan memperkaya wawasan Anda
      </p>
    </div>
  </div> 

  <div class="mt-6">
    <form class="flex items-center max-w-lg mx-auto" method="GET" action="{{ route('blog') }}">  
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
            </svg>                                  
          </div>
          <input 
            type="text" 
            name="query" 
            id="simple-search" 
            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5" 
            placeholder="Temukan artikel seputar kebudayaan..." 
            value="{{ request('query') }}" 
          />
      </div>
      <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search</span>
      </button>
    </form>  
  </div>

  <div class="flex flex-wrap justify-center items-stretch gap-6 py-6">
    @forelse ($blogs as $blog)
        <a class="w-full sm:w-80 md:w-96 transform hover:scale-105 transition-all" href="{{ route('blogDetail', $blog->slug) }}">
            <div class="flex flex-col bg-white shadow-md border border-gray-200 rounded-lg overflow-hidden hover:bg-gray-100">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 text-xs text-white">
                        Kebudayaan
                    </div>
                    <h6 class="text-slate-800 text-xl font-semibold mb-2">
                        {{ $blog->title }}
                    </h6>
                    <p class="text-slate-600 font-light leading-relaxed">
                        {{ Str::limit(strip_tags($blog->content), 100) }}
                    </p>
                </div>
                <div class="flex items-center justify-between px-4 pb-4">
                    <div class="flex items-center">
                        <img 
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s" 
                            alt="{{ $blog->author }}" 
                            class="h-10 w-10 rounded-full object-cover mr-3"
                        />
                        <div>
                            <span class="text-slate-800 font-semibold">{{ $blog->author }}</span>
                            <div class="text-slate-600 text-sm">
                                {{ $blog->created_at->format('F d, Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="text-center text-gray-500 mt-12 h-screen">
            <p>Tidak ada hasil yang ditemukan{{ isset($query) ? ' untuk pencarian "' . $query . '"' : '' }}.</p>
        </div>
    @endforelse
</div>


  {{-- <div class="mt-6">
      {{ $blog->links('pagination::tailwind') }}
  </div> --}}

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
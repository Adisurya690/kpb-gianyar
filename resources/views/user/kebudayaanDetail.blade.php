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
        {{-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  @endif
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

  <div class="mt-8">
    <main class="pt-8 pb-16 lg:pt-16 bg-white antialiased">
      <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
          <article class="mx-auto w-full format format-sm sm:format-base lg:format-lg format-blue">
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                {{ $kebudayaan->name }}
            </h1>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
              <!-- Carousel wrapper -->
              <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                  @foreach($kebudayaan->images as $image)
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                      <img src="{{ asset('storage/' . $image->path) }}" 
                          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                          alt="Gambar {{ $loop->index + 1 }}">
                  </div>
                  @endforeach
              </div>
          
              <!-- Slider indicators -->
              <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                  @foreach($kebudayaan->images as $index => $image)
                  <button type="button" class="w-3 h-3 rounded-full" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                  @endforeach
              </div>
          
              <!-- Slider controls -->
              <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                      <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                      </svg>
                      <span class="sr-only">Previous</span>
                  </span>
              </button>
              <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                      <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="sr-only">Next</span>
                  </span>
              </button>
          </div>          
            <br>
            <p class="mt-1 text-justify">{!! $kebudayaan->description !!}</p>          
          </article>
      </div>
    </main>
    
    {{-- Other Kebudayaan section --}}
    <aside aria-label="Kebudayaan lainnya" class="py-8 bg-gray-50">
      <div class="px-4 mx-auto max-w-screen-xl">
          <h2 class="mb-4 text-3xl font-bold text-gray-900 text-center">Kebudayaan lainnya</h2>
          <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4 justify-center">
              @foreach ($otherKebudayaans as $item)
              <article class="max-w-xs bg-white p-2 rounded-lg shadow-lg">
                  <a href="{{ route('kebudayaan.detail', $item->slug) }}">
                    <img src="{{ asset('storage/' . $item->featured_image) }}" class="mb-2 rounded-lg w-full aspect-[3/2] object-cover" alt="{{ $item->name }}">
                  </a>
                  <div class="p-1">
                    <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                      {!! $kebudayaan->category !!}
                    </div>
                    <h2 class="text-xl font-bold leading-tight text-gray-900">
                      <a href="{{ route('kebudayaan.detail', $item->slug) }}">{{ $item->name }}</a>
                    </h2>
                    <p class="text-justify text-gray-500">{{ Str::limit(strip_tags($item->description), 99, '...') }}</p>
                  </div>
              </article>
              @endforeach
          </div>
      </div>
    </aside>  

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>
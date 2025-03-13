<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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

  <div class="mt-8">
    <main class="pt-8 pb-16 lg:pt-16 bg-white antialiased">
      <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
          <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                {{ $kebudayaan->name }}
            </h1>
            <div x-data="carousel()" x-init="autoSlide()" class="relative w-full overflow-hidden">
              <!-- Carousel Wrapper -->
              <div class="relative flex transition-transform duration-700 ease-in-out"
                  :style="'transform: translateX(-' + (currentSlide * 100) + '%);'">
                  <template x-for="(slide, index) in slides" :key="index">
                      <div class="min-w-full">
                          <img :src="slide" class="block w-full h-56 md:h-96 object-cover rounded-lg" alt="Slide">
                      </div>
                  </template>
              </div>
          
              <!-- Slider Indicators -->
              <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                  <template x-for="(slide, index) in slides" :key="index">
                      <button @click="goToSlide(index)" class="w-2 h-2 rounded-full transition-all duration-300"
                          :class="currentSlide === index ? 'bg-white scale-110' : 'bg-gray-400 opacity-50'"></button>
                  </template>
              </div>
          
              <!-- Slider Controls -->
              <button @click="prev()" class="absolute top-1/2 left-2 -translate-y-1/2 z-30 flex items-center justify-center h-10 w-10 bg-white/30 rounded-full group hover:bg-white/50 focus:outline-none">
                  <svg class="w-4 h-4 text-white group-hover:text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                  </svg>
              </button>
              
              <button @click="next()" class="absolute top-1/2 right-2 -translate-y-1/2 z-30 flex items-center justify-center h-10 w-10 bg-white/30 rounded-full group hover:bg-white/50 focus:outline-none">
                  <svg class="w-4 h-4 text-white group-hover:text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
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
                    <img src="{{ $item->getFeaturedImageUrl() }}" class="mb-2 rounded-lg w-full aspect-[3/2] object-cover" alt="{{ $item->name }}">
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

<script>
  function carousel() {
      return {
          currentSlide: 0,
          slides: [
              @foreach($kebudayaan->images as $image)
                  '{{ asset('storage/' . $image->path) }}',
              @endforeach
          ],
          next() {
              this.currentSlide = (this.currentSlide + 1) % this.slides.length;
          },
          prev() {
              this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
          },
          goToSlide(index) {
              this.currentSlide = index;
          },
          autoSlide() {
              setInterval(() => {
                  this.next();
              }, 5000);
          }
      }
  }
</script>
</html>
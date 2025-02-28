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

  
  <div class="mt-8">
    <main class="pt-8 pb-16 lg:pt-16 bg-white antialiased">
      <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
          <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                {{ $blog->title }}
            </h1>
            <address class="flex items-center mb-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                    <img class="mr-4 w-12 h-12 rounded-full" alt="profile" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjQq0H0bJLAd7DqBx8whulYKSJUb_gKCQHoGlHyTVn_ssHs0dFAvV1b7ccSm7lwEQkT_pysCDIRLhu0069McN4sLGaFEYd5PQnjJjJVvrpwtQ_W0MKpY2OfBHSh0smdqvTws9Jz3Kwvy5o/s1600/kader_pelestari_budaya_kabupaten_gianyar.png" alt="{{ $blog->author }}">
                    <div>
                        <a href="#" rel="author" class="text-base font-bold text-gray-900">{{ $blog->author }}</a>
                        <p class="text-base text-gray-500"><time pubdate datetime="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->format('M d, Y') }}</time></p>
                    </div>
                </div>
            </address>
            <figure>
                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                <figcaption class="text-gray-400 text-sm mt-2">{{ $blog->image_caption }}</figcaption>
            </figure>
            <br>
            <p class="mt-1 text-justify">{!! $blog->content !!}</p>          
          </article>
      </div>
    </main>
    
    {{-- Other blog section --}}
    <aside aria-label="Blog lainnya" class="py-8 bg-gray-50">
      <div class="px-4 mx-auto max-w-screen-xl">
          <h2 class="mb-4 text-3xl font-bold text-gray-900 text-center">Blog lainnya</h2>
          <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4 justify-center">
              @foreach ($otherBlogs as $item)
              <article class="max-w-xs bg-white p-2 rounded-lg shadow-lg">
                  <a href="{{ route('blogDetail', $item->slug) }}">
                      <img src="{{ asset('storage/' . $item->featured_image) }}" class="mb-2 rounded-lg w-full aspect-[3/2] object-cover" alt="{{ $item->title }}">
                  </a>
                  <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                      Kebudayaan
                  </div>
                  <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                      <a href="{{ route('blogDetail', $item->slug) }}">{{ $item->title }}</a>
                  </h2>
                  <p class="mb-4 text-gray-500">{{ Str::limit(strip_tags($item->content), 99, '...') }}</p>
                  <div class="flex items-center justify-between">
                      <div class="flex items-center">
                          <img
                              alt="{{ $item->author }}"
                              src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjQq0H0bJLAd7DqBx8whulYKSJUb_gKCQHoGlHyTVn_ssHs0dFAvV1b7ccSm7lwEQkT_pysCDIRLhu0069McN4sLGaFEYd5PQnjJjJVvrpwtQ_W0MKpY2OfBHSh0smdqvTws9Jz3Kwvy5o/s1600/kader_pelestari_budaya_kabupaten_gianyar.png"
                              class="relative inline-block h-8 w-8 rounded-full object-cover"
                          />
                          <div class="flex flex-col ml-3 text-sm">
                              <span class="text-slate-800 font-semibold">{{ $item->author }}</span>
                              <span class="text-slate-600">{{ $item->created_at->format('F d, Y') }}</span>
                          </div>
                      </div>
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
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

  <div class="mt-8">
    <main class="pt-8 pb-16 lg:pt-16 bg-white antialiased">
      <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
          <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                {{ $kebudayaan->name }}
            </h1>
            <figure>
                <img src="{{ asset('storage/' . $kebudayaan->featured_image) }}" alt="{{ $kebudayaan->name }}">
                <figcaption class="text-gray-400 text-sm mt-2">{{ $kebudayaan->name }}</figcaption>
            </figure>
            <br>
            <p class="mt-1 text-justify">{!! $kebudayaan->description !!}</p>          
          </article>
      </div>
    </main>
    
    {{-- Other Kebudayaan section --}}
    <aside aria-label="Blog lainnya" class="py-8 bg-gray-50">
      <div class="px-4 mx-auto max-w-screen-xl">
          <h2 class="mb-4 text-3xl font-bold text-gray-900 text-center">Kebudayaan lainnya</h2>
          <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4 justify-center">
              @foreach ($otherKebudayaans as $item)
              <article class="max-w-xs bg-white p-2 rounded-lg shadow-lg">
                  <a href="{{ route('blogDetail', $item->slug) }}">
                    <img src="{{ asset('storage/' . $item->featured_image) }}" class="mb-2 rounded-lg w-full aspect-[3/2] object-cover" alt="{{ $item->name }}">
                  </a>
                  <div class="p-1">
                    <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                      {!! $kebudayaan->category !!}
                    </div>
                    <h2 class="text-xl font-bold leading-tight text-gray-900">
                      <a href="{{ route('blogDetail', $item->slug) }}">{{ $item->name }}</a>
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
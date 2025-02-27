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
      <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('storage/images/Logo-KPB.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  @endif
  <link rel="icon" href="{{ asset('storage/images/Logo-KPB.png') }}" type="image/png">
  <title>KPB Gianyar</title>
</head>
<body>
    {{-- Header --}}
    @include('partials.navbar')

    <div class="container mx-auto lg:pt-8 md:pt-8 min-h-screen">
      <div class="max-w-2xl lg:mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white lg:shadow-xl md:shadow-xl lg:rounded-lg md:rounded-lg text-gray-900">
          <div class="lg:rounded-t-lg md:rounded-t-lg h-32 overflow-hidden">
              <img class="object-cover object-top w-full" src='https://www.shutterstock.com/image-vector/dark-vivid-bright-trendy-background-260nw-2190243429.jpg' alt='Banner'>
          </div>
          <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
              <img class="object-cover object-center h-32" src="{{ !empty(Auth::guard('web')->check() && Auth::guard('web')->user()->profile_picture) 
              ? asset('storage/' . Auth::guard('web')->user()->profile_picture) 
              : (!empty(Auth::guard('internal')->check() && Auth::guard('internal')->user()->profile_picture) 
                  ? asset('storage/' . Auth::guard('internal')->user()->profile_picture) 
                  : 'https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg' ) }}"
              alt="user photo">
          </div>
          <div class="text-center my-2">
              <h2 class="font-semibold">{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->nickname : Auth::guard('internal')->user()->nickname }}</h2>
              <p class="text-gray-500">{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->name : Auth::guard('internal')->user()->name }}</p>
          </div>
          <div class="p-4 text-center">
            <p>{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->email : Auth::guard('internal')->user()->email }}</p>
            <p>{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->address : Auth::guard('internal')->user()->address }}</p>
            @if (Auth::guard('internal')->check()) 
                <p>{{ Auth::guard('internal')->user()->nia }}</p>
                <p>{{ Auth::guard('internal')->user()->position }}</p>
                <p>{{ Auth::guard('internal')->user()->kpbprov }}</p>
            @endif
          </div>
          <div class="p-4 lg:border-t md:border-t mx-8 mt-2 flex">
            <a href="{{ route('profile.edit') }}" 
                class="block mx-auto rounded-full bg-white border-2 border-red-700 text-red-700 hover:bg-red-700 hover:text-white hover:shadow-lg font-semibold px-9 py-2">
                Edit
            </a>
            
            <form method="POST" action="{{ Auth:: guard('web')->check() ? route('logout') : route('internal.logout') }}" class="flex mx-auto">
                @csrf
                <button type="submit" 
                    class="block rounded-full bg-white border-2 border-red-700 text-red-700 hover:bg-red-700 hover:text-white hover:shadow-lg font-semibold px-6 py-2">
                    Logout
                </button>
            </form>        
        </div>        
      </div>
    </div>

    {{-- Footer --}}
    @include('partials.footer')
</body>
</html>

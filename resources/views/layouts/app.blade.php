<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KPB Gianyar') }}</title>
        <link rel="icon" href="{{ asset('storage/images/Logo-KPB.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
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
              <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
          <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
          <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
          <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
        @endif
        <style>
          body {
              font-family: Helvetica, Arial, sans-serif;
          }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            {{-- @include('partials.navbar') --}}

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>

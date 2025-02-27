{{-- Belum Selesai --}}
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

  {{-- Main Content --}}
    <div class="container mx-auto py-8 h-screen">
      <h1 class="text-2xl font-bold mb-4">Status Laporan Kebudayaan</h1>

      @forelse ($reports as $report)
          <div class="bg-white rounded-lg shadow p-6 mb-6">
              <h2 class="text-xl font-semibold">{{ $report->name }}</h2>
              <p class="text-gray-700">Lokasi: {{ $report->location }}</p>
              <p class="text-gray-700">Deskripsi: {{ $report->description }}</p>

              <h3 class="mt-4 font-bold">Riwayat Status Laporan:</h3>
              <ul class="list-disc ml-5 mt-2">
                  @forelse ($report->statusHistories as $history)
                      <li>
                          <span class="font-semibold">{{ $history->status }}</span> - 
                          <span class="text-sm text-gray-500">{{ $history->created_at->format('d F Y') }}</span>
                          @if($history->note)
                              <p class="text-gray-600 italic">{{ $history->note }}</p>
                          @endif
                      </li>
                  @empty
                      <li class="text-gray-500 italic">Belum ada riwayat status.</li>
                  @endforelse
              </ul>
          </div>
      @empty
          <p class="text-gray-500 italic">Belum ada laporan yang Anda kirim.</p>
      @endforelse
    </div>

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>

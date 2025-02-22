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

  {{-- Main Content --}}
    <div class="container mx-auto py-8 min-h-screen">
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
                          <span class="text-sm text-gray-500">
                              {{ $history->created_at->locale('id')->translatedFormat('d F Y | H:i') }}
                          </span>
                          @if($history->note)
                              <p class="text-gray-600 italic">Catatan: {{ $history->note }}</p>
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

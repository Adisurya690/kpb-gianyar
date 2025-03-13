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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  {{-- Header --}}
  @include('partials.navbar') 

  {{-- hero-banner --}}
  <div class="relative h-64 w-full mt-16">
    <img src="https://cdn1-production-images-kly.akamaized.net/RvgFMqx94Ax7Z0c9rL_93ESSNcY=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3600501/original/012868700_1634080256-WhatsApp_Image_2021-10-11_at_23.40.40__1_.jpeg" alt="Background Image" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-white bg-opacity-70"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
      <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl text-red-700 text-center">Kebudayaan Kab Gianyar</h1>
      <p class="text-center max-w-2xl font-light lg:mb-4 md:text-lg lg:text-xl">
        Telusuri kebudayaan yang ada di Kabupaten Gianyar
      </p>
    </div>
  </div> 

  {{-- Search --}}
  <div class="mt-6 mx-6">
    <form class="flex items-center max-w-lg mx-auto" method="GET" action="{{ url()->current() }}">
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
          </svg>                                  
        </div>
        <input style="padding-left: 40px" type="text" id="simple-search" name="search" class="bg-white border text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5"
              value="{{ request('search') }}" placeholder="Cari berdasarkan nama atau kategori atau lokasi" />
      </div>
      <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
      </button>
    </form>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center">
    @forelse ($kebudayaan as $item)
      <a class="px-3" href="{{ route('kebudayaan.detail', $item->slug) }}">
        <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 hover:bg-gray-100 hover:scale-[1.02] transition-all">
          <div class="relative h-56 m-2.5 overflow-hidden rounded-md">
            <div class="absolute top-2 left-2 bg-red-700 py-0.5 px-2.5 text-xs text-white rounded-full">
              {{ $item->category }}
            </div>
            <img src="{{ $item->getFeaturedImageUrl() }}" alt="card-image" class="w-full h-full object-cover">
          </div>
          <div class="px-4 pb-4">
            <h5 class="text-slate-800 text-2xl font-semibold">
              {{ $item->name }}
            </h5>
            <p class="text-sm text-gray-400">{{ $item->location }}</p>
            <p class="text-slate-600 leading-normal font-light">
              {{ Str::limit(strip_tags($item->description), 100) }}
            </p>
          </div>
        </div>
      </a>
    @empty
      <div class="h-screen mt-8">
        <p class="text-center text-gray-500">Tidak ada kebudayaan yang ditemukan.</p>
      </div>
    @endforelse
  </div>

  <div class="mt-6 flex justify-center">
    {{ $kebudayaan->withQueryString()->links('pagination::bootstrap-4') }}
  </div>

  <div class="fixed bottom-4 right-4">
      <button id="floatingButton" class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-full shadow-lg flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
              stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" 
                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
          </svg>
          <span>Lapor Budaya</span>
      </button>
  </div>

  {{-- Modal --}}
  <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex justify-center items-center">
    <div class="bg-white p-4 rounded-lg w-96 max-w-sm relative">
        <button id="closeModal" class="absolute top-2 right-2 text-gray-600">X</button>
        @include('user.laporBudaya') {{-- Include Form --}}
    </div>
  </div>

  {{-- Footer --}}
  @include('partials.footer')

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Cek apakah user sudah login dan berasal dari tabel `users` atau `internals`
    const userRole = @json(Auth::guard('web')->check() ? 'user' : (Auth::guard('internal')->check() ? 'internal' : null));

    // Ambil element tombol dan modal
    const floatingButton = document.getElementById('floatingButton');
    const modal = document.getElementById('modal');
    const closeModal = document.getElementById('closeModal');

    // Fungsi untuk membuka modal
    floatingButton.addEventListener('click', () => {
        if (userRole === "user" || userRole === "internal") {
            modal.classList.remove('hidden'); // Menampilkan modal jika user atau internal login
        } else {
          Swal.fire({
              title: "Akses Ditolak!",
              text: "Anda harus login terlebih dahulu untuk melaporkan.",
              icon: "warning",
              confirmButtonText: "Login",
              showCancelButton: true,
              cancelButtonText: "Batal",
              customClass: {
                  confirmButton: "bg-red-700 text-white px-4 py-2 rounded-lg", // Tombol login warna merah
                  cancelButton: "bg-gray-100 text-red-700 px-4 py-2 rounded-lg" // Tombol batal warna abu-abu
              }
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "{{ route('login') }}"; // Redirect ke halaman login
              }
          });
        }
    });

    // Fungsi untuk menutup modal
    closeModal.addEventListener('click', () => {
        modal.classList.add('hidden'); // Menyembunyikan modal
    });

    // Jika klik di luar modal, modal juga akan ditutup
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>


</html>
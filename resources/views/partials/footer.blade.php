<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

{{-- Footer --}}
<footer class="bg-white">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
    <!-- Bagian Atas Footer -->
    <div class="md:flex md:justify-between">
      <!-- Logo dan Nama Website -->
      <div class="mb-6 md:mb-0">
        <a href="/" class="flex items-center">
          <img src="{{ asset('public/storage/images/Logo-KPB.png')}}" class="h-8 me-3" alt="Logo KPB Gianyar" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap">KPB Gianyar</span>
        </a>
      </div>

      <!-- Menu, Media Sosial, dan Alamat -->
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-8 sm:gap-6">
        <!-- Menu -->
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Menu</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            <li class="mb-4">
              <a href="{{ route('kebudayaan') }}" class="hover:underline">Kebudayaan</a>
            </li>
            <li class="mb-4">
              <a href="{{ route('blog') }}" class="hover:underline">Blog</a>
            </li>
            <li class="mb-4">
              <a href="{{ route('galeri') }}" class="hover:underline">Galeri</a>
            </li>
            <li class="mb-4">
              <a href="{{ route('tentang') }}" class="hover:underline">Tentang</a>
            </li>
          </ul>
        </div>

        <!-- Media Sosial -->
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Media Sosial</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            <li class="mb-4">
              <a href="https://instagram.com/kpbgianyar" class="hover:underline" target="_blank">Instagram</a>
            </li>
            <li class="mb-4">
              <a href="https://www.facebook.com/groups/kpbgianyar/" class="hover:underline" target="_blank">Facebook</a>
            </li>
            <li>
              <a href="https://www.youtube.com/@kpbgianyar" class="hover:underline" target="_blank">YouTube</a>
            </li>
          </ul>
        </div>

        <!-- Alamat -->
        <div class="col-span-2 sm:col-span-1">
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Alamat</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            <li class="mb-4">
              <a href="#" class="hover:underline">Br. Pande, Pejeng, <br> Tampaksiring, Gianyar</a>
            </li>
            <li>
              <a href="#" class="hover:underline">0812-3456-7890</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Garis Pemisah -->
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

    <!-- Bagian Bawah Footer (Copyright dan Sosial Media) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
      <!-- Copyright -->
      <span class="text-sm text-gray-500 text-center sm:text-left dark:text-gray-400">
        © 2025 <a href="https://kpbgianyar.com/" class="hover:underline">KPB Gianyar</a>
      </span>

      <!-- Sosial Media -->
      <div class="flex justify-center sm:justify-start mt-4 sm:mt-0 space-x-4">
        <a href="https://www.facebook.com/groups/kpbgianyar/" class="text-gray-600 hover:text-blue-600" target="_blank">
          <i class="fab fa-facebook fa-lg"></i>
        </a>
        <a href="https://instagram.com/kpbgianyar" class="text-gray-600 hover:text-pink-600" target="_blank">
          <i class="fab fa-instagram fa-lg"></i>
        </a>
        <a href="https://www.youtube.com/@kpbgianyar" class="text-gray-600 hover:text-red-600" target="_blank">
          <i class="fab fa-youtube fa-lg"></i>
        </a>
      </div>
    </div>
  </div>
</footer>
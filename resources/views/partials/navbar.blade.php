<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <!-- Logo dan Nama Website -->
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('storage/images/logo-KPB.png')}}" class="h-8 lg:mr-0" alt="Logo KPB Gianyar">
      <span class="self-center text-2xl font-semibold whitespace-nowrap">KPB Gianyar</span>
    </a>

    <!-- Bagian Kanan Navbar (Dropdown Profil, Tombol Daftar/Masuk, dan Burger Button) -->
    <div class="flex lg:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <!-- Dropdown Profil (Hanya Tampil di Desktop) -->
      @if(Auth::guard('web')->check() || Auth::guard('internal')->check())
        <div class="hidden lg:flex items-center lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse pl-3">
          <button type="button" class="flex text-sm bg-gray-800 rounded-full lg:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full object-cover aspect-square"
                src="{{ !empty(Auth::guard('web')->check() && Auth::guard('web')->user()->profile_picture) 
                          ? asset('storage/' . Auth::guard('web')->user()->profile_picture) 
                          : (!empty(Auth::guard('internal')->check() && Auth::guard('internal')->user()->profile_picture) 
                              ? asset('storage/' . Auth::guard('internal')->user()->profile_picture) 
                              : 'https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg' ) }}"
                alt="user photo">
          </button>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900">
                {{ Auth::guard('web')->check() ? Auth::guard('web')->user()->name : Auth::guard('internal')->user()->name }}
              </span>
              <span class="block text-sm text-gray-500 truncate">
                {{ Auth::guard('web')->check() ? Auth::guard('web')->user()->email : Auth::guard('internal')->user()->email }}
              </span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
              </li>
              <li>
                <a href="{{ route('status') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Laporan</a>
              </li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
              </li>
            </ul>
          </div>
          <form id="logout-form" action="{{ Auth:: guard('web')->check() ? route('logout') : route('internal.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      @else
        <!-- Tombol Daftar dan Masuk (Hanya Tampil di Desktop) -->
        <div class="hidden lg:flex items-center space-x-3 lg:space-x-0 rtl:space-x-reverse">
          <button type="button" onclick="window.location.href='{{ route('register') }}'" class="text-gray-900 lg:hover:text-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center mr-2">
            Daftar
          </button>
          <button type="button" onclick="window.location.href='{{ route('login') }}'" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center">
            Masuk
          </button>
        </div>
      @endif

      <!-- Tombol Burger (Hanya Tampil di Mobile dan Tablet) -->
      <button id="burger-button" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>

    <!-- Menu Navigasi (Hanya Tampil di Desktop) -->
    <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 lg:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white">
        <li class="lg:mr-0">
          <a href="{{ route('home') }}" 
            class="block py-2 px-3 rounded lg:p-0 relative 
                    {{ Request::is('/') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    after:block after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[2px] after:bottom-0 after:left-0 after:bg-red-300 after:origin-center after:transition-transform after:duration-300 hover:after:scale-x-100"
            aria-current="page">
            Beranda
          </a>
        </li>
        <li>
          <a href="{{ route('kebudayaan') }}" 
            class="block py-2 px-3 rounded lg:p-0 relative 
                    {{ Request::is('kebudayaan') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    {{ Request::is('kebudayaan-detail') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    after:block after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[2px] after:bottom-0 after:left-0 after:bg-red-300 after:origin-center after:transition-transform after:duration-300 hover:after:scale-x-100"
            aria-current="page">
            Kebudayaan
          </a>
        </li>
        <li>
          <a href="{{ route('blog') }}"
            class="block py-2 px-3 rounded lg:p-0 relative 
                    {{ Request::is('blog') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    {{ Request::is('blog-detail') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    after:block after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[2px] after:bottom-0 after:left-0 after:bg-red-300 after:origin-center after:transition-transform after:duration-300 hover:after:scale-x-100">
            Blog
          </a>
        </li>
        <li>
          <a href="{{ route('galeri') }}"
            class="block py-2 px-3 rounded lg:p-0 relative 
                    {{ Request::is('galeri') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    after:block after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[2px] after:bottom-0 after:left-0 after:bg-red-300 after:origin-center after:transition-transform after:duration-300 hover:after:scale-x-100">
            Galeri
          </a>
        </li>      
        <li>
          <a href="{{ route('tentang') }}"
            class="block py-2 px-3 rounded lg:p-0 relative 
                    {{ Request::is('tentang') ? 'text-white lg:text-red-700' : 'text-gray-900 lg:hover:text-red-700 lg:dark:hover:text-red-500' }}
                    after:block after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[2px] after:bottom-0 after:left-0 after:bg-red-300 after:origin-center after:transition-transform after:duration-300 hover:after:scale-x-100">
            Tentang
          </a>
        </li>
      </ul>
    </div>

    <!-- Menu Burger (Hanya Tampil di Mobile dan Tablet) -->
    <div id="burger-menu" class="hidden lg:hidden fixed top-16 right-4 w-64 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
      <ul class="flex flex-col p-4 font-medium">
        @if(Auth::guard('web')->check() || Auth::guard('internal')->check())
          <!-- Opsi untuk Pengguna yang Sudah Login -->
          <li>
            <a href="{{ route('profile') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Profil</a>
          </li>
          <li>
            <a href="{{ route('status') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Riwayat Laporan</a>
          </li>
        @else
          <!-- Opsi untuk Pengguna yang Belum Login -->
          <li>
            <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Masuk</a>
          </li>
          <li>
            <a href="{{ route('register') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Daftar</a>
          </li>
        @endif
        <!-- Menu Navigasi -->
        <li>
          <a href="{{ route('kebudayaan') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Kebudayaan</a>
        </li>
        <li>
          <a href="{{ route('blog') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Blog</a>
        </li>
        <li>
          <a href="{{ route('galeri') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Galeri</a>
        </li>
        <li>
          <a href="{{ route('tentang') }}" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Tentang</a>
        </li>
        @if(Auth::guard('web')->check() || Auth::guard('internal')->check())
          <!-- Opsi Keluar -->
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 rounded">Keluar</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- JavaScript untuk Mengontrol Menu Burger -->
<script>
  document.getElementById('burger-button').addEventListener('click', function() {
    var menu = document.getElementById('burger-menu');
    if (menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
    } else {
      menu.classList.add('hidden');
    }
  });
</script>
{{-- navigation-bar --}}
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="https://yt3.googleusercontent.com/en8h8L17cHPQ8W13bVWXGmueFdEMBmhc3NyDCxE6LhYXLLOtc8xojWMUl6bWPexmkeeDVfEmb0k=s160-c-k-c0x00ffffff-no-rj" class="h-8" alt="Logo KPB Gianyar">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">KPB Gianyar</span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    {{-- Jika user belum login --}}
    @guest
    <button type="button" onclick="window.location.href='{{ url('daftar') }}'" class="text-gray-900 md:hover:text-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-2">
      Daftar
    </button>    
    <button type="button" onclick="window.location.href='{{ url('masuk') }}'" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
      Masuk
    </button>   
    @endguest

    {{-- Jika user sudah login --}}
    @auth
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse pl-3">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full object-cover aspect-square" 
          src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : 'https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg' }}" 
          alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
          <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil</a>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
          </li>
        </ul>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    @endauth
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="{{ route('home') }}" 
          class="block py-2 px-3 rounded md:p-0 
            {{ Request::is('/') ? 'text-white md:text-red-700' : 'text-gray-900 md:hover:text-red-700 md:dark:hover:text-red-500 dark:text-white' }}"
          aria-current="page">
          Beranda
        </a>
      </li>
      <li>
        <a href="{{ route('kebudayaan') }}" 
          class="block py-2 px-3 rounded md:p-0 
            {{ Request::is('kebudayaan') ? 'text-white md:text-red-700' : 'text-gray-900 md:hover:text-red-700 md:dark:hover:text-red-500 dark:text-white' }}"
          aria-current="page">
          Kebudayaan
        </a>
      </li>
      <li>
        <a href="{{ route('blog') }}"
          class="block py-2 px-3 rounded md:p-0 
            {{ Request::is('blog') ? 'text-white md:text-red-700' : 'text-gray-900 md:hover:text-red-700 md:dark:hover:text-red-500 dark:text-white' }}">
          Blog
        </a> {{-- opsional --}}
      </li>
      <li>
        <a href="{{ route('galeri') }}"
          class="block py-2 px-3 rounded md:p-0 
            {{ Request::is('galeri') ? 'text-white md:text-red-700' : 'text-gray-900 md:hover:text-red-700 md:dark:hover:text-red-500 dark:text-white' }}">
          Galeri
        </a>
      </li>
      {{-- <li>
        <a href="{{ route('kiprah') }}"
          class="block py-2 px-3 rounded md:p-0 
            {{ Request::is('kiprah') ? 'text-white md:text-red-700' : 'text-gray-900 md:hover:text-red-700 md:dark:hover:text-red-500 dark:text-white' }}">
          Kiprah
        </a>
      </li> --}} {{-- opsional --}}
      <li>
        <a href="{{ route('tentang') }}"
          class="block py-2 px-3 rounded md:p-0 
            {{ Request::is('tentang') ? 'text-white md:text-red-700' : 'text-gray-900 md:hover:text-red-700 md:dark:hover:text-red-500 dark:text-white' }}">
          Tentang
        </a>
      </li>
    </ul>
  </div>
  </div>
</nav>
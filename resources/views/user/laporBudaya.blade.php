<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<div class="text-2xl py-4 px-6 bg-red-700 text-white text-center font-bold uppercase">
  Lapor Temuan Budaya
</div>
<form class="py-4 px-6" action="{{ route('store-report') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="name">
          Nama Kebudayaan
      </label>
      <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="name" type="text" name="name" placeholder="Masukkan Nama Kebudayaan" required>
  </div>
  <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="location">
          Lokasi
      </label>
      <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="location" type="text" name="location" placeholder="Masukkan Lokasi Kebudayaan" required>
  </div>
  <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="image">
          Gambar Kebudayaan
      </label>
      <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="image" type="file" name="image" accept="image/*">
  </div>
  <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="description">
          Deskripsi
      </label>
      <textarea
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="description" rows="4" name="description" placeholder="Masukkan Deskripsi Kebudayaan" required></textarea>
  </div>
  <div class="flex items-center justify-center mb-4">
      <button
          class="bg-red-700 text-white py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline"
          type="submit">
          Submit
      </button>
  </div>
</form>

@if(session('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    confirmButtonColor: '#b00000',
    confirmButtonText: 'OK'
  });
</script>
@endif

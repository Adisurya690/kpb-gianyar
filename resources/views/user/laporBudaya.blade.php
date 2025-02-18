<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
  <style>
      .ts-control {
          border: 1px solid #e2e8f0 !important;
          border-radius: 0.25rem !important;
          padding: 0.5rem 0.75rem !important;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
      }
      .ts-dropdown {
          border: 1px solid #e2e8f0 !important;
          border-radius: 0.25rem !important;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
      }
  </style>
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
          class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="location" type="text" name="location" placeholder="Pilih atau ketik lokasi di Gianyar" required>
  </div>
  <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="images">
        Gambar Kebudayaan (Maksimal 3 gambar, ukuran per gambar maksimal 5 MB)
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="images" type="file" name="images[]" accept="image/*" multiple required>
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

<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
    fetch('/json/lokasi-gianyar.json')
        .then(response => response.json())
        .then(data => {
            const lokasiList = [];
            for (const kecamatan in data) {
                data[kecamatan].forEach(desa => {
                    lokasiList.push({ value: `${desa}, ${kecamatan}`, text: `${desa}, ${kecamatan}` });
                });
            }

            new TomSelect('#location', {
                options: lokasiList,
                create: false,
                placeholder: 'Pilih atau ketik lokasi di Gianyar',
                maxItems: 1,
                render: {
                    option: function(data, escape) {
                        return `<div>${escape(data.text)}</div>`;
                    },
                    item: function(data, escape) {
                        return `<div>${escape(data.text)}</div>`;
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching JSON:', error));
</script>

<script>
  document.getElementById('images').addEventListener('change', function(event) {
      const files = event.target.files;
      const maxFiles = 3;
      const maxSize = 5 * 1024 * 1024; // 5 MB

      // Validasi jumlah file
      if (files.length > maxFiles) {
          alert(`Maksimal ${maxFiles} gambar yang diizinkan.`);
          event.target.value = ''; // Reset input file
          return;
      }

      // Validasi ukuran file
      for (const file of files) {
          if (file.size > maxSize) {
              alert(`File ${file.name} melebihi ukuran maksimal 5 MB.`);
              event.target.value = ''; // Reset input file
              return;
          }
      }
  });
</script>
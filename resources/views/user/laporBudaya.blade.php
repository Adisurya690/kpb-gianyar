<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
      body {
        font-family: Helvetica, Arial, sans-serif;
        }
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
<form class="py-4 px-6" id="laporForm" action="{{ route('store-report') }}" method="POST" enctype="multipart/form-data">
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
          type="submit"
          id="submitBtn">
          Kirim
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
    confirmButtonText: 'OK',
    timer: 5000,
    timerProgressBar: true
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

      if (files.length > maxFiles) {
          Swal.fire({
              icon: 'error',
              title: 'Terlalu Banyak Gambar',
              text: `Maksimal hanya ${maxFiles} gambar yang diperbolehkan.`,
              confirmButtonColor: '#b00000'
          });
          event.target.value = ''; 
          return;
      }

      for (const file of files) {
          if (file.size > maxSize) {
              Swal.fire({
                  icon: 'error',
                  title: 'Ukuran Gambar Terlalu Besar',
                  text: `File ${file.name} melebihi 5 MB.`,
                  confirmButtonColor: '#b00000'
              });
              event.target.value = ''; 
              return;
          }
      }
  });
</script>

<script>
  document.getElementById('laporForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Mencegah submit langsung

      Swal.fire({
          title: 'Apakah data sudah benar?',
          text: "Pastikan semua informasi sudah sesuai sebelum mengirim!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#b00000',
          cancelButtonColor: '#ffffff',
          confirmButtonText: 'Ya, Kirim!',
          cancelButtonText: 'Batal',
          customClass: {
              cancelButton: 'border-2 border-red-700 text-red-700 bg-gray-50 hover:bg-red-100 px-4 py-2 rounded',
              confirmButton: 'px-4 py-2 rounded'
          }
      }).then((result) => {
          if (result.isConfirmed) {
              let submitBtn = document.getElementById('submitBtn');

              // Menonaktifkan tombol setelah konfirmasi
              submitBtn.disabled = true;
              submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
              submitBtn.classList.remove('bg-red-700', 'hover:bg-red-800');
              submitBtn.innerText = 'Mengirim...';

              // Submit form setelah konfirmasi
              event.target.submit();
          }
      });
  });
</script>
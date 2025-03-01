<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lapor Temuan Budaya</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
      /* Custom CSS untuk TomSelect */
      .ts-wrapper {
          width: 100% !important;
          position: relative; /* Pastikan wrapper menjadi referensi posisi */
      }
      .ts-control {
          width: 100% !important;
          border: 1px solid #e2e8f0 !important;
          border-radius: 0.25rem !important;
          padding: 0.5rem 0.75rem !important;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
          display: flex !important;
          align-items: center !important;
          gap: 0.5rem !important;
          box-sizing: border-box; /* Pastikan padding tidak memengaruhi lebar */
      }
      .ts-dropdown {
          border: 1px solid #e2e8f0 !important;
          border-radius: 0.25rem !important;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
          max-height: 150px;
          overflow-y: auto;
          position: absolute !important;
          z-index: 1000 !important;
          width: 100% !important; /* Sesuaikan lebar dengan ts-control */
          top: 100% !important; /* Posisikan di bawah ts-control */
          left: 0 !important;
          background-color: white !important;
          box-sizing: border-box; /* Pastikan padding tidak memengaruhi lebar */
      }
      .ts-control .dropdown-icon {
          display: none !important;
      }
      select#location {
          display: none !important;
      }
      .ts-dropdown .option {
          cursor: pointer !important;
      }
      .ts-dropdown .option:hover {
          background-color: #fce7f3 !important; /* Warna merah muda saat hover */
      }
      .modal {
          z-index: 1000 !important;
      }
  </style>
</head>
<body>
  <div class="text-2xl py-4 px-6 bg-red-700 text-white text-center font-bold uppercase">
    Lapor Temuan Budaya
  </div>
  <form class="py-4 px-6" id="laporForm" action="{{ route('store-report') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2" for="name">
            Nama Kebudayaan
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
            id="name" type="text" name="name" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2" for="location">
            Lokasi
        </label>
        <select id="location" name="location" class="w-full" autocomplete="off" required></select>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="images">
          Gambar Kebudayaan
      </label>
      <p class="text-sm text-gray-600 mb-4">(Maksimal 3 gambar, ukuran per gambar maksimal 5 MB)</p>
      <input
          class="hidden"
          id="images" type="file" name="images[]" accept="image/*" multiple required>
      <label for="images" class="bg-red-700 text-white py-2 px-4 rounded-lg cursor-pointer hover:bg-red-800 transition duration-200">
          Pilih Gambar
      </label>
      <div id="imagePreview" class="mt-4 grid grid-cols-3 gap-4"></div>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2" for="description">
            Deskripsi
        </label>
        <textarea
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
            id="description" rows="4" name="description" required></textarea>
    </div>
    <div class="flex items-center justify-center mb-4">
        <button
            class="bg-red-700 text-white py-2 px-6 rounded-lg hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-200"
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

              // Inisialisasi TomSelect
              const locationSelect = new TomSelect('#location', {
                  options: lokasiList,
                  create: false,
                  maxItems: 1,
                  maxOptions: 10,
                  render: {
                      option: function(data, escape) {
                          return `<div>${escape(data.text)}</div>`;
                      },
                      item: function(data, escape) {
                          return `<div>${escape(data.text)}</div>`;
                      },
                      dropdown: function(data, escape) {
                          return `<div class="ts-dropdown px-2"></div>`;
                      }
                  }
              });
          })
          .catch(error => console.error('Error fetching JSON:', error));
  </script>

  <script>
    const imagePreview = document.getElementById('imagePreview');
    const imageInput = document.getElementById('images');
    const maxFiles = 3;

    function addImageToPreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgContainer = document.createElement('div');
            imgContainer.classList.add('relative');

            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('w-full', 'h-32', 'object-cover', 'rounded-lg');

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = '×';
            removeBtn.classList.add('absolute', 'top-0', 'right-0', 'bg-red-700', 'text-white', 'rounded-full', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'cursor-pointer', 'hover:bg-red-800');
            removeBtn.onclick = function() {
                imgContainer.remove();
                updateFileInput();
            };

            imgContainer.appendChild(img);
            imgContainer.appendChild(removeBtn);
            imagePreview.appendChild(imgContainer);
        };
        reader.readAsDataURL(file);
    }

    function updateFileInput() {
        const files = Array.from(imageInput.files);
        const dataTransfer = new DataTransfer();

        imagePreview.querySelectorAll('img').forEach((img, index) => {
            const file = files.find(f => f.name === img.alt);
            if (file) dataTransfer.items.add(file);
        });

        imageInput.files = dataTransfer.files;
    }

    imageInput.addEventListener('change', function(event) {
        const files = event.target.files;
        const maxSize = 5 * 1024 * 1024;

        if (files.length > maxFiles || imagePreview.children.length + files.length > maxFiles) {
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

            addImageToPreview(file);
        }
    });
  </script>

  <script>
    document.getElementById('laporForm').addEventListener('submit', function(event) {
        event.preventDefault();

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

                submitBtn.disabled = true;
                submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                submitBtn.classList.remove('bg-red-700', 'hover:bg-red-800');
                submitBtn.innerText = 'Mengirim...';

                event.target.submit();
            }
        });
    });
  </script>
</body>
</html>
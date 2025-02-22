<div style="max-width: 500px; margin: 0 auto; padding: 20px; border-radius: 10px; background-color: #ffffff; text-align: center; font-family: Arial, sans-serif; border: 1px solid #e0e0e0;">
    
  <!-- Logo -->
  <div style="margin-bottom: 10px;">
      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjANR9UiUSNrZj0YDRWR-Y8_k0CYiSZKBZkD8hcasp4QeWdWkxlfMql3glqHB7bDR9yhEj37RFyOv3KswaCCNtffOM5oG42C0xGSKo9eebhWja0Twm_K-63radCa-FenGw/s113/logo+kpb+polos.png" alt="Logo" style="width: 60px; height: 60px;">
  </div>

  <!-- Header -->
  <h2 style="color: #000000; margin-bottom: 10px;">Status Laporan Anda Diperbarui</h2>

  <!-- Body -->
  <p style="color: #4a4a4a; font-size: 16px; margin-bottom: 20px;">
      Halo <strong>{{ $report->reporter }}</strong>, status laporan Anda yang berjudul <strong style="color: #cc0000;">{{ $report->name }}</strong> telah diperbarui menjadi:
  </p>

  <!-- Status -->
  <h1 style="color: #cc0000; font-size: 24px; margin: 10px 0;">{{ $report->status }}</h1>

  @if ($report->note)
  <p style="color: #4a4a4a; font-size: 14px; margin-bottom: 20px;">
      <strong>Catatan dari admin:</strong> {{ $report->note }}
  </p>
  @endif

  <p style="color: #4a4a4a; font-size: 14px; margin-bottom: 20px;">
      Terima kasih telah berpartisipasi dalam menjaga kebudayaan Kabupaten Gianyar.
  </p>

  <!-- Footer -->
  <div style="background-color: #f1f1f1; padding: 10px; border-radius: 8px; font-size: 12px; color: #666;">
      Jika Anda memiliki pertanyaan, silakan hubungi tim kami.
  </div>

</div>

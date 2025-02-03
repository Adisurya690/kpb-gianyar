<p>Halo {{ $report->reporter }},</p>
<p>Status laporan Anda yang berjudul <strong>{{ $report->name }}</strong> telah diperbarui menjadi <strong>{{ $report->status }}</strong>.</p>

@if ($report->note)
    <p>Catatan dari admin: {{ $report->note }}</p>
@endif

<p>Terima kasih telah berpartisipasi dalam menjaga kebudayaan Kabupaten Gianyar.</p>
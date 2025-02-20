<form method="POST" action="{{ route('verify.code.form') }}">
  @csrf
  <input type="text" name="verification_code" placeholder="Masukkan kode verifikasi" required>
  <button type="submit">Verifikasi</button>
</form>


@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lengkapi Data Internal</h2>
    <form method="POST" action="{{ route('internal.store') }}">
        @csrf

        <div class="form-group">
            <label for="nia">Nomor Induk Anggota (NIA)</label>
            <input type="text" name="nia" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Jabatan di KPB Gianyar</label>
            <input type="text" name="position" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kpbprov">Jabatan di KPB Provinsi (Opsional)</label>
            <input type="text" name="kpbprov" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

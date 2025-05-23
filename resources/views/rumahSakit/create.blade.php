@extends('layouts.navbar')

@section('content')
<div class="container">
    <h2>Tambah Rumah Sakit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan dalam input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rumahSakit.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
            <input type="text" name="nama_rumah_sakit" class="form-control" id="nama_rumah_sakit" placeholder="Masukkan nama rumah sakit" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email Rumah Sakit</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="contoh@email.com" required>
        </div>

        <a href="{{ route('rumahSakit.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

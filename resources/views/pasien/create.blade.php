@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h2>Tambah Pasien</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oalaah</strong> ada yang salah nihh...! <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" id="nama_pasien"
                    placeholder="Masukkan nama Pasien" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="number" name="no_telepon" class="form-control" id="no_telepon" placeholder="08......"
                    required>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <select
                    class="form-control @error('id_rumah_sakit') is-invalid @enderror" id="id_rumah_sakit" name="id_rumah_sakit" required>
                    <option value="" disabled selected>Pilih Rumah Sakit</option>
                    @foreach ($rumahSakits as $rs)
                        <option value="{{ $rs->id }}" {{ old('id_rumah_sakit') == $rs->id ? 'selected' : '' }}>
                            {{ $rs->nama_rumah_sakit }}
                        </option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

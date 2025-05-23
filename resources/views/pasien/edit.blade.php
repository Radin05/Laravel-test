@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Edit Data Pasien</div>

                    <div class="card-body">
                        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                                    value="{{ old('nama_pasien', $pasien->nama_pasien) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ old('alamat', $pasien->alamat) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                    value="{{ old('no_telepon', $pasien->no_telepon) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_rumah_sakit-{{ $pasien->id }}" class="form-label">Rumah Sakit</label>
                                <select class="form-control @error('id_rumah_sakit') is-invalid @enderror" id="id_rumah_sakit-{{ $pasien->id }}"
                                    name="id_rumah_sakit" required>
                                    <option value="" disabled {{ old('id_rumah_sakit', $pasien->id_rumah_sakit) ? '' : 'selected' }}>
                                        Select RT</option>
                                    @foreach ($rumahSakits as $rs)
                                        <option value="{{ $rs->id }}"
                                            {{ old('id_rumah_sakit', $pasien->id_rumah_sakit) == $rs->id ? 'selected' : '' }}>
                                            {{ $rs->nama_rumah_sakit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('rumahSakit.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

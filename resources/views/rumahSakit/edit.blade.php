@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">Edit Data Rumah Sakit</div>

                <div class="card-body">
                    <form action="{{ route('rumahSakit.update', $rumahSakit->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                            <input type="text" class="form-control" id="nama_rumah_sakit" name="nama_rumah_sakit" value="{{ old('nama_rumah_sakit', $rumahSakit->nama_rumah_sakit) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $rumahSakit->alamat) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $rumahSakit->email) }}" required>
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

@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Pasien</h5>
                        <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <div id="alert-container"></div>

                        <div class="mb-3">
                            <label for="filter-rs" class="form-label">Filter Rumah Sakit</label>
                            <select id="filter-rs" class="form-select">
                                <option value="">-- Semua Rumah Sakit --</option>
                                @foreach ($rumahSakits as $rs)
                                    <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <div id="table-container">
                            @include('partials._tabel_pasien', ['pasiens' => $pasiens])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $('#filter-rs').on('change', function() {
                let rsId = $(this).val();

                $.ajax({
                    url: "{{ route('pasien.filter') }}",
                    type: 'GET',
                    data: {
                        id_rumah_sakit: rsId
                    },
                    success: function(response) {
                        $('#table-container').html(response);
                    },
                    error: function() {
                        alert('Gagal memuat data.');
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.btn-delete-pasien').click(function() {
                    const id = $(this).data('id');

                    if (!confirm('Yakin ingin menghapus data pasien ini?')) return;

                    $.ajax({
                        url: `/pasien/${id}`,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#alert-container').html(`
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function(xhr) {
                            let message = xhr.responseJSON?.message ??
                                'Terjadi kesalahan saat menghapus.';
                            $('#alert-container').html(`
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            ${message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

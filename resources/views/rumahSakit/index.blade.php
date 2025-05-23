@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Rumah Sakit</h5>
                        <a href="{{ route('rumahSakit.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <div id="alert-container"></div>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($rumahSakit->count() > 0)
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Rumah Sakit</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rumahSakit as $index => $rs)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $rs->nama_rumah_sakit }}</td>
                                            <td>{{ $rs->alamat }}</td>
                                            <td>{{ $rs->email }}</td>
                                            <td>
                                                <a href="{{ route('rumahSakit.edit', $rs->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                <button type="button" class="btn btn-delete btn-danger btn-sm btn-delete"
                                                    data-id="{{ $rs->id }}">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">Belum ada data rumah sakit.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.btn-delete').on('click', function() {
                    const id = $(this).data('id');
                    if (!confirm('Yakin ingin menghapus data ini?')) return;

                    $.ajax({
                        url: `{{ url('rumahSakit') }}/${id}`,
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

                            $(`button[data-id="${id}"]`).closest('tr').remove();
                        }
                    });
                });
            });
        </script>
    @endpush


@endsection

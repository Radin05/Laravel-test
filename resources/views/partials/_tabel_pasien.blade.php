
                        @if ($pasiens->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Rumah Sakit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pasiens as $index => $pasien)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pasien->nama_pasien }}</td>
                                                <td>{{ $pasien->alamat }}</td>
                                                <td>{{ $pasien->no_telepon }}</td>
                                                <td>{{ $pasien->rumahSakit->nama_rumah_sakit }}</td>
                                                <td>
                                                    <a href="{{ route('pasien.edit', $pasien->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>

                                                    <button type="button" class="btn btn-danger btn-sm btn-delete-pasien"
                                                        data-id="{{ $pasien->id }}">
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
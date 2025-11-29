@extends('layouts.app', ['title' => 'Data Poli'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Poli</div>
                    <div class="card-body">
                        <h3>Data pasien</h3>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('polis.create') }}" class="btn btn-primary btn-sm">Tambah Poli</a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Poli</th>
                                    <th>Nama</th>
                                    <th>Biaya</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poli as $item)
                                    <tr>
                                        <td>{{ $poli->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->kode_polis }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->biaya }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->is_aktif }}</td>
                                        <td>
                                                <a href="{{ route('polis.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                                                <form action="{{ route('polis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $poli->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
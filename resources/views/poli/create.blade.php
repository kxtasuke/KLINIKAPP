@extends('layouts.app', ['title' => 'Tambah Poli'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Poli</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('polis.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kode_polis" class="form-label">Kode Poli</label>
                            <input type="text" name="kode_polis" id="kode_polis" class="form-control @error('kode_polis') is-invalid @enderror" value="{{ old('kode_polis') }}">
                            @error('kode_polis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="biaya" class="form-label">Biaya</label>
                            <input type="number" name="biaya" id="biaya" min="0" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya') }}">
                            @error('biaya') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="is_aktif" class="form-label">Status</label>
                            <select name="is_aktif" id="is_aktif" class="form-select @error('is_aktif') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="1" {{ old('is_aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_aktif') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('is_aktif') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('polis.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
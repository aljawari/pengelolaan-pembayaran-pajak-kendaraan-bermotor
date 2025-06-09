@extends('layouts.app')

@section('title', 'Tambah Kendaraan')

@section('content')
<div class="container">
    <h2>Tambah Data Kendaraan</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" name="nomor_polisi" class="form-control" value="{{ old('nomor_polisi') }}" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" class="form-control" value="{{ old('merk') }}" required>
        </div>

        <div class="form-group">
            <label for="tipe">Tipe</label>
            <input type="text" name="tipe" class="form-control" value="{{ old('tipe') }}" required>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Mobil" {{ old('jenis') == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="Motor" {{ old('jenis') == 'Motor' ? 'selected' : '' }}>Motor</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tahun_pembuatan">Tahun Pembuatan</label>
            <input type="number" name="tahun_pembuatan" class="form-control" value="{{ old('tahun_pembuatan') }}" required>
        </div>

        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" name="warna" class="form-control" value="{{ old('warna') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

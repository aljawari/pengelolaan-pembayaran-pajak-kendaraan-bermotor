@extends('layouts.app')

@section('title', 'Edit Kendaraan')

@section('content')
<div class="container">
    <h2>Edit Data Kendaraan</h2>
    <form action="{{ route('kendaraan.update', $kendaraan->id_kendaraan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" name="nomor_polisi" class="form-control" value="{{ old('nomor_polisi', $kendaraan->nomor_polisi) }}" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" class="form-control" value="{{ old('merk', $kendaraan->merk) }}" required>
        </div>

        <div class="form-group">
            <label for="tipe">Tipe</label>
            <input type="text" name="tipe" class="form-control" value="{{ old('tipe', $kendaraan->tipe) }}" required>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="Mobil" {{ $kendaraan->jenis == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="Motor" {{ $kendaraan->jenis == 'Motor' ? 'selected' : '' }}>Motor</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tahun_pembuatan">Tahun Pembuatan</label>
            <input type="number" name="tahun_pembuatan" class="form-control" value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}" required>
        </div>

        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" name="warna" class="form-control" value="{{ old('warna', $kendaraan->warna) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

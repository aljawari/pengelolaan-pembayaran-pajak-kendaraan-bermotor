@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Data Pajak</h2>
    <form action="{{ route('pajak.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pemilik">Nama Pemilik</label>
            <input type="text" class="form-control" name="nama_pemilik" required>
        </div>
        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" class="form-control" name="nomor_polisi" required>
        </div>
        <div class="form-group">
            <label for="jenis_kendaraan">Jenis Kendaraan</label>
            <select name="jenis_kendaraan" class="form-control" required>
                <option value="Mobil">Mobil</option>
                <option value="Motor">Motor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" name="tahun" required>
        </div>
        <div class="form-group">
            <label for="jumlah_pajak">Jumlah Pajak</label>
            <input type="number" class="form-control" name="jumlah_pajak" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

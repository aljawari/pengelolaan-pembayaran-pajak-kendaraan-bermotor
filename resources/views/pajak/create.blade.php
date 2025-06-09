@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Data Pajak</h2>
    <form action="{{ route('pajak.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nama Pemilik</label>
        <input type="text" name="nama_pemilik" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Nomor Polisi</label>
        <input type="text" name="nomor_polisi" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Jenis Kendaraan</label>
        <select name="jenis_kendaraan" class="form-control" required>
            <option value="Mobil">Mobil</option>
            <option value="Motor">Motor</option>
        </select>
    </div>

    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Jumlah Pajak</label>
        <input type="number" name="jumlah_pajak" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="kendaraan_id">Kendaraan</label>
        <select name="kendaraan_id" class="form-control" required>
            @foreach($kendaraans as $kendaraan)
                <option value="{{ $kendaraan->id_kendaraan }}">{{ $kendaraan->id_kendaraan }} - {{ $kendaraan->nomor_polisi }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</div>
@endsection

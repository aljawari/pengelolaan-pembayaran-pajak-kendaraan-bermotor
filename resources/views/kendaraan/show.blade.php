@extends('layouts.app')

@section('title', 'Detail Kendaraan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Kendaraan</h5>
    </div>
    <div class="card-body">
        <p><strong>Nomor Polisi:</strong> {{ $kendaraan->nomor_polisi }}</p>
        <p><strong>Merk:</strong> {{ $kendaraan->merk }}</p>
        <p><strong>Tipe:</strong> {{ $kendaraan->tipe }}</p>
        <p><strong>Jenis:</strong> {{ $kendaraan->jenis }}</p>
        <p><strong>Tahun Pembuatan:</strong> {{ $kendaraan->tahun_pembuatan }}</p>
        <p><strong>Warna:</strong> {{ $kendaraan->warna }}</p>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

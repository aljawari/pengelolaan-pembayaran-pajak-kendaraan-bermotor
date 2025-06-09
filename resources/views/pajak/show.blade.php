@extends('layouts.app')

@section('title', 'Detail Pajak')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Detail Pembayaran Pajak</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama Pemilik:</strong> {{ $pajak->nama_pemilik }}</p>
            <p><strong>Nomor Polisi:</strong> {{ $pajak->nomor_polisi }}</p>
            <p><strong>Jenis Kendaraan:</strong> {{ $pajak->jenis_kendaraan }}</p>
            <p><strong>Tahun:</strong> {{ $pajak->tahun }}</p>
            <p><strong>Jumlah Pajak:</strong> Rp {{ number_format($pajak->jumlah_pajak, 0, ',', '.') }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('pajak.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection

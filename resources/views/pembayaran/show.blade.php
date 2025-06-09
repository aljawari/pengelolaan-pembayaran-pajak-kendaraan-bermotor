@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Pembayaran Pajak</h5>
    </div>
    <div class="card-body">
        <p><strong>ID Pembayaran:</strong> {{ $pembayaran->id_pembayaran }}</p>
        <p><strong>Nomor Polisi:</strong> {{ $pembayaran->kendaraan->nomor_polisi }}</p>
        <p><strong>Merk:</strong> {{ $pembayaran->kendaraan->merk }} - {{ $pembayaran->kendaraan->tipe }}</p>
        <p><strong>Jumlah Bayar:</strong> Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</p>
        <p><strong>Tanggal Bayar:</strong> {{ $pembayaran->tanggal_bayar->format('d M Y') }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->metode_bayar ?? '-' }}</p>
        <p><strong>Keterangan:</strong> {{ $pembayaran->keterangan ?? '-' }}</p>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

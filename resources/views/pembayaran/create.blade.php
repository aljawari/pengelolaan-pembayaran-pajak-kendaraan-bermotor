@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="container">
    <h2>Tambah Data Pembayaran</h2>
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kendaraan_id">Pilih Kendaraan</label>
            <select name="kendaraan_id" class="form-control" required>
                @foreach ($kendaraan as $item)
                    <option value="{{ $item->id_kendaraan }}">
                        {{ $item->nomor_polisi }} - {{ $item->merk }} {{ $item->tipe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_bayar">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="metode_bayar">Metode Pembayaran</label>
            <select name="metode_bayar" class="form-control">
                <option value="">-- Pilih Metode --</option>
                <option value="Tunai">Tunai</option>
                <option value="Transfer">Transfer</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

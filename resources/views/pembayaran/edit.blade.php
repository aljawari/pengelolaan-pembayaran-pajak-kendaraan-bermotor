@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="container">
    <h2>Edit Data Pembayaran</h2>
    <form action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kendaraan_id">Pilih Kendaraan</label>
            <select name="kendaraan_id" class="form-control" required>
                @foreach ($kendaraan as $item)
                    <option value="{{ $item->id_kendaraan }}" {{ $pembayaran->kendaraan_id == $item->id_kendaraan ? 'selected' : '' }}>
                        {{ $item->nomor_polisi }} - {{ $item->merk }} {{ $item->tipe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_bayar">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" value="{{ $pembayaran->tanggal_bayar->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="metode_bayar">Metode Pembayaran</label>
            <select name="metode_bayar" class="form-control">
                <option value="Tunai" {{ $pembayaran->metode_bayar == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="Transfer" {{ $pembayaran->metode_bayar == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="E-Wallet" {{ $pembayaran->metode_bayar == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pembayaran->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

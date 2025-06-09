@extends('layouts.app')

@section('title', 'Daftar Pembayaran')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Info Pembayaran Pajak</h5>
                <a href="{{ route('pembayaran.create') }}" class="btn btn-primary btn-sm">+ Tambah Pembayaran</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($pembayaran as $item)
                        <div class="col-md-4 mb-4">
                            <div class="info-box bg-light p-3 rounded shadow-sm h-100">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <strong>ID:</strong> {{ $item->id_pembayaran }}<br>
                                        <strong>Nomor Polisi:</strong> {{ $item->kendaraan->nomor_polisi }}<br>
                                        <strong>Merk:</strong> {{ $item->kendaraan->merk }}<br>
                                        <strong>Jumlah:</strong> Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}<br>
                                        <strong>Tanggal:</strong> {{ $item->tanggal_bayar->format('d M Y') }}
                                    </div>
                                    <div class="text-end mt-3">
                                        <a href="{{ route('pembayaran.show', $item->id_pembayaran) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('pembayaran.destroy', $item->id_pembayaran) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-muted">Belum ada data pembayaran.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

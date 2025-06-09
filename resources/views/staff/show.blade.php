@extends('layouts.app')

@section('title', 'Detail Staff')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Staff</h5>
    </div>
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $staff->nama }}</p>
        <p><strong>Email:</strong> {{ $staff->email }}</p>
        <p><strong>No Telepon:</strong> {{ $staff->no_telepon }}</p>
        <p><strong>Jabatan:</strong> {{ $staff->jabatan }}</p>

        @if ($staff->pembayarans->count())
            <hr>
            <h6>Pembayaran yang Ditangani:</h6>
            <ul>
                @foreach ($staff->pembayarans as $p)
                    <li>
                        <strong>{{ $p->kendaraan->nomor_polisi }}</strong> - 
                        Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }} 
                        ({{ $p->tanggal_bayar->format('d M Y') }})
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Belum menangani pembayaran.</p>
        @endif
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

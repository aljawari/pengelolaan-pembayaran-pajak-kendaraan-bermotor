@extends('layouts.app')

@section('title', 'Daftar Kendaraan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Kendaraan</h5>
                <a href="{{ route('kendaraan.create') }}" class="btn btn-primary btn-sm">+ Tambah Data Kendaraan</a>
            </div>
            <div class="card-body">
                @foreach($kendaraan as $item)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <strong>{{ $item->nomor_polisi }}</strong> - {{ $item->merk }} ({{ $item->tipe }})
                        </div>
                        <div>
                            <a href="{{ route('kendaraan.show', $item->id_kendaraan) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('kendaraan.edit', $item->id_kendaraan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kendaraan.destroy', $item->id_kendaraan) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

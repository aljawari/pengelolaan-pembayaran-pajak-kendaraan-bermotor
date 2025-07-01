@extends('layouts.app')

@section('title', 'Daftar Pajak')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Pembayaran Pajak Kendaraan Bermotor</h5>
                <br>
                 @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <br>
                <a href="{{ route('pajak.create') }}" class="btn btn-primary btn-sm">+ Tambah Data Pajak</a>
            </div>
            <div class="card-body">
                @foreach($pajaks as $item)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <strong>{{ $item->nomor_polisi }}</strong> - {{ $item->nama_pemilik }}
                        </div>
                        <div>
                            <a href="{{ route('pajak.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('pajak.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pajak.destroy', $item->id) }}" method="POST" style="display:inline">
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

@extends('layouts.app')

@section('title', 'Daftar Staff')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Info Staff</h5>
                <a href="{{ route('staff.create') }}" class="btn btn-primary btn-sm">+ Tambah Staff</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($staff as $item)
                        <div class="col-md-4 mb-4">
                            <div class="info-box bg-light p-3 rounded shadow-sm h-100">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <strong>Nama:</strong> {{ $item->nama }}<br>
                                        <strong>Email:</strong> {{ $item->email }}<br>
                                        <strong>Telepon:</strong> {{ $item->no_telepon }}<br>
                                        <strong>Jabatan:</strong> {{ $item->jabatan }}
                                    </div>
                                    <div class="text-end mt-3">
                                        <a href="{{ route('staff.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('staff.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('staff.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus staff ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-muted">Belum ada data staff.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

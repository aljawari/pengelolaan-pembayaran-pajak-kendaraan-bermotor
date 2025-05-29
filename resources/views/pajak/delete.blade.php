@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Telah Dihapus</h2>
    <div class="alert alert-success">
        Data pajak berhasil dihapus.
    </div>
    <a href="{{ route('pajak.index') }}" class="btn btn-primary">Kembali ke Daftar Pajak</a>
</div>
@endsection

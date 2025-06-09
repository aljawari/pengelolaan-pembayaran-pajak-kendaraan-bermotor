@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="container mt-5">
    <div class="alert alert-danger">
        <h4 class="alert-heading">403 - Akses Ditolak</h4>
        <p>{{ $message }}</p>
        <hr>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

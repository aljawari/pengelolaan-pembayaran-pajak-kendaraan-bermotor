@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pajak</h5>
                    <p class="fs-3">{{ $jumlahPajak }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Kendaraan</h5>
                    <p class="fs-3">{{ $jumlahKendaraan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Staff</h5>
                    <p class="fs-3">{{ $jumlahStaff }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pembayaran</h5>
                    <p class="fs-3">{{ $jumlahPembayaran }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

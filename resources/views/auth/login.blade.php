@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h4 class="mb-3">Login</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required autofocus>
        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection

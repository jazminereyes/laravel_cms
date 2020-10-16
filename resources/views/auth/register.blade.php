@extends('layouts.auth')

@section('content')
<div class="card ">
    <div class="card-header text-center">
        <span class="splash-description">Please enter your user information.</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control form-control-lg @error('name') is-invalid @enderror" id="email" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-4">
                <label for="email">Email</label>
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-4">
                <label for="password">Password</label>
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-4">
                <label for="password_confirm">Confirm Password</label>
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password_confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
        </form>
    </div>
</div>
@endsection
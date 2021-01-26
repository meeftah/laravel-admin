@extends('dashboard.layouts.app')

@section('title', 'Login')

@section('body')
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <img src="{{ asset('assets/common/logo.png') }}" height="120px">
        </div>
        <div class="tx-center mg-b-20">
            Silakan masuk menggunakan<br>email/username dan password Anda
        </div>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('email_username') ? ' is-invalid' : '' }}" name="email_username"
                    id="email_username" value="{{ old('email_username', null) }}" autofocus placeholder="Masukkan Email/Username Anda">
                @error('email_username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password" id="password" placeholder="Masukkan password Anda">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><!-- form-group -->
            <button type="submit" class="btn btn-primary btn-block">MASUK</button>
        </form>
    </div><!-- login-wrapper -->
</div>
@endsection
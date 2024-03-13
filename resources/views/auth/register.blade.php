@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="centered-form row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center mb-4">Register</h2>

                <form method="POST" action="{{ route('post.register') }}">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                    <div class="mt-4 float-end">
                        Already registered? <a href="{{ route('login')}}">click here to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

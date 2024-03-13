@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="centered-form row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center mb-4">Login</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email" autofocus>
                    </div>

                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                    <div class="mt-4 float-end">
                        Need to register? <a href="{{ route('register')}}">click here to register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

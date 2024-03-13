@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="centered-form">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Hello, {{ Auth::user()->name }}!</h2>
        <h5 class="text-center">If you to create your Task click <a style="color: blue;" href="{{ route('tasks.index')}}"> here</a>.</h5>
    </div>
</div>
@endsection

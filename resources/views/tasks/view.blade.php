@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Task Details</h2>
                        <h5 class="card-title text-left mb-4">Title : {{ $task->title }}</h5>
                        <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
                        <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ ($task->status == 0) ? 'Pending' :'Completed' }}</p>
                        <a href="{{ route('tasks.index')}}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

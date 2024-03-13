@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Edit Task</h2>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-4">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') ?? $task->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description') ?? $task->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="due_date">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="form-control" value="{{ old('due_date') ?? $task->due_date }}">
                            @error('due_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label>Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_pending" value="0" {{ $task->status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_pending">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_completed" value="1" {{ $task->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_completed">Completed</label>
                            </div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                        <a href="{{ route('tasks.index')}}" class="btn btn-secondary mt-4 ml-4">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\TaskUpdateRequest') !!}
@endsection

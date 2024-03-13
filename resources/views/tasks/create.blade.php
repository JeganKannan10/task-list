@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Create Task</h2>

                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                        <div class="form-group mt-4">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title')}}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{{ old('description') }}}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="due_date">Due Date</label>
                            <input type="date" id="due_date" name="due_date" value="{{ old('due_date')}}" class="form-control">
                            @error('due_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label>Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_pending" value="0" checked>
                                <label class="form-check-label" for="status_pending">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_completed" value="1">
                                <label class="form-check-label" for="status_completed">Completed</label>
                            </div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Create</button>
                        <a href="{{ route('tasks.index')}}" class="btn btn-secondary mt-4 ml-4">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\TaskCreateRequest') !!}
@endsection

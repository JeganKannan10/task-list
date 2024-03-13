<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Retrieves the index view for user tasks.
     *
     * @return \Illuminate\Contracts\View\View the rendered view
     */
    public function index()
    {
        try {
            $tasks = Task::where('user_id', auth()->user()->id)->get();
            return view('tasks.index', compact('tasks'));
        } catch (\Exception $e) {
            Log::error('TaskController@index', [$e->getMessage()]);
        }
    }

    /**
     * Create a new task.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        try {
            return view('tasks.create');
        } catch (\Exception $e) {
            Log::error('TaskController@create', [$e->getMessage()]);
        }
    }

    /**
     * View for a single task.
     *
     * @param Task $task the request containing the task data
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function view(Task $task)
    {
        try {
            return view('tasks.view', compact('task'));
        } catch (\Exception $e) {
            Log::error('TaskController@view', [$e->getMessage()]);
        }
    }

    /**
     * Store a new task.
     *
     * @param TaskCreateRequest $request the request containing the task data
     *
     * @return \Illuminate\Http\RedirectResponse a redirect response object
     */
    public function store(TaskCreateRequest $request)
    {
        try {
            Task::create($request->validated());
            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        } catch (\Exception $e) {
            Log::error('TaskController@store', [$e->getMessage()]);
        }
    }

    /**
     * Edit a Task.
     *
     * @param Task $task the task to be edited
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        try {
            return view('tasks.edit', compact('task'));
        } catch (\Exception $e) {
            Log::error('TaskController@edit', [$e->getMessage()]);
        }
    }

    /**
     * Update a Task.
     *
     * @param TaskUpdateRequest $request the request containing the task data
     *
     * @return \Illuminate\Http\RedirectResponse a redirect response object
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        try {
            $task->update($request->validated());
            return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
        } catch (\Exception $e) {
            Log::error('TaskController@update', [$e->getMessage()]);
        }
    }

     /**
     * Destroys a Task object.
     *
     * @param Task $task the Task object to be destroyed
     *
     * @return RedirectResponse a redirect response to the Task index page with a success message
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        } catch (\Exception $e) {
            Log::error('TaskController@destroy', [$e->getMessage()]);
        }
    }

    /**
     * Update a Task object.
     *
     * @param Task $task the Task status to be updated
     *
     * @return Illuminate\Http\JsonResponse the JSON response containing the success status
     */
    public function updateStatus(Request $request, Task $task)
    {
        try {
            $task->update(['status' => $request->status]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('TaskController@updateStatus', [$e->getMessage()]);
        }
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'exists:users,id',
            'title' => 'required|max:255|unique:tasks,title',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:0,1',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:tasks,title,'.$this->task->id.',id',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:0,1',
        ];
    }
}

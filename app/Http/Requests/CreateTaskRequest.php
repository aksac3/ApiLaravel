<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ];
    }
}

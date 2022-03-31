<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExaminerRequest extends FormRequest
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
			'data' => 'required|array',
			'data.type' => 'required|in:examiners',
			'data.attributes' => 'required|array',
			'data.attributes.name' => 'required|string',
        ];
    }
}

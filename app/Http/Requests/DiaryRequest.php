<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'body'  => 'string|max:1000',
        ];
    }
}

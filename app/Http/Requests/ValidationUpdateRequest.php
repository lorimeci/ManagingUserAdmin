<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ValidationUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required','string','max:225'],
            'email'=>['required','email','max:225'],
            'phone'=>'required|numeric|min:10',
            'address'=>['required','max:225'],
            'avatar'=>['nullable','sometimes','image','mimes:png,jpg,jpeg','max:10000'],
        ];
    }
}

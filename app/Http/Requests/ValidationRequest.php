<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\ServerStatus;
use Illuminate\Contracts\Validation\Rule;

class ValidationRequest extends FormRequest
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
            'name'=>['required','string'],
            'email'=>['required','email'],
            'phone'=>'required|numeric|min:10',
            'password'=>['required','min:8'],
            'address'=>['required'],
            'role'=>['required',new Enum(ServerStatus::class)],
            'avatar'=>['required','image','mimes:png,jpg,jpeg','max:10000'],
        ];
    }

}

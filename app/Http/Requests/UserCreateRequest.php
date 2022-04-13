<?php

namespace App\Http\Requests;

use App\Rules\DomainEmailRule;
use App\Rules\Uppercase;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserCreateRequest extends FormRequest
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
            'name' => ['bail','required','string','max:255',new Uppercase()],
            'email' => ['bail','required','email','unique:users','max:255',new DomainEmailRule()],
            'password' => 'required'
        ];
    }
}

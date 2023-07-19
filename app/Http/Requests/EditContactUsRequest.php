<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class EditContactUsRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'FullName'=>'required',
            'Email'=>'required',
            'Massage'=>'required'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'error'=>true,
            'message'=>'Error validation',
            'errorsList'=>$validator->errors()
        ]));

    }

    public function messages()
    {
        return[
            'FullName.required'=>'The Full Name is Required ',
            'Email.required'=>'The Email is Required ',
            'Massage.required'=>'The Massage is Required ',

        ];
    }
}

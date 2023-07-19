<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'title'=>'required',
            // 'parent_id'=>'required',
            'Paragraph'=>'required',
            'banner'=>'required',
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
            'title.required'=>'The title is Required ',
            // 'parent_id.required'=>'The parent_id is Required ',
            'Paragraph.required'=>'The Paragraph is Required ',
            'banner.required'=>'The banner is Required ',
        ];
    }
}



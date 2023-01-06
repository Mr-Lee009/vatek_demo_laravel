<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRoomRequest extends FormRequest
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
            'nameRoom' => ['required', 'max:70','min:2'],
            'typeRoom' => ['required'],
            'description' => ['required']
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));

    }

    public function messages()
    {
        return [
            'nameRoom.required' => 'nameRoom is required',
            'typeRoom.required' => 'typeRoom is  typeZoom',
            'description.required' => 'description is required'
        ];
    }
}

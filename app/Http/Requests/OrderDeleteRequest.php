<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use \Illuminate\Contracts\Validation\Validator;

class OrderDeleteRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        /**
         * orderId": 1,
         */
        return [
            //
            "orderId" => 'required',
        ];
    }


    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'message' => $validator->errors(),
            'status'  => false
        ], 422));


    }
}

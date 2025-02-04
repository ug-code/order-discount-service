<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use \Illuminate\Contracts\Validation\Validator;

class OrderAddRequest extends FormRequest
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
        /**
         * id": 1,
         * "customerId": 1,
         * "items": [
         * {
         * "productId": 102,
         * "quantity": 10,
         * "unitPrice": "11.28",
         * "total": "112.80"
         * }
         * ],
         * "total": "112.80"
         * ];
         */
        return [
            //
            "customerId"        => 'required',
            "items"             => 'required',
            "items.*.productId" => 'required',
            "items.*.quantity"  => 'required',
           // "items.*.unitPrice" => 'required',
           // "items.*.total"     => 'required',
            // "total"             => 'required',
        ];
    }

    public function response(array $errors)
    {
    }

    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'message' => $validator->errors(),
            'status'  => false
        ], 422));

    }
}

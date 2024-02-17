<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class IbanValidityRequest extends FormRequest
{
    /**
     * @var Controller
     */
    private $controller;

    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'iba_number' => 'required|max:34',
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->controller->errorJsonResponse($validator->errors()->first(), 422, $validator->errors()));
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'iba_number.required' => config('messages.iba_number_required'),
            'iba_number.max' => config('messages.iba_number_max'),
        ];
    }
}

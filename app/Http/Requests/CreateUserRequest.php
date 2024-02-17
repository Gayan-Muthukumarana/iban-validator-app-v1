<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
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
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => config('messages.name_required'),
            'name.string' => config('messages.name_string'),
            'name.max' => config('messages.name_max'),
            'email.required' => config('messages.email_required'),
            'email.email' => config('messages.email_email'),
            'email.max' => config('messages.email_max'),
            'email.unique' => config('messages.email_unique'),
            'password.required' => config('messages.password_required'),
            'password.min' => config('messages.password_min'),
        ];
    }
}

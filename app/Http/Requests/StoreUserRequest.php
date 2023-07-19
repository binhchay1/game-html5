<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|string|email|unique:users,email',
            'address' => 'required',
            'age' => 'required',
            'phone' => 'bail|required|digits_between:10,11',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.max' => __('validation.max'),
            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),
            'email.string' => __('validation.string'),
            'email.unique' => __('validation.unique'),
            'address.required' => __('validation.required'),
            'age.required' => __('validation.required'),
            'phone.required' => __('validation.required'),
            'phone.bail' => __('validation.bail'),
            'phone.digits_between' => __('validation.digits_between'),
            'image.digits_between' => __('validation.digits_between'),
            'image.required' => __('validation.required'),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.mimes'),
            'image.max' => __('validation.max'),
        ];
    }
}

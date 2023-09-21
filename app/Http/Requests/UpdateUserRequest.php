<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $age = date("Y-m-d", time() + 86400);
        return [
            'name' => 'required|max:255',
            'nick_name' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email',
            'age' => 'before:' . $age,
            'phone' => 'bail|digits_between:10,11',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.max' => __('validation.max'),
            'nick_name.max' => __('validation.max'),
            'nick_name.required' => __('validation.required'),
            'nick_name.string' => __('validation.string'),
            'nick_name.unique' => __('validation.unique'),
            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),
            'email.string' => __('validation.string'),
            'age.before' => __('validation.before'),
            'phone.bail' => __('validation.bail'),
            'phone.digits_between' => __('validation.digits_between'),
            'image.digits_between' => __('validation.digits_between'),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.mimes'),
            'image.max' => __('validation.max'),
        ];
    }
}

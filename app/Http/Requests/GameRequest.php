<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'category' => 'required',
            'thumbs' => 'required|image|mimes:jpeg,png,jpg,gif',
            'icon' => 'image|mimes:jpeg,png,jpg',
            'background' => 'image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.max' => __('validation.max'),
            'category.required' => __('validation.required'),
            'thumbs.digits_between' => __('validation.digits_between'),
            'thumbs.required' => __('validation.required'),
            'thumbs.image' => __('validation.image'),
            'thumbs.mimes' => __('validation.mimes'),
            'thumbs.max' => __('validation.max'),
            'icon.image' => __('validation.image'),
            'icon.mimes' => __('validation.mimes'),
            'icon.max' => __('validation.max'),
            'background.image' => __('validation.image'),
            'background.mimes' => __('validation.mimes'),
            'background.max' => __('validation.max'),
        ];
    }
}

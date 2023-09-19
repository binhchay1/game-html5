<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementRequest extends FormRequest
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
            'slug' => 'required',
            'description' => 'required|max:255',
            'points' => 'required|numeric|min:10|max:500',
            'icon' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.max' => __('validation.max'),
            'slug.required' => __('validation.required'),
            'slug.unique' => __('validation.max'),
            'description.required' => __('validation.required'),
            'description.max' => __('validation.max'),
            'points.required' => __('validation.max'),
            'points.max' => __('validation.max'),
            'points.numeric' => __('validation.numeric'),
            'icon.required' => __('validation.required'),
        ];
    }
}

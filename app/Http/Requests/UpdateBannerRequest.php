<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'is_active' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,gif,webp',
            'image_link' =>'required|string',
            'book_id' => 'sometimes|unique:banners,book_id,' . $this->id,
        ];
    }
}

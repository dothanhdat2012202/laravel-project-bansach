<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'email' => 'required|email|max:191',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'address' =>'required|string',
        ];
    }
    public function messages():array
    {
        return[
            'email.required'=>'Bạn chưa nhập vào email.',
            'name.required'=>'Bạn chưa nhập vào họ và tên.',
            'phone.required'=>'Bạn chưa nhập vào số điện thoại.',
            'address.required'=>'Bạn chưa nhập vào địa chỉ.',
            'email.email'=>'email chưa đúng định dạng.',
        ];
    }
}

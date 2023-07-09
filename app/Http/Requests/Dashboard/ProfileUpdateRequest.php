<?php

namespace App\Http\Requests\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
        return array_merge([
            'name'=>'required|string|min:3|max:255|unique:users,name,'.auth()->user()->id,
            'email'=>'required|email|unique:users,email,'.auth()->user()->id,
            'password'=>'nullable|max:255|min:6',
            'image'=>'nullable|max:2048|image|mimes:jpeg,jpg,png,gif'
        ],User::rules());
    }
}

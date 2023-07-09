<?php

namespace App\Http\Requests\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:255|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|max:255|min:6',
            'image'=>'required|max:2048|image|mimes:jpeg,jpg,png,gif'
        ],User::rules());
    }
}

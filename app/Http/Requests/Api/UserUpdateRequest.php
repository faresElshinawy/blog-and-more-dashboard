<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use App\Http\Requests\Api\ApiFormRequest;

class UserUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return array_merge([
            'name'=>'required|string|min:3|max:255|unique:users,name,'.$this->user->id,
            'email'=>'required|email|unique:users,email,'.$this->user->id,
            'password'=>'required|max:255|min:6',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif'
        ],User::rules());
    }
}

<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use App\Http\Requests\Api\ApiFormRequest;

class UserStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return array_merge([
            'name'=>'required|string|min:3|max:255|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|max:255|min:6',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif'
        ],User::rules());
    }
}

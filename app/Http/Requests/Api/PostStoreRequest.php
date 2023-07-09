<?php

namespace App\Http\Requests\Api;

use App\Models\Post;
use App\Http\Requests\Api\ApiFormRequest;

class PostStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return array_merge(['title'=>'required|min:3|max:255|unique:posts,title','user_id'=>'required|gt:0|exists:users,id'],Post::rules());
    }
}

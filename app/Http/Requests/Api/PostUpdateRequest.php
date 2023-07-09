<?php

namespace App\Http\Requests\Api;

use App\Models\Post;
use App\Http\Requests\Api\ApiFormRequest;

class PostUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return array_merge([
            'title'=>'required|min:3|max:255|unique:posts,title,'.$this->post->id,
        ],Post::rules());
    }
}

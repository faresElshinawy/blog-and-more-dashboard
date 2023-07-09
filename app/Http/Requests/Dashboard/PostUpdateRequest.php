<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title'=>'required|min:3|max:255|unique:posts,title,'.$this->post->id,
            'image'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'tag'=>'nullable|min:3|max:255'
            ],Post::rules());
    }
}

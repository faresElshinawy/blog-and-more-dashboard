<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'title'=>'required|string|min:3|max:255|unique:services,title,'.$this->service->id,
            'image'=>'nullable|image|mimes:gif,png,jpeg,jpg'
        ],Service::rules());;
    }
}

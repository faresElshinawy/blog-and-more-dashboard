<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Plan;
use Illuminate\Foundation\Http\FormRequest;

class PlanUpdateRequest extends FormRequest
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
        return array_merge(Plan::rules(),[
            'image'=>'nullable|image|mimes:jpej,jpg,png,gif'
        ]);
    }
}

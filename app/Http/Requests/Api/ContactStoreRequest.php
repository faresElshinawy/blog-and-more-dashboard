<?php

namespace App\Http\Requests\Api;

use App\Models\Contact;
use App\Http\Requests\Api\ApiFormRequest;

class ContactStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return Contact::rules();
    }
}

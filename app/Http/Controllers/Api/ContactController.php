<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactStoreRequest;
use App\Interfaces\ContactRepositoryInterface;
use App\Http\Requests\Api\ContactUpdateRequest;

class ContactController extends Controller
{

    use ApiResponse;

    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->contactRepository->index(false));
    }

    public function store(ContactStoreRequest $request)
    {
        return $this->apiResponse('message has been send successfully',$this->contactRepository->store($request),null,201);
    }

    public function update(ContactUpdateRequest $request,Contact $contact)
    {
        return $this->apiResponse('message update successfully',$this->contactRepository->update($request,$contact));
    }

    public function destroy(Contact $contact)
    {
        $this->contactRepository->destroy($contact);
        return $this->apiResponse('success');
    }
}

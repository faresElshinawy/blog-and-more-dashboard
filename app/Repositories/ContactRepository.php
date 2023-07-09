<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Http\Requests\Api\ContactStoreRequest;
use App\Interfaces\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Contact::paginate(10);
        }
        return Contact::get();
    }

    public function store($request)
    {
        $contact = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ]);
        return $contact;
    }

    public function update($request,$contact)
    {
        $contact->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ]);
        return $contact;
    }

    public function destroy($contact)
    {
        $contact->delete();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ContactRepositoryInterface;

class ContactController extends Controller
{

    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Contacts.index',['contacts'=>$this->contactRepository->index(true)]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        toast('contact deleted successfully','success');
        return redirect()->back();
    }
}

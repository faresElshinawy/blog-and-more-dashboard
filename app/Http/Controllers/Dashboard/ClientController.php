<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ClientRepositoryInterface;
use App\Http\Requests\Dashboard\ClientStoreRequest;
use App\Http\Requests\Dashboard\ClientUpdateRequest;

class ClientController extends Controller
{
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Clients.index',['clients'=>$this->clientRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $this->clientRepository->store($request);
        toast('client added successfully','success');
        return redirect()->back();
    }

    public function edit(Client $client)
    {
        return view('Dashboard.pages.Clients.edit',compact('client'));
    }

    public function update(ClientUpdateRequest $request,Client $client)
    {
        $this->clientRepository->update($request,$client);
        toast('client updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Client $client)
    {
        $this->clientRepository->destroy($client);
        toast('client deleted successfully','success');
        return redirect()->back();
    }
}

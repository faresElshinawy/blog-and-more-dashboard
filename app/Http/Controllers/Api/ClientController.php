<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClientStoreRequest;
use App\Interfaces\ClientRepositoryInterface;
use App\Http\Requests\Api\ClientUpdateRequest;
use App\Traits\ApiResponse;

class ClientController extends Controller
{

    use ApiResponse;

    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->clientRepository->index(false));
    }

    public function store(ClientStoreRequest $request)
    {
        return $this->apiResponse('client added successfully',$this->clientRepository->store($request),null,201);
    }

    public function update(ClientUpdateRequest $request,Client $client)
    {
        return $this->apiResponse('client updated successfully',$this->clientRepository->update($request,$client));
    }

    public function destroy(Client $client)
    {
        $this->clientRepository->destroy($client);
        return $this->apiResponse('client deleted successfully');
    }
}

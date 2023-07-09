<?php

namespace App\Repositories;

use App\Models\Client;
use App\Interfaces\ClientRepositoryInterface;
use App\Traits\ImageUpload;

class ClientRepository implements ClientRepositoryInterface {

    use ImageUpload;

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Client::paginate(10);
        }
        return Client::get();
    }

    public function store($request)
    {
        $client = Client::create([
            'name'=>$request->name,
            'image'=>$this->imageUpload($request,Client::$uploadPath)
        ]);
        return $client;
    }

    public function update($request,$client)
    {
        $client->update([
            'name'=>$request->name,
            'image'=>$this->imageUpload($request,Client::$uploadPath) ?? $client->image
        ]);
        return $client;
    }

    public function destroy($client)
    {
        $this->remove($client->image);
        $client->delete();
    }
}

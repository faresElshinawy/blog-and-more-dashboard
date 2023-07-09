<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CountryStoreRequest;
use App\Http\Requests\Api\CountryUpdateRequest;
use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    use ApiResponse;

    private CountryRepositoryInterface $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->countryRepository->index(false));
    }

    public function store(CountryStoreRequest $request)
    {
        return $this->apiResponse('country added successfully',$this->countryRepository->store($request),null,201);
    }

    public function update(CountryUpdateRequest $request,Country $country)
    {
        return $this->apiResponse('country updated successfully',$this->countryRepository->update($request,$country));
    }

    public function destroy(Country $country)
    {
        $this->countryRepository->destroy($country);
        return $this->apiResponse('country deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CountryRepositoryInterface;
use App\Http\Requests\Dashboard\CountryStoreRequest;
use App\Http\Requests\Dashboard\CountryUpdateRequest;

class CountryController extends Controller
{

    private CountryRepositoryInterface $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Countries.index',['countries'=>$this->countryRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        $this->countryRepository->store($request);
        toast('country added successfully','success');
        return redirect()->back();
    }

    public function edit(Country $country)
    {
        return view('Dashboard.pages.Countries.edit',compact('country'));
    }

    public function update(CountryUpdateRequest $request,Country $country)
    {
        $this->countryRepository->update($request,$country);
        toast('country updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Country $country)
    {
        $this->countryRepository->destroy($country);
        toast('country deleted successfully','success');
        return redirect()->back();
    }
}

<?php

namespace App\Repositories;
use App\Models\User;
use App\Traits\GetAge;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    use GetAge;
    use ImageUpload;

    public function index($search = null)
    {
        $users = User::query();
        if($search)
        {
            $search = trim($search);
            $users->where('name','like',"%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->orWhere("phone",'like',"%{$search}%");
        }
        return $users->with('department','country','gender')->get();
    }

    public function usersOnlyNameAndId($role)
    {
        return User::select('name','id')->where('role',$role)->get();
    }

    public function store($request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$this->imageUpload($request,User::$uploadPath),
            'birthdate'=>$request->birthdate,
            'age'=>$this->getAge($request->birthdate)->age,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'gender_id'=>$request->gender_id,
            'country_id'=>$request->country_id,
            'department_id'=>$request->department_id,
            'role'=>$request->role ?? 'user',
        ]);
        return $user;
    }

    public function update($request,$user)
    {
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> ($request->password != null ? Hash::make($request->password) : $user->password),
            'image'=>$this->imageUpload($request,User::$uploadPath,$user->image),
            'birthdate'=>$request->birthdate,
            'age'=>$this->getAge($request->birthdate)->age,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'gender_id'=>$request->gender_id,
            'country_id'=>$request->country_id,
            'department_id'=>$request->department_id,
            'role'=>$request->role ?? $user->role,
        ]);
        return $user;
    }

    public function destroy($user)
    {
        $this->remove($user->image);
        $user->delete();
    }

    public function profile()
    {
        return User::where('id',auth()->user()->id)->with('department:name,id','country:name,id','gender:name,id')->first();
    }
}

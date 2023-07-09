@extends('Dashboard.inc.master')

@section('title', 'profile')
@section('pageName', 'profile')
@section('pageAction', 'edit')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Profile Info</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('dashboard.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-5 d-flex justify-content-center">
                                @if (File::exists('Uploads/Users/'.$user->image))
                                <img src="{{asset('Uploads/Users/'.$user->image)}}" class="img-fluid rounded" width="200" height="200" alt="">
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value='{{old('name') ?? $user->name}}'>
                                </div>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value='{{old('email') ?? $user->email}}'>
                                </div>
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value='{{old('password')}}'>
                                </div>
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" name="phone" value='{{old('phone') ?? $user->phone}}'>
                                </div>
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">gender</label>
                                    <select name="gender_id" class="form-control">
                                        <option selected disabled>select gender</option>
                                        @foreach ($genders as $gender)
                                        <option value="{{$gender->id}}" @selected(old('gender_id') ?? $user->gender_id)>{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('gender_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Date of Birth</label>
                                    <input name="birthdate" type="date" class="form-control" value='{{old('birthdate') ?? $user->birthdate}}'>
                                </div>
                                @error('birthdate')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country_id" class="form-control">
                                        <option selected disabled>select country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}" @selected(old('country_id') ?? $user->country_id)>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('country_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <select name="department_id" class="form-control">
                                        <option selected disabled>select department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}" @selected(old('department_id') ?? $user->department_id)>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('department_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <div class="form-group">
                                    <textarea name="description" class='form-control' id="" cols="30" rows="10">{{old('description') ?? $user->description}}</textarea>
                                </div>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <div class="form-group fallback w-100">
                                    <input type="file" name='image'>
                                </div>
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('dashboard.user.all')}}" class="btn btn-light">Cencel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" wire:model = 'search' placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Phone</th>
                    <th>user</th>
                    <th>Country</th>
                    <th>department</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if (File::exists('Uploads/Users/'.$user->image))
                                <img src="{{asset('Uploads/Users/'.$user->image)}}" class="img-fluid" width="90" height="90" alt="">
                                @endif
                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->gender->name}}</td>
                            <td>{{$user->country->name}}</td>
                            <td>{{$user->department->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <div class="btn-group btn-sm">
                                    <a class="btn btn-success btn-sm" href="{{route('dashboard.user.edit',['user'=>$user->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="{{route('dashboard.user.delete',['user'=>$user->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            {{$users->links('pagination::bootstrap-4')}}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>

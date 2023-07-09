<div>
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
         <!-- Info boxes -->
         <div class="row">
           <div class="col-md-12">
               <div class="container-fluid mb-5 d-flex justify-content-center">
                   <div class="col-4">
                        <label class="d-block">Starts From</label>
                       <input type="date" class="form-control col" wire:model='time_starts'>
                   </div>
                   <div class="col-4">
                       <label class="d-block">Ends at</label>
                       <input type="date" class="form-control col" wire:model='time_ends'>
                   </div>
               </div>
           </div>
           <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box">
                 <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

               <div class="info-box-content">
                 <span class="info-box-text">clients</span>
                 <span class="info-box-number">
                   {{$clientsCount}}
                 </span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
               <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

               <div class="info-box-content">
                 <span class="info-box-text">posts</span>
                 <span class="info-box-number">{{$postsCount}}</span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
           <!-- /.col -->

           <!-- fix for small devices only -->
           <div class="clearfix hidden-md-up"></div>

           <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
               <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

               <div class="info-box-content">
                 <span class="info-box-text">total projects</span>
                 <span class="info-box-number">{{$projectsCount}}</span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
               <div class="info-box-content">
                 <span class="info-box-text">Total users</span>
                 <span class="info-box-number">{{$usersCount}}</span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->

         <!-- Main row -->
         <div class="row">
           <!-- Left col -->
           <div class="col-md-12">
             <!-- TABLE: LATEST ORDERS -->
             <div class="card">
               <div class="card-header border-transparent">
                 <h3 class="card-title">Latest Users</h3>

                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                   <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                   </button>
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body p-0">
                 <div class="table-responsive">
                   <table class="table m-0">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>user</th>
                          <th>Country</th>
                          <th>Image</th>
                          <th>department</th>
                          <th>Role</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                              <tr>
                                  <td>{{$user->id}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->phone}}</td>
                                  <td>{{$user->gender->name}}</td>
                                  <td>{{$user->country->name}}</td>
                                  <td>
                                      @if (File::exists('Uploads/Users/'.$user->image))
                                      <img src="{{asset('Uploads/Users/'.$user->image)}}" class="img-fluid" width="90" height="90" alt="">
                                      @endif
                                  </td>
                                  <td>{{$user->department->name}}</td>
                                  <td>{{$user->role}}</td>
                              </tr>
                          @endforeach
                      </tbody>
                   </table>
                 </div>
                 <!-- /.table-responsive -->
               </div>
               <!-- /.card-body -->
               <div class="card-footer clearfix">
                 <a href="{{route('dashboard.user.create')}}" class="btn btn-sm btn-primary float-left">Add New User</a>
                 <a href="{{route('dashboard.user.all')}}" class="btn btn-sm btn-secondary float-right">View All Users</a>
               </div>
               <!-- /.card-footer -->
             </div>
             <!-- /.card -->
           </div>
           <!-- /.col -->

         </div>
         <div class="row">
             <!-- Left col -->
             <div class="col-md-12">
               <!-- TABLE: LATEST ORDERS -->
               <div class="card">
                 <div class="card-header border-transparent">
                   <h3 class="card-title">Latest Posts</h3>

                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                       <i class="fas fa-times"></i>
                     </button>
                   </div>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                   <div class="table-responsive">
                     <table class="table m-0">
                        <thead>
                            <tr>
                              <th style="width: 50px">Id</th>
                              <th>title</th>
                              <th>descriptoin</th>
                              <th>date</th>
                              <th>image</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($posts as $post)
                              <tr>
                                  <td>{{$post->id}}</td>
                                  <td>{{$post->title}}</td>
                                  <td><textarea class="border-0 bg-white" disabled>{{$post->description}}</textarea></td>
                                  <td>{{$post->date}}</td>
                                  <td>
                                      @if (File::exists('Uploads/Posts/'.$post->image))
                                      <img src="{{asset('Uploads/Posts/'.$post->image)}}" class="img-fluid rounded" width="100" height="100" alt="">
                                      @endif
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                     </table>
                   </div>
                   <!-- /.table-responsive -->
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer clearfix">
                   <a href="{{route('dashboard.post.create')}}" class="btn btn-sm btn-primary float-left">add new post</a>
                   <a href="{{route('dashboard.post.all')}}" class="btn btn-sm btn-secondary float-right">View All posts</a>
                 </div>
                 <!-- /.card-footer -->
               </div>
               <!-- /.card -->
             </div>
             <!-- /.col -->

           </div>
           <div class="row">
             <!-- Left col -->
             <div class="col-md-12">
               <!-- TABLE: LATEST ORDERS -->
               <div class="card">
                 <div class="card-header border-transparent">
                   <h3 class="card-title">Latest projects</h3>

                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                       <i class="fas fa-times"></i>
                     </button>
                   </div>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                   <div class="table-responsive">
                     <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>description</th>
                                <th>price</th>
                                <th>category</th>
                                <th>date</th>
                                <th>starts_at</th>
                                <th>ends_at</th>
                                <th>link</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->price }}</td>
                                    <td>{{ $project->category->name }}</td>
                                    <td>{{ $project->date }}</td>
                                    <td>{{ $project->starts_at }}</td>
                                    <td>{{ $project->ends_at }}</td>
                                    <td>{{ $project->link }}</td>
                                    <td>{{ $project->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                     </table>
                   </div>
                   <!-- /.table-responsive -->
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer clearfix">
                   <a href="{{route('dashboard.project.create')}}" class="btn btn-sm btn-primary float-left">Add new Project</a>
                   <a href="{{route('dashboard.project.all')}}" class="btn btn-sm btn-secondary float-right">View All Project</a>
                 </div>
                 <!-- /.card-footer -->
               </div>
               <!-- /.card -->
             </div>
             <!-- /.col -->

           </div>
         <!-- /.row -->
       </div><!--/. container-fluid -->
     </section>
     <!-- /.content -->
</div>


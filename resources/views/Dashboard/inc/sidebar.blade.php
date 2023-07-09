<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @auth
                    @if (auth()->user()->image)
                        <img src="{{ asset('uploads/Users/' . auth()->user()->image) }}" class="img-fluid" width="90"
                            height="50" alt="">
                    @else
                        <img src="{{ asset('Assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                    @endif
                @endauth
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @auth
                        {{ auth()->user()->name }}
                    @endauth
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
                </div>
            </div>
            </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                @if (Auth::check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.user.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.user.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add User</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('dashboard.gender.all') }}" class="nav-link">
                                    <p>
                                        Genders
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.gender.all') }}" class="nav-link">
                                            <i class="nav-icon far fa-circle text-info"></i>
                                            <p>All Genders</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.gender.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon "></i>
                                            <p>Add Gender</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('dashboard.country.all') }}" class="nav-link">
                                    {{-- <i class="nav-icon far fa-user"></i> --}}
                                    <p>
                                        Countries
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.country.all') }}" class="nav-link">
                                            <i class="nav-icon far fa-circle text-info"></i>
                                            <p>All Countries</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.country.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon "></i>
                                            <p>Add Country</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('dashboard.department.all') }}" class="nav-link">
                                    {{-- <i class="nav-icon far fa-user"></i> --}}
                                    <p>
                                        Departments
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.department.all') }}" class="nav-link">
                                            <i class="nav-icon far fa-circle text-info"></i>
                                            <p>All Departments</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.department.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon "></i>
                                            <p>Add Department</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Clients
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.client.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Clients</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.client.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add Client</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Features
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.feature.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Features</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.feature.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add Features</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Contacts
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.contact.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Contacts</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Plans
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.plan.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Plans</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.plan.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add Plan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Questions
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.question.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Questions</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Services
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.service.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.service.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add Service</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.setting.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.setting.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add Setting</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="nav-icon far fa-user"></i> --}}
                            <p>
                                Feedbacks
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.feedback.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Feedbacks</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon far fa-user"></i> --}}
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::check() && auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.post.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Posts</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('dashboard.post.myPosts.all') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>My Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.post.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon "></i>
                                <p>Add Posts</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon far fa-user"></i> --}}
                                <p>
                                    PostCategories
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.postCategory.all') }}" class="nav-link">
                                        <i class="nav-icon far fa-circle text-info"></i>
                                        <p>All PostCategories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.postCategory.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Add PostCategory</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon far fa-user"></i> --}}
                                <p>
                                    Tags
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.tag.all') }}" class="nav-link">
                                        <i class="nav-icon far fa-circle text-info"></i>
                                        <p>All Tags</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.tag.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Add Tags</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon far fa-user"></i> --}}
                        <p>
                            Projects
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::check() && auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.project.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>All Projects</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::check() && auth()->user()->role == 'employee')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.project.myProjects.all') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-waring"></i>
                                    <p>My Projects</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::check() && auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.project.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Add Project</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="nav-icon far fa-user"></i> --}}
                                    <p>
                                        Project Categories
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.projectCategory.all') }}" class="nav-link">
                                            <i class="nav-icon far fa-circle text-info"></i>
                                            <p>All Project Categories</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.projectCategory.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon "></i>
                                            <p>Add Project Category</p>
                                        </a>
                                    </li>
                        @endif
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="currentColor" class="bi bi-gear mx-1" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                        <p>
                            WebSite Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>All Settings</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->getFullName() }}</p>

                        <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

       {{-- <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->--}}

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
           {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>--}}
            @if(str_contains(Route::currentRouteAction(), 'UsersController@show'))
            <li class="treeview active">
                <a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> <span>User management</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users.index')}}"><- Back to list</a></li>
                    <li><a href="{{route('admin.users.edit', ['users' => $user->id])}}">Edit User</a></li>
                    <li><a href="#">Delete User</a></li>
                </ul>
            </li>
            @else
                <li>
                    <a href="{{route('admin.users.index')}}">
                        <i class="fa fa-users"></i> <span>Users</span>
                    </a>
                </li>
            @endif
            @if(str_contains(Route::currentRouteAction(), 'PatternController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/patterns') }}"><i class="fa fa-file-o"></i> <span>Pattern management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns.edit', ['patterns' => $patterns->id])}}">Edit Pattern</a></li>
                        <li><a href="#">Delete Pattern</a></li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns.index')}}">
                        <i class="fa fa-file-o"></i> <span>Patterns</span>
                    </a>
                </li>
            @endif

            @if(str_contains(Route::currentRouteAction(), 'CategoryController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/category') }}"><i class="fa fa-newspaper-o"></i> <span>Category management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns.edit', ['category' => $category->id])}}">Edit Category</a></li>
                        <li><a href="#">Delete Category</a></li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns.index')}}">
                        <i class="fa fa-newspaper-o "></i> <span>Category</span>
                    </a>
                </li>
            @endif

            @if(str_contains(Route::currentRouteAction(), 'TagController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/tag') }}"><i class="fa fa-newspaper-o"></i> <span>Tag management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns.edit', ['tag' => $tag->id])}}">Edit Tag</a></li>
                        <li><a href="#">Delete Tag</a></li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns.index')}}">
                        <i class="fa fa-newspaper-o "></i> <span>Tags</span>
                    </a>
                </li>
            @endif

            @if(str_contains(Route::currentRouteAction(), 'CommentController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/comment') }}"><i class="fa fa-newspaper-o"></i> <span>Comment management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns.edit', ['comment' => $comment->id])}}">Edit Comment</a></li>
                        <li><a href="#">Delete Comment</a></li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns.comments.index')}}">
                        <i class="fa fa-newspaper-o "></i> <span>Comments</span>
                    </a>
                </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
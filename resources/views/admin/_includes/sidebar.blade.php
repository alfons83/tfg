<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->getFullName() }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            @if(Auth::user()->type === 'admin')
            @if(str_contains(Route::currentRouteAction(), 'UsersController@show'))
            <li class="treeview active">
                <a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> <span>User management</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users.index')}}"><- Back to list</a></li>
                    <li><a href="{{route('admin.users.edit', ['users' => $user->id])}}">Edit User</a></li>
                    {!!   Form::open(['route'=>['admin.users.destroy',$user->id], 'method' => 'DELETE','id'=>'form-deletee']) !!}
                    <li><a href="#" class="btn-deletee">Delete User</a></li>
                    {!! Form::close()  !!}
                </ul>
            </li>
            @else
                <li>
                    <a href="{{route('admin.users.index')}}">
                        <i class="fa fa-users"></i> <span>Users</span>
                    </a>
                </li>
            @endif
            @endif
            @if(str_contains(Route::currentRouteAction(), 'PatternController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/patterns') }}"><i class="fa fa-file-o"></i> <span>Pattern management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns.edit', ['patterns' => $patterns->id])}}">Edit Pattern</a></li>
                        {!!   Form::open(['route'=>['admin.patterns.destroy',$patterns->id], 'method' => 'DELETE','id'=>'form-deletee']) !!}
                        <li><a href="#" class="btn-deletee">Delete Pattern</a></li>
                        {!! Form::close()  !!}
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns.index')}}">
                        <i class="fa fa-file-o"></i> <span>Patterns</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->type === 'admin')
            @if(str_contains(Route::currentRouteAction(), 'CategoryController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/patterns/category') }}"><i class="fa fa-suitcase"></i> <span>Category management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns-category.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns-category.edit', ['category' => $category->id])}}">Edit Category</a></li>
                        {!!   Form::open(['route'=>['admin.patterns-category.destroy',$category->id], 'method' => 'DELETE','id'=>'form-deletee']) !!}
                        <li><a href="#" class="btn-deletee">Delete Category</a></li>
                        {!! Form::close()  !!}
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns-category.index')}}">
                        <i class="fa fa-suitcase "></i> <span>Category</span>
                    </a>
                </li>
            @endif
            @endif
            @if(Auth::user()->type === 'admin')
            @if(str_contains(Route::currentRouteAction(), 'SubcategoryController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/patterns-subcategory') }}"><i class="fa fa-tags></i> <span>Subcategory management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns-subcategory.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns-subcategory.edit', ['subcategory' => $subcategory->id])}}">Edit Subcategory</a></li>
                        {!!   Form::open(['route'=>['admin.patterns-subcategory.destroy',$subcategory->id], 'method' => 'DELETE','id'=>'form-deletee']) !!}
                        <li><a href="#" class="btn-deletee">Delete Subcategory</a></li>
                        {!! Form::close()  !!}
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns-subcategory.index')}}">
                        <i class="fa fa-tags "></i> <span>Subcategory</span>
                    </a>
                </li>
            @endif
            @endif
            @if(Auth::user()->type === 'admin')
            @if(str_contains(Route::currentRouteAction(), 'NielsenController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/patterns-nielsen') }}"><i class="fa fa-newspaper-o"></i> <span>Nielsen management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns-nielsen.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns-nielsen.edit', ['subcategory' => $subcategory->id])}}">Edit Nielsen</a></li>
                        {!!   Form::open(['route'=>['admin.patterns-nielsen.destroy',$nielsen->id], 'method' => 'DELETE','id'=>'form-deletee']) !!}
                        <li><a href="#" class="btn-deletee">Delete Nielsen</a></li>
                        {!! Form::close()  !!}
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns-nielsen.index')}}">
                        <i class="fa fa-newspaper-o "></i> <span>Nielsen</span>
                    </a>
                </li>
            @endif
            @endif
            @if(Auth::user()->type === 'admin')
            @if(str_contains(Route::currentRouteAction(), 'CommentController@show'))
                <li class="treeview ">
                    <a href="{{ url('admin/patterns-comment') }}"><i class="fa fa-comments"></i> <span>Comment management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.patterns-comments.index')}}"><- Back to list</a></li>
                        <li><a href="{{route('admin.patterns-comments.edit', ['comment' => $comment->id])}}">Edit Comment</a></li>
                        {!!   Form::open(['route'=>['admin.patterns-comments.destroy',$comment->id], 'method' => 'DELETE','id'=>'form-deletee']) !!}
                        <li><a href="#" class="btn-deletee">Delete Nielsen</a></li>
                        {!! Form::close()  !!}
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{route('admin.patterns-comments.index')}}">
                        <i class="fa fa-comments "></i> <span>Comments</span>
                    </a>
                </li>
            @endif
                @endif
        </ul>
    </section>
</aside>
@section('scripts')
<script>
    $(function() {
        $('.btn-deletee').click(function(e) {
            e.preventDefault();
            $('#form-deletee').submit();
        });
    });
</script>
@stop
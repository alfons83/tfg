<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Experts Members</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            @foreach($usersExperts as $user)
                <li data-id="{{ $user->id }}">
{{--
                    <img src="{{ asset('uploads/users/user_'.$user->id.'/'.$user->profile->path) }}" alt="" class="img-responsive">
--}}

                    <a class="users-list-name" href="{{route('admin.users.show', ['users' => $user->id])}}">{{ $user->first_name.' '.$user->last_name }}</a>
                    <span class="users-list-date">{{ $user->created_at }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="box-footer text-center">
        <a href="{{route('admin.users.index')}}" class="uppercase">View All Users</a>
    </div>
</div>
<!-- USERS LIST -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Latest User Members</h3>
        <div class="box-tools pull-right">
            <span class="label label-primary">8 New Members</span>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            @foreach($users1 as $user)
            <li data-id="{{ $user->id }}">
                <img src="/bower_components/admin-lte/dist/img/user1-128x128.jpg" alt="User Image">
                <a class="users-list-name" href="#">{{ $user->getFullName() }}</a>
                <span class="users-list-date">{{ $user->timestamps() }}</span>
            </li>
            @endforeach
        </ul><!-- /.users-list -->
    </div><!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="{{route('admin.users.index')}}" class="uppercase">View All Users</a>
    </div><!-- /.box-footer -->
</div><!--/.box -->
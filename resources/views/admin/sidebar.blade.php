<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
           {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>--}}
            <li class="treeview">
                <a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/users') }}">Add User</a></li>
                    <li><a href="#">View User</a></li>
                    <li><a href="#">Edit User</a></li>
                    <li><a href="#">Delete User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-file-o"></i> <span>Patterns</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Add Pattern</a></li>
                    <li><a href="#">View Pattern</a></li>
                    <li><a href="#">Edit Pattern</a></li>
                    <li><a href="#">Delete Pattern</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
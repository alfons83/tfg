<header class="main-header">

    <a href="{{ url('admin/dashboard') }}" class="logo">

        <span class="logo-mini"><b>T</b>FG</span>
        <span class="logo-lg"><b>Admin</b>Patterns</span>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset(Auth::user()->profile->path) }}" alt="User Image" class="user-image">



                        <span class="hidden-xs">{{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="user-header">
                            <img src="{{ asset(Auth::user()->profile->path) }}" class="img-circle"
                                 alt="User Image">

                            <p>
                                {{ Auth::user()->first_name . ' ' .Auth::user()->last_name}}
                                <small> {{ Auth::user()->username }}</small>
                            </p>
                        </li>
                        <li class="user-footer">

                            <div class="pull-left">
                                <a href="{{ url('admin/users/'.Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                            </div>

                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>


                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
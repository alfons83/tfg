<!DOCTYPE html>
<html>
<head>
    @include('admin._includes.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin._includes.header')
    @include('admin._includes.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Optional description</small>
            </h1>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('admin._includes.footer')
</div>
@include('admin._includes.scripts')
@yield('scripts')
</body>
</html>

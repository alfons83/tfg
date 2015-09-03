<!DOCTYPE html>
<html>
<head>
    @include('admin._includes.head')
</head>
<body class="hold-transition login-page">
@yield('content')


{!! Html::script('/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') !!}
{{--<script src="/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>--}}
        <!-- Bootstrap 3.3.5 -->
{{--<script src="/bower_components/admin-lte/bootstrap/js/bootstrap.min.js"></script>--}}
{!! Html::script('/bower_components/admin-lte/bootstrap/js/bootstrap.min.js') !!}
        <!-- AdminLTE App -->
{{--<script src="/bower_components/admin-lte/dist/js/app.min.js"></script>--}}
{!! Html::script('/bower_components/admin-lte/dist/js/app.min.js') !!}
{{--<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>--}}
</body>
</html>

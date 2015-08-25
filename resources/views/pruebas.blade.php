<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <style>
        .text-warning {
            color: orange !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset("css/angular-toastr.min.css")}}">


</head>
<body ng-app="app">

<section id="body" ng-controller="MainCtrl">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Usuarios</h1>

                Buscar: <input type="text" ng-model="searchUser">

                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="user in users | filter:searchUser">
                        <td>[[user.id]]</td>
                        <td>[[user.name]]</td>
                        <td>[[user.email]]</td>
                        <td>
                            <button ng-click="delete(user.id)">Eliminar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <ul>
                    <li ng-repeat="user in users | filter:searchUser">[[user.name]] ([[user.email]])</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.17/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.17/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.17/angular-resource.min.js"></script>
<script src="{{asset("js/angular-toastr.min.js")}}"></script>
<script src="{{asset("js/angular-toastr.tpls.min.js")}}"></script>
<script src="{{asset("js/pruebas.js")}}"></script>


</body>
</html>
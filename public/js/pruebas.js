var app = angular.module('app', ['ngResource', 'ngAnimate', 'toastr']);

app.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
}]);

app.factory('Users', function($resource) {
    return $resource('/admin/users/:id');
});

app.controller("MainCtrl", function($scope, $resource, Users,toastr) {
    $scope.searchUser = "";
    $scope.users = [];

    Users.query(function(result) {
        $scope.users = result;
    });

    $scope.delete = function(id) {
        angular.forEach($scope.users, function(element, index) {
            if(element.id === id) {
                $scope.users.splice(index, 1);

                //Users.delete({id: id, "_method":"delete"}, function() {
                    // notificar al usuario con un Toast


                        toastr.success('Hello world!', 'Toastr fun!');


                //});
            }
        });
    };
});
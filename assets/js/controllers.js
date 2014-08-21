var shopController = angular.module('shopController',[]);

shopController.controller('categoriesCtl',['categories','$scope', '$routeParams',function(categories, $scope, $routeParams){
    var action =  $routeParams.action;
    switch(action){
        case 'all':
            $scope.catgories = categories.getAll();
            break;
        case 'byId':
            var id = $routeParams.id;
            $scope.catgories = categories.getById({'id':id});
            break;
    }
}]);

shopController.controller('createCatCtl',['$scope','categories',function($scope,categories){
    $scope.update = function(){
       categories.insert({"name":$scope.category});
    };
}]);

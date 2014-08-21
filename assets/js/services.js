var shopServices = angular.module('shopServices',['ngResource']);

shopServices.factory('categories',['$resource',function($resource){
    return $resource(
        'http://localhost/shop/categories.php',
        {},
        {
            getAll: {method: 'GET',params:{id:0},isArray:false},
            getById: {method: 'GET', params:{id:3},isArray:false},
            insert: {method: 'POST'},
        });
}]);

var classShop = angular.module('classShop',[
                                            'ngRoute',
                                            'shopServices',
                                            'shopController'                                            
                                            ]);

classShop.config(['$routeProvider',function($routeProvider){
        $routeProvider.when('/categories/:action',{
            templateUrl: 'templates/categories.php',
            controller: 'categoriesCtl'
        }).
        when('/categories/:action/:id',{
            templateUrl: 'templates/categories.php',
            controller: 'categoriesCtl'
        }).
        when('/category/new/',{
            templateUrl: 'templates/createCategory.php',
            controller: 'createCatCtl'
        }).otherwise({
            redirectTo: '/categories/all'
      });
}]);

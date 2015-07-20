var CmsControllers  = angular.module('CmsControllers',[]);

CmsControllers.controller('DashboardController',['$scope',
    function($scope){}
]);



/** PRODUCT CONTROLLERS */
CmsControllers.controller('ProductController',['$scope','FactoryProducts',
    function($scope,FactoryProducts){
        FactoryProducts.getList().then(function(result){
            $scope.products = result;
        });

        $scope.delete = function(index) {
            $scope.products = FactoryProducts.delete(index);
        }

    }
]);
CmsControllers.controller('ProductDetailController',['$scope','$routeParams','$location','FactoryProducts', function($scope,$routeParams,$location,FactoryProducts) {
    FactoryProducts.getList().then(function(result){
        $scope.selectedItem = result[$routeParams.id];
    });

    $scope.save = function(){
        FactoryProducts.update($routeParams.id,$scope.selectedItem);
        $location.path('products');
    }
}]);

/** CATEGORIE CONTROLLERS */
CmsControllers.controller('CategorieController',['$scope','$http',

    function($scope,$http){

        $http.get('admin/categories').then(function(result){
            $scope.categories = result.data;
        });

        $scope.delete = function(index){
            var categorie = $scope.categories[index];
            $http.get('/admin/categories/delete/' + categorie.id);
            $scope.categories.splice(index,1);
        }

    }
]);
CmsControllers.controller('CategorieDetailController',['$scope','$routeParams','$http','$location',

    function($scope,$routeParams,$http,$location){

        $http.get('admin/categories').then(function(result){
            $scope.categories = result.data;
            $scope.selectedItem = $scope.categories[$routeParams.id];
        });

        $scope.save = function(){
            $http.post('/admin/categories/update', $scope.selectedItem);
            $location.path('categories');
        }
    }
]);
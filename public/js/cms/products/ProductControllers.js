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
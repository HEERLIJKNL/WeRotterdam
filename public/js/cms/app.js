var CmsApp = new angular.module('CmsApp',['ngRoute','CmsControllers'],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

CmsApp.config(['$routeProvider',
    function($routeProvider){
        $routeProvider.
            when('/products',{
                templateUrl: 'js/cms/products/products.tpl.html',
                controller: 'ProductController'
            }).
            when('/product/edit/:id',{
                templateUrl: 'js/cms/products/product-edit.tpl.html',
                controller: 'ProductDetailController'
            }).
            when('/categories',{
                templateUrl: 'js/cms/categorie/categories.tpl.html',
                controller: 'CategorieController'
            }).
            when('/categorie/edit/:id',{
                templateUrl: 'js/cms/categorie/categorie-edit.tpl.html',
                controller: 'CategorieDetailController'
            })
    }
]);

CmsApp.factory('FactoryProducts',['$http','$q', function($http,$q){
    var cache = false;
    var getProductsAsync = function(){
        var q = $q.defer();

        if(cache){  q.resolve(cache); }
        else {
            $http({method: 'GET', url: 'admin/products', cache:true}).then(
                function succes(response){
                    cache = response.data;
                    q.resolve(cache);
                }
            )
        }

        return q.promise;
    }

    var products = {};

    products.getList = function(){
        return getProductsAsync();
    }
    products.update = function(index,product){
        $http.post('/admin/products/update', product);
        cache[index] = product;
    }
    products.add = function(product){
        $http.post('/admin/products/store', product);
        cache.push(product);
    }
    products.delete = function(index){
        var product = cache[index];
        $http.get('/admin/products/delete/' + product.id);
        cache.splice(index,1);

        return cache;
    }
    return products;
}])
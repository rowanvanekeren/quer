(function(){
    var app = angular.module("mainApp",[]);

    app.controller('MainController',['$rootScope','$scope','$http',function($rootScope,$scope,$http) {
        
        console.log("test");
        $scope.quer = "";
        $scope.total_price = 0;
        $scope.show_sure_pop_up = false;
        $scope.contract_id;


        $scope.choose_quer = function (quer, ad_price, quer_price, contract_id) {
            console.log(quer);
            $scope.quer = quer;
            $scope.total_price = ad_price + quer_price;
            $scope.contract_id = contract_id;
            $scope.show_sure_pop_up = true;
        };
        






    }]);

})();
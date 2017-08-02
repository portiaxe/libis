
app.factory("BorrowerDataOp", ['$http', function($http) {

	var BorrowerDataOp = {};

		BorrowerDataOp.getBorrowerList = function(){
			return $http({
				method: 'GET',
				url: 'Borrower/getBorrowerList'
			})
		};

		BorrowerDataOp.getBorrowerHistory = function(id){
			return $http({
				method: 'GET',
				url: 'Borrower/getBorrowerHistory/'+id
			})
		};

	return BorrowerDataOp;

}]);

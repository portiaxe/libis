
app.factory("BorrowDataOp", ['$http', function($http) {

	var BorrowDataOp = {};

		BorrowDataOp.getBorrowLogList = function(){
			return $http({
				method: 'GET',
				url: 'Borrow/getBorrowLogList'
			})
		}

	return BorrowDataOp;

}]);

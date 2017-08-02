app.factory("CategoryDataOp", ['$http', function($http) {

	var CategoryDataOp = {};

		CategoryDataOp.getCategoryList = function(){
			return $http({
				method: 'GET',
				url: 'Category/getCategoryList'
			})
		}

		CategoryDataOp.addCategory = function(category){
			return $http({
				method: 'POST',
				url: 'Category/addCategory',
				dataType: 'json',
				data: category,
				headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			})
		}

		CategoryDataOp.editCategory = function(category){
			return $http({
				method: 'POST',
				url: 'Category/editCategory',
				dataType: 'json',
				data: category,
				headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			})
		}

		CategoryDataOp.deleteCategory = function(category){
			return $http({
				method: 'POST',
				url: 'Category/deleteCategory',
				dataType: 'json',
				data: category,
				headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			})
		}
	return CategoryDataOp;

}]);

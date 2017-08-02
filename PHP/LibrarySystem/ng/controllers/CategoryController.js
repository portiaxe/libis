app.controller('CategoryController', function($rootScope, $scope, $state,
		CategoryDataOp) {

		$scope.CategoryList =[];
		$scope.FilteredCategoryList =[];

		$scope.categoryTotalItems = null;
		$scope.categoryCurrentPage = 1;
		$scope.categoryMaxSize = 5;
		$scope.categoryNumPerPage = 5;

		$scope.category = {};


		$scope.addCategory = function(){
			console.log($scope.category);
				CategoryDataOp.addCategory($scope.category).then(function(response){

						$scope.category = {};//clear data
						$(".modal").modal("hide");
						$scope.category = {};//clear data
				}).catch(function(error) {
					//viewErrorNotif('Error',error.data.message,'gritter-error');
					console.log(error);
				})
		};

		$scope.setCategory = function(category){
			//console.log(category);
			$scope.category = {
				'id':   category.categ_id,
				'code': category.categ_code,
				'desc': category.categ_desc
			};
		}

		$scope.editCategory = function(){
			console.log($scope.category);
			CategoryDataOp.editCategory($scope.category).then(function(response){

					console.log(response);
					$(".modal").modal("hide");
					loadData();

			}).catch(function(error) {
				//viewErrorNotif('Error',error.data.message,'gritter-error');
				console.log(error);
			});
		}

		$scope.deleteCategory = function(category){
			//console.log(category);
			CategoryDataOp.deleteCategory(category).then(function(response){
					console.log(response);
					$(".modal").modal("hide");
					loadData();

			}).catch(function(error) {
				//viewErrorNotif('Error',error.data.message,'gritter-error');
				console.log(error);
			});
		};

		CategoryDataOp.getCategoryList().then(function(response){

			$scope.CategoryList = response.data;
			$scope.categoryTotalItems = $scope.CategoryList.length;
			$scope.categoryPageChanged();
			//console.log($scope.CategoryList);

		}).catch(function(error) {
			console.log(error);
		});



		$scope.categorySetPage = function (pageNo) {
			$scope.categoryCurrentPage = pageNo;
		};



		$scope.categoryPageChanged = function() {
			//$log.log('Page changed to: ' + $scope.currentPage);
			//console.log('Page changed to: ' + $scope.categoryCurrentPage);

			 var begin = (($scope.categoryCurrentPage - 1) * $scope.categoryNumPerPage);
			 var end = begin + $scope.categoryNumPerPage;

			 $scope.FilteredCategoryList = $scope.CategoryList.slice(begin, end);
			// console.log($scope.FilteredCategoryList);

		};

		function loadData(){
			CategoryDataOp.getCategoryList().then(function(response){

				$scope.CategoryList = response.data;
				$scope.categoryTotalItems = $scope.CategoryList.length;
				$scope.categoryPageChanged();
				//console.log($scope.CategoryList);

			}).catch(function(error) {
				console.log(error);
			});
			var begin = (($scope.categoryCurrentPage - 1) * $scope.categoryNumPerPage);
			var end = begin + $scope.categoryNumPerPage;

			$scope.FilteredCategoryList = $scope.CategoryList.slice(begin, end);
		}
	});

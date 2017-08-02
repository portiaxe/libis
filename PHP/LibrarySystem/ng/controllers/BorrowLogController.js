app.controller('BorrowLogController', function($rootScope, $scope, $state,
		BorrowDataOp) {

			$scope.BorrowList =[];
			$scope.FilteredBorrowList =[];

			$scope.borrowTotalItems = null;
			$scope.borrowCurrentPage = 1;
			$scope.borrowMaxSize = 5;
			$scope.borrowNumPerPage = 5;

			$scope.borrow = {};
			$scope.search ="";
			loadData();


			$scope.borrowSetPage = function (pageNo) {
				$scope.borrowCurrentPage = pageNo;
			};

			$scope.borrowPageChanged = function() {

				 var begin = (($scope.borrowCurrentPage - 1) * $scope.borrowNumPerPage);
				 var end = begin + $scope.borrowNumPerPage;
				 $scope.FilteredBorrowList = $scope.BorrowList.slice(begin, end);

			};



			function loadData(){

				BorrowDataOp.getBorrowLogList().then(function(response){
					$scope.BorrowList = response.data;
					$scope.borrowTotalItems = $scope.BorrowList.length;

					var begin = (($scope.borrowCurrentPage - 1) * $scope.borrowNumPerPage);
					var end = begin + $scope.borrowNumPerPage;
					$scope.FilteredBorrowList = $scope.BorrowList.slice(begin, end);

				}).catch(function(error) {
					console.log(error);
				});

			}


	});

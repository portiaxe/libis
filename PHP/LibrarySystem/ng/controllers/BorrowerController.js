app.controller('BorrowerController', function($rootScope, $scope, $state,
		BorrowerDataOp) {

			$scope.BorrowerList =[];
			$scope.FilteredBorrowerList =[];

			$scope.borrowerTotalItems = null;
			$scope.borrowerCurrentPage = 1;
			$scope.borrowerMaxSize = 5;
			$scope.borrowerNumPerPage = 5;

			$scope.borrower = {};
			$scope.search ="";
			loadData();


			$scope.BorrowerHistoryList =[];
			$scope.FilteredBorrowerHistoryList =[];
			$scope.borrowerHistoryTotalItems = null;
			$scope.borrowerHistoryCurrentPage = 1;
			$scope.borrowerHistoryMaxSize = 5;
			$scope.borrowerHistoryNumPerPage = 5;


			$scope.borrowerSetPage = function (pageNo) {
				$scope.borrowerCurrentPage = pageNo;
			};

			$scope.borrowerPageChanged = function() {

				 var begin = (($scope.borrowerCurrentPage - 1) * $scope.borrowerNumPerPage);
				 var end = begin + $scope.borrowerNumPerPage;
				 $scope.FilteredBorrowerList = $scope.BorrowerList.slice(begin, end);

			};

			$scope.viewhistory = function(borrower){
				//console.log(borrower);
				BorrowerDataOp.getBorrowerHistory(borrower.borrower_id).then(function(response){

					$scope.BorrowerHistoryList = response.data;
					$scope.borrowerHistoryTotalItems = $scope.BorrowerHistoryList.length;

					var begin = (($scope.borrowerHistoryCurrentPage - 1) * $scope.borrowerHistoryNumPerPage);
					var end = begin + $scope.borrowerHistoryNumPerPage;
					$scope.FilteredBorrowerHistoryList = $scope.BorrowerHistoryList.slice(begin, end);

					//console.log(response);
				}).catch(function(error) {
					console.log(error);
				});
			}

			$scope.borrowerHistorySetPage = function (pageNo) {
				$scope.borrowerHistoryCurrentPage = pageNo;
			};

			$scope.borrowerHistoryPageChanged = function() {

				 var begin = (($scope.borrowerHistoryCurrentPage - 1) * $scope.borrowerHistoryNumPerPage);
				 var end = begin + $scope.borrowerHistoryNumPerPage;
				 $scope.FilteredBorrowerHistoryList = $scope.BorrowerHistoryList.slice(begin, end);

			};


			function loadData(){

				BorrowerDataOp.getBorrowerList().then(function(response){
					$scope.BorrowerList = response.data;
					$scope.borrowerTotalItems = $scope.BorrowerList.length;

					var begin = (($scope.borrowerCurrentPage - 1) * $scope.borrowerNumPerPage);
					var end = begin + $scope.borrowerNumPerPage;
					$scope.FilteredBorrowerList = $scope.BorrowerList.slice(begin, end);
					//console.log(response);
				}).catch(function(error) {
					console.log(error);
				});

			}


	});

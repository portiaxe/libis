app.controller('BookController', function($rootScope, $scope, $state,
		BookDataOp) {

			$scope.BookList =[];
			$scope.FilteredBookList =[];

			$scope.booksTotalItems = null;
			$scope.booksCurrentPage = 1;
			$scope.booksMaxSize = 5;
			$scope.booksNumPerPage = 5;

			$scope.book = {};
			$scope.search ="";

			loadData();


			$scope.bookSetPage = function (pageNo) {
				$scope.booksCurrentPage = pageNo;
			};

			$scope.bookPageChanged = function() {

				 var begin = (($scope.booksCurrentPage - 1) * $scope.booksNumPerPage);
				 var end = begin + $scope.booksNumPerPage;
				 $scope.FilteredBookList = $scope.BookList.slice(begin, end);

			};


			//CREATE
			$scope.addBook = function(){

				BookDataOp.addBook($scope.book).then(function(response){

						$scope.book = {};//clear data

						$(".modal").modal("hide");
						loadData();

						$scope.book = {};

				}).catch(function(error) {
					//viewErrorNotif('Error',error.data.message,'gritter-error');
					console.log(error);
				});
			}

			//UPDATE
			$scope.editBook = function(){

				BookDataOp.editBook($scope.book).then(function(response){
						console.log(response);
						$(".modal").modal("hide");
						loadData();

				}).catch(function(error) {
					//viewErrorNotif('Error',error.data.message,'gritter-error');
					console.log(error);
				});

			}
			$scope.searchBook = function(){
				BookDataOp.searchBook($scope.search).then(function(response){
					$scope.BookList = response.data;
					$scope.booksTotalItems = $scope.BookList.length;
					$scope.bookPageChanged();
				}).catch(function(error) {
					//viewErrorNotif('Error',error.data.message,'gritter-error');
					console.log(error);
				});
			}

			//DELETE
			$scope.deleteBook = function(book){

				BookDataOp.deleteBook(book).then(function(response){
						$(".modal").modal("hide");

						loadData();

				}).catch(function(error) {
					//viewErrorNotif('Error',error.data.message,'gritter-error');
					console.log(error);
				});
			}



			$scope.showAddModal = function(){
				$scope.book = {};
			}
			$scope.showBookEditModal = function(book){
					$scope.book = book;
			}

			$scope.modalCancel = function(){
				 //clear data when canceled
					$scope.book = {};
			}



			function loadData(){

				BookDataOp.getBookList().then(function(response){
					$scope.BookList = response.data;
					$scope.booksTotalItems = $scope.BookList.length;

					var begin = (($scope.booksCurrentPage - 1) * $scope.booksNumPerPage);
					var end = begin + $scope.booksNumPerPage;
					$scope.FilteredBookList = $scope.BookList.slice(begin, end);
					console.log(response);
				}).catch(function(error) {
					console.log(error);
				});

			}


	});

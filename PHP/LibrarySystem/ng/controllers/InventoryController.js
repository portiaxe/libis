app.controller('InventoryController', function($rootScope, $scope, $state,
		InventoryDataOp,BookDataOp,CategoryDataOp) {

		$scope.InventoryList =[];
		$scope.FilteredInventoryList =[];

		$scope.inventoryTotalItems = null;
		$scope.inventoryCurrentPage = 1;
		$scope.inventoryMaxSize = 5;
		$scope.inventoryNumPerPage = 5;
		$scope.inv_search_data ='';

	  $scope.selectedInventory = {};


		$scope.inventorySetPage = function (pageNo) {
			$scope.inventoryCurrentPage = pageNo;
		};

		//load data
		var loadData = function(){
			InventoryDataOp.getInventoryWithCategoryList().then(function(response){
				$scope.InventoryList = response.data;
				$scope.inventoryTotalItems = response.data.length;
				$scope.inventoryPageChanged();

			}).catch(function(error) {
				console.log(error);
			});

			$scope.inventoryPageChanged = function() {
				//$log.log('Page changed to: ' + $scope.currentPage);
				//console.log('Page changed to: ' + $scope.inventoryCurrentPage);

				 var begin = (($scope.inventoryCurrentPage - 1) * $scope.inventoryNumPerPage);
				 var end = begin + $scope.inventoryNumPerPage;

				 $scope.FilteredInventoryList = $scope.InventoryList.slice(begin, end);
				//console.log($scope.FilteredInventoryList);
				//console.log($scope.InventoryList);
			};

			$scope.selected_book =  {};
			$scope.inv_book_categ = '';
			$scope.inv_book_code = '';

			$scope.inv_bookList =[];
			$scope.inv_categList =[];

			BookDataOp.getBookWithCategoryList().then(function(response){
				$scope.inv_bookList = response.data;
			}).catch(function(error) {
				console.log(error);
			});


		}




		loadData();

		//CREATE
		$scope.submitInventory = function(){

			$inventory = {};


			$inventory.book_id = $scope.selected_book.book_id;
			$inventory.book_code = $scope.inv_book_code;
			InventoryDataOp.addInventory($inventory).then(function(response){

				$scope.selected_book =  '';
				$scope.inv_book_categ = '';
				$(".modal").modal("hide");
			}).catch(function(error){
				console.log(error);

			});

		}

		//READ
		$scope.searchInventory = function(){
			InventoryDataOp.searchInventory($scope.inv_search_data).then(function(response){
				$scope.InventoryList = response.data;
				$scope.inventoryTotalItems = response.data.length;
				$scope.inventoryPageChanged();

				console.log(response.data);
			}).catch(function(error) {
				viewErrorNotif('Error',error.data.message,'gritter-error');
				console.log(error);
			});
		}

		//DELETE
		$scope.deleteInventory = function(inventory){

			InventoryDataOp.deleteInventory(inventory).then(function(response){
			//load to refresh data
			loadData();
			}).catch(function(error){
				console.log(error);

			});
		}

		$scope.showEditModal = function(inventory){
			var findBook = function(id){
					 book = {};

					for(var b of $scope.inv_bookList){
						if(b.book_id == id){
							book = b;
							break;
						}

					}
					return book;
			}

			//one object not just id
			$scope.selected_book =  findBook(inventory.book_id);
			$scope.selectedInventory = inventory;

		}


	});

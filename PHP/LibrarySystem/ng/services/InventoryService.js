app.factory("InventoryDataOp", ['$http', function($http) {

	var InventoryDataOp = {};

		InventoryDataOp.getInventoryList = function(){
			return $http({
				method: 'GET',
				url: 'BookInventory/getInventoryList'
			})
		}
		InventoryDataOp.getInventoryWithCategoryList = function(){
			return $http({
				method: 'GET',
				url: 'BookInventory/getInventoriesWithCategory'
			})
		}

		InventoryDataOp.addInventory = function(inventory){
			return $http({
				method: 'POST',
				data: inventory,
				url:'BookInventory/addInventory/'+inventory.book_id+'/'+inventory.book_code
			})
		}
		InventoryDataOp.searchInventory = function(search){
			return $http({
				method: 'GET',
				url: 'BookInventory/SearchInventory/'+search
			})
		}

		InventoryDataOp.deleteInventory = function(inventory){
			return $http({
				method: 'POST',
				url: 'BookInventory/DeleteInventory/'+inventory.inv_id
			})
		}
	return InventoryDataOp;

}]);

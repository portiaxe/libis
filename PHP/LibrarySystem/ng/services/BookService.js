
app.factory("BookDataOp", ['$http', function($http) {

	var BookDataOp = {};

		BookDataOp.getBookList = function(){
			return $http({
				method: 'GET',
				url: 'Book/getBooks'
			})
		}
		BookDataOp.getBookWithCategoryList = function(){
			return $http({
				method: 'GET',
				url: 'Book/getBooksWithCategory'
			})
		}
		BookDataOp.searchBook = function(book){
			return $http({
				method: 'GET',
				url: 'Book/searchBook/'+book,
				data: book,
			})
		}

		BookDataOp.addBook = function(book){
			console.log(book);
			return $http({
				method: 'POST',
				 url: 'Book/addBook',
				 dataType: 'json',
				 data: book,
				 headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			})

		}
		BookDataOp.editBook = function(book){
			return $http({
				method: 'POST',
				 url: 'Book/editBook',
				 dataType: 'json',
				 data: book,
				 headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			})
		}

		BookDataOp.deleteBook = function(book){
			return $http({
				method: 'POST',
				 url: 'Book/deleteBook',
				 dataType: 'json',
				 data: book,
				 headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			})

		}


	return BookDataOp;

}]);

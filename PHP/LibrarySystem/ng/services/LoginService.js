app.factory('LoginDataOp', ['$http', function($http){

	    var vm = this;

	    var LoginDataOp = {};
	    vm.user = {};

	    LoginDataOp.login = function(user){
	        return $http({
	            method: 'POST',
	            url: 'Access/loguser',
							dataType: 'json',
							data: user,
							headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	        })
	    }
			LoginDataOp.logout = function(){
				return $http({
						method: 'GET',
						url: 'Access/testLogout'
				})
			}
			LoginDataOp.currentUser= function(){
					return $http({
							method: 'GET',
							url: 'Access/currentUser'
					})
			}
			LoginDataOp.isLogged = function(){
				var result;
				$http({
								method: 'GET',
								url: 'Access/currentUser'
						}).then(function(response){
							if(response.data.user_id != null){
								result = true;
							}
							console.log(result);
						}).catch(function(error){
							console.log(error);
						});

						console.log(result);
						return result;
			}

	    return LoginDataOp;

	}]);

var app = angular.module('LibraryPortalApp',['ui.router','ui.bootstrap']);

app.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
    $urlRouterProvider.otherwise('/');
    $stateProvider
    .state('home', {
          url: '/home',
          templateUrl: 'partials/home.html',
		      controller: 'HomeController',
          controllerAs: 'vmHome'
      })
      .state('login', {
              url: '/login',
              templateUrl: 'partials/login.html',
    		      controller: 'LoginController',
              controllerAs: 'vmLogin',
              resolve: {
                  canLogin : ['$q', 'Access', function ($q, Access) {
                      var deferred = $q.defer();

                      if (Access.isAuthenticated()) {
                          deferred.reject();
                      }
                      else {
                          deferred.resolve();
                      }

                      return deferred.promise;
                  }]
            }

      })
    .state('books', {
          url: '/books',
          templateUrl: 'partials/books.html',
		      controller: 'BookController',
          controllerAs: 'vmBook',
          resolve: {
              canLogin : ['$q', 'Access', function ($q, Access) {
                  var deferred = $q.defer();
                  console.log("accessing books");
                  if (!Access.isAuthenticated()) {
                      deferred.reject();
                  }
                  else {
                      deferred.resolve();
                  }

                  return deferred.promise;
              }]
        }
      })

  	.state('categories', {
            url: '/categories',
            templateUrl: 'partials/categories.html',
			      controller: 'CategoryController',
            controllerAs: 'vmCategory',
            resolve: {
                canLogin : ['$q', 'Access', function ($q, Access) {
                    var deferred = $q.defer();

                    if (!Access.isAuthenticated()) {
                        deferred.reject();
                    }
                    else {
                        deferred.resolve();
                    }

                    return deferred.promise;
                }]
          }
     })

   	.state('inventories', {
             url: '/inventories',
             templateUrl: 'partials/inventories.html',
			       controller: 'InventoryController',
             controllerAs: 'vmInventory',
             resolve: {
                 canLogin : ['$q', 'Access', function ($q, Access) {
                     var deferred = $q.defer();

                     if (!Access.isAuthenticated()) {
                         deferred.reject();
                     }
                     else {
                         deferred.resolve();
                     }

                     return deferred.promise;
                 }]
           }

    })
    .state('borrower', {
               url: '/borrower',
               templateUrl: 'partials/borrower.html',
               controller: 'BorrowerController',
               controllerAs: 'vmBorrower',
               resolve: {
                   canLogin : ['$q', 'Access', function ($q, Access) {
                       var deferred = $q.defer();
                       if (!Access.isAuthenticated()) {
                           deferred.reject();
                       }
                       else {
                           deferred.resolve();
                       }

                       return deferred.promise;
                   }]
             }

      })
      .state('profile', {
                   url: '/profile',
                   templateUrl: 'partials/Profile.html',
                   controller: 'ProfileController',
                   controllerAs: 'vmProfile',
                   resolve: {
                       canLogin : ['$q', 'Access', function ($q, Access) {
                           var deferred = $q.defer();
                           if (!Access.isAuthenticated()) {
                               deferred.reject();
                           }
                           else {
                               deferred.resolve();
                           }

                           return deferred.promise;
                       }]
                 }

          })
    .state('borrowlogs', {
             url: '/borrow-logs',
             templateUrl: 'partials/borrowlogs.html',
             controller: 'BorrowLogController',
             controllerAs: 'vmBorrowLog',
             resolve: {
                 canLogin : ['$q', 'Access', function ($q, Access) {
                     var deferred = $q.defer();
                     if (!Access.isAuthenticated()) {
                         deferred.reject();
                     }
                     else {
                         deferred.resolve();
                     }

                     return deferred.promise;
                 }]
           }

    })

    $locationProvider.html5Mode(false);
  });

  app.factory("Access",function(){
    var vm = this;

    vm.user =undefined;

    var Access = {

        user : function(user){
          vm.user = user;
        },

        isAuthenticated : function(){
          var val = (vm.user == null || vm.user == undefined)? false: true;
        //  console.log(vm.user);
          return val;
        }
    };

    return Access;
  });




  app.run(function ($state,LoginDataOp,Access) {

     // Perform logical user logging
     // Check by making a call to server.
     LoginDataOp.currentUser().then(function(response){
       if(response.data.user_id != null){
         Access.user(response.data);
         $state.go('home');
       }else{
         $state.go('login');
       }
     }).catch(function(error) {
       console.log(error);
     });

   });


  //directive for pressing enter
  app.directive('ngEnter', function () {
      return function (scope, element, attrs) {
          element.bind("keydown keypress", function (event) {
              if(event.which === 13) {
                  scope.$apply(function (){
                      scope.$eval(attrs.ngEnter);
                  });

                  event.preventDefault();
              }
          });
      };
  });

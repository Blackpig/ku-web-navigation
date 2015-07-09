var app = angular.module('kuwnApp', ['ui.router', 'mm.foundation'])

/*** CONFIGURATION & ROUTING ***/
/* Set our routing and templates */
	.config(
		['$locationProvider',
		'$urlRouterProvider', 
		'$stateProvider',

		function($locationProvider, $urlRouterProvider, $stateProvider) {
			
			/*Enable HTML5 mode */
			$locationProvider.html5Mode(true);

			$urlRouterProvider.otherwise('/');

			$stateProvider

					// Root state - abstract state to load user and then set the state
					.state('root', {
						url: '/',

						resolve: {

					      	user: ['$rootScope', '$state', 'userSvc', 
						      	function($rootScope, $state, userSvc) {
						      		return userSvc.getCurrent().then(
						      			function(response){
						      				return response.data.data;
						      			},
						      			function(response){
						      				var _error = {
											  	'status': response.status,
											  	'statusText': response.statusText,
											  	'messageText': response.data.message
											};

											$rootScope.error = _error;
											$state.go('error');
						      			}
						      		);
						      	}
					      	]
						},

						views: {
							'content@': {
								controller: 'rootCtrl'
							}
						}
					})

					.state('root.staff', {
						url: '0/:tileid',

					    params: {
					     	tileid: { value:null, squash:true }
					    },

						views: {
							'content@': {
								templateUrl: '/assets/js/app/views/wall.html',
								controller: 'stateCtrl as ctrl'
							}
						}
					})

					.state('root.student', {
						url: '1/:tileid',

					    params: {
					     	tileid: { value:null, squash:true }
					    },

						views: {
							'content@': {
								templateUrl: '/assets/js/app/views/wall.html',
								controller: 'stateCtrl as ctrl'
							}
						}
						
					})

					.state('root.search', {
						url: 'search/:term',

					    params: {
					     	terms: { value:null, squash:true }
					    },

						views: {
							'content@': {
								templateUrl: '/assets/js/app/views/search.html',
								controller: 'searchCtrl as ctrl'
							}
						}
						
					})

					.state('root.my-status', {
						url: 'my-status',

					    params: {
					     	tileid: { value:null, squash:true }
					    },

						views: {
							'content@': {
								templateUrl: '/assets/js/app/views/my-status.html',
								controller: 'profileCtrl as ctrl'
							}
						}
						
					})

					.state('error', {
						url: 'error',
					    views: {
							'content@': {
								templateUrl: '/assets/js/app/views/error.html',
								controller: 'errorCtrl as ctrl'
							}
						}
						
					})
	}]);

/*** CONTROLLERS ***/

/* Root Controller - used to pre-fetch User details and direct to correct portal */

app.controller('rootCtrl', ['$rootScope', '$scope', '$state', 'user', 'navbarSvc',
	function ($rootScope, $scope, $state, user, navbar) {

		var _state = 'root.' + user.employee_status;
		$state.go(_state);
	
}]);

/* State controller - used to build Wall tiles **/
app.controller('stateCtrl', ['$rootScope','$scope', '$stateParams', '$state', 'user', 'navbarSvc', 'endpointsSvc',
	function ($rootScope, $scope, $stateParams, $state, user, navbarSvc, endpointsSvc) {

	// Students can't access the staff portal - redirect to student state if they try
	if ( $state.is('root.staff') && user.employee_type == 1 ) {
		$state.go('root.student');
	}

	self = this;

	self.tileid = $stateParams.tileid;
	
	self.navbar = {};
	self.data = {};
	self.depth = 0;
	self.isrootpage = (self.tileid) ? false : true;
	self.showback = false;
	self.user = user;

	self.build = function()	{

		navbarSvc.reset();

		endpointsSvc.getEndpoints($state.current.name, self.tileid).then( 
			function(response) { 
				self.data = response.data.data;
				self.depth = self.data.parents.length;
				self.showback = (self.depth > 1) ? true : false;

				navbarSvc.build(user.employee_type, $state.current.name, self.data.this, self.data.parents);

				self.navbar = navbarSvc.navbar;

			},
			function(response) {
			  var _error = {
			  	'status': response.status,
			  	'statusText': response.statusText,
			  	'messageText': response.data.message
			  }

			  $rootScope.error = _error;
			  $state.go('error');
			}			
		);	
	};

	self.toggleInfo = function(toggleInfo){
		$scope.toggleInfo = (!$scope.toggleInfo) ? toggleInfo : null;
	}

	self.setFocus = function(hasFocus){
		$scope.hasFocus = (!$scope.hasFocus) ? hasFocus : null;
	}

	self.search = function() {
		var term = $('#search_term').val();
		$state.go('root.search', {'term': term});
	}

	self.build();
	
}]);

/* State controller - used to build Wall tiles **/
app.controller('searchCtrl', ['$rootScope','$scope', '$stateParams', '$state', 'user', 'navbarSvc', 'endpointsSvc',
	function ($rootScope, $scope, $stateParams, $state, user, navbarSvc, endpointsSvc) {

	self = this;

	self.term = $stateParams.term;
	
	self.navbar = {};
	self.data = {};
	self.depth = 0;
	self.has_term = (self.term) ? true : false;
	self.showback = false;
	self.user = user;


	self.build = function()	{

		navbarSvc.reset();

		endpointsSvc.getEndpoints('root.search', self.term).then( 
			function(response) { 
				self.data = response.data.data;

				navbarSvc.search(user.employee_type, self.term, self.data.endpoints.length);
				self.navbar = navbarSvc.navbar;

			},
			function(response) {
			  var _error = {
			  	'status': response.status,
			  	'statusText': response.statusText,
			  	'messageText': response.data.message
			  }

			  $rootScope.error = _error;
			  $state.go('error');
			}			
		);	
	};

	self.toggleInfo = function(toggleInfo){
		$scope.toggleInfo = (!$scope.toggleInfo) ? toggleInfo : null;
	}

	self.setFocus = function(hasFocus){
		$scope.hasFocus = (!$scope.hasFocus) ? hasFocus : null;
	}

	self.search = function() {
		var term = $('#search_term').val();
		$state.go('root.search', {'term': term});
	}

	self.build();
	
}]);

/* Profile controller - used for MyStatus pages and states */
app.controller('profileCtrl', ['$scope', '$state', 'user',
	function ($scope, $state, user) {
	
}]);

/* Profile controller - used for MyStatus pages and states */
app.controller('errorCtrl', ['$rootScope', '$scope',
	function ($rootScope, $scope) {

		self = this;
		self.error = $rootScope.error;
}]);


/*** SERVICES ***/

/* User Service - loads user details on page load */

app.factory('userSvc',['$http','$q',function($http, $q){

	var service = {

			user: {},

            getCurrent : function(){
             	return $http.get('/api/users/authenticate');
            }
        };

    return service;

}]) 

/* Endpoint Service - retrieves Endpoints via API calls */

app.factory('endpointsSvc',['$http','$q',function($http,$q){

	var service = {

			endpoints:{},

			getEndpoints: function(type, tileid){

				var route = (type == 'root.staff') ? 0 : 1;

				if (type == 'root.search') {
					return $http.get('/api/search/' + tileid);
				} else if (tileid) {
						return $http.get('/api/endpoints/' + route + '/' + tileid);
					} else if (type == 'root.staff') {
						return $http.get('/api/organisations');
					} else {
						return $http.get('/api/channels');
					}
				}
			};

    return service;

    }]) 

/* NavBar Service - Build and manage the NavBar */
app.factory('navbarSvc',[function(){

	var service = {

			"navbar": {
				"home": {},
				"switchTo": "",
				"breadcrumbs": [],
				"canSwitch": false,
				"currentLabel": "",
				"backLink": ""
			},			

			reset: function(userType, currentState) {

				this.navbar.home = {};
				this.navbar.switchTo = "";
				this.navbar.breadcrumbs = [];
				this.navbar.canSwitch = false;
				this.navbar.currentLabel = "";
				this.navbar.backLink = "";
			},

			build: function(userType, currentState, current, parents) {

				for(var i=0, len=parents.length; i < len; i++){
					if (parents[i].guid !== null && parents[i].label !== null) {
						this.addCrumb(parents[i]);
						this.navbar.backLink = parents[i].guid;
					}
				}

				this.addCrumb(current);
				this.navbar.currentLabel = current.label;
				this.setHome(userType, currentState);
				this.setSwitchTo(userType, currentState);

			},

			search: function(userType, term, count) {
				
				this.navbar.currentLabel = 'Search for: ' + term + ' returned ' + count + ' results';
				
				if ( userType == 0 ) {
					this.navbar.home = {"label": "University Organisations", "link":"0"};
				} else {
					this.navbar.home = {"label": "Home", "link":"1"};
				}
			},

			setHome: function(userType, currentState){

				var label;
				var link;

				if (userType == 0) {
					label = (currentState == 'root.staff') ? "University Organisations" : "Student Channels";
					link = (currentState == 'root.staff') ? "0" : "1";
				} else {
					label = "Home";
					link = "1";
				}
            	
            	this.navbar.home = {"label": label, "link":link};
            	this.navbar.breadcrumbs[0] = this.navbar.home;
        		
        		return this.navbar.home;
            },

            setSwitchTo: function(userType, currentState){
            	if (userType == 0) {
            		this.navbar.canSwitch = true;
            		this.navbar.switchTo = (currentState == 'root.student') ? '0' : '1';
            	}

        		return this.navbar.switchTo;
            },

            addCrumb: function(crumb){

            	this.navbar.breadcrumbs.push(crumb);
        		return this.navbar.breadcrumbs;
            }
        };

    return service;

    }]) 


/*** DIRECTIVES ***/

/* Tile Image - create a tile image */
app.directive('imageTile',[
	function(){
		return {
			restrict: 'AE',
			template: '<div class="tile image {{imageSize}} pack"><img src="../assets/images/img-{{imageSize}}-{{id}}.jpg" /></div>',
			replace: true,
			scope: {},
			link: function(scope, element, attrs) {
				
				scope.element = element;
				
				var sizes = ['tall', 'wide', 'square'];
				
				if (attrs.size == undefined || attrs.size=='') {
					var idx = Math.floor(Math.random()*3);
					scope.imageSize = sizes[idx];
				} else {
					scope.imageSize = attrs.size;
				}

				if (attrs.id == undefined || attrs.id == '' || attrs.id > 8 || attrs.id == 0) {
					scope.id = Math.floor((Math.random()*8)+1);
				} else {
					scope.id = attrs.id;
				}
			}
		}
}])

/* Packery - adds the Packery library to the page */
app.directive('packery', ['$rootScope', '$timeout',
	function($rootScope, $timeout) {
		return {
			restrict: 'AE',
			scope: true,
			link: function(scope, element, attrs) {
			    scope.element = element;
			    if (!$rootScope.packery) {
			    	$rootScope.packery = new Packery(element[0].parentElement, {
			    		itemSelector: '.pack',
			    		stamp: '.stamp',
			    		animate: true,
          				animationOptions: {
            				duration: 100,
            				queue: true
          				}
			    	});


		    	var orderItems = function() {
		    		var itemElems = $rootScope.packery.getItemElements();
		    		$('#wall').removeClass('hide');
		    	};

		    	$rootScope.packery.on('layoutComplete', orderItems);


			    } else {
			     
			      $timeout(function() {
			      	$rootScope.packery.appended(element[0]);
			      });

			  }
			  $timeout(function() {
			  	$rootScope.packery.layout();
			  });

	    // watch for destroying an item
	    scope.$on('$destroy', function() {
	    	if($rootScope.packery && $rootScope.packery.remove) {
		    	$rootScope.packery.remove(scope.element[0]);
		    	scope.packery.layout();
		    	$rootScope.packery = null; 
		    }
	    });
	}
	};

}
]);

// jQuery to set ie class for IE >= 10 as conditional commenst no longer supported

$(document).ready(function(){
	if ($.browser.msie) {
		$("html").addClass("ie");
	}
});

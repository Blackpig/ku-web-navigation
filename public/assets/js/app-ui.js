var app = angular.module('kuwnApp', ['ui.router', 'mm.foundation', 'piwik'])

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

					.state('root.my-accounts', {
						url: 'my-accounts',

					    params: {
					     	tileid: { value:null, squash:true }
					    },

						views: {
							'content@': {
								templateUrl: '/assets/js/app/views/my-accounts.html',
								controller: 'profileCtrl as ctrl'
							}
						}
						
					})

					.state('root.my-tickets', {
						url: 'my-accounts/my-tickets',

					    params: {
					     	tileid: { value:null, squash:true }
					    },

						views: {
							'content@': {
								templateUrl: '/assets/js/app/views/partials/my-accounts/my-tickets.html',
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
app.controller('stateCtrl', ['$rootScope','$scope', '$stateParams', '$state', 'user', 'navbarSvc', 'endpointsSvc', 'analyticSvc',
	function ($rootScope, $scope, $stateParams, $state, user, navbarSvc, endpointsSvc, analyticSvc) {

	// Students can't access the staff portal - redirect to student state if they try
	if ( $state.is('root.staff') && user.employee_type == 1 ) {
		analyticSvc.trackEvent('Illegal Action', 'Direct Entry', 'Student Attempting to access Staff Portal');
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
	self.track =

	self.build = function()	{

		navbarSvc.reset();

		endpointsSvc.getEndpoints($state.current.name, self.tileid).then( 
			function(response) { 
				self.data = response.data.data;
				self.depth = self.data.parents.length;
				self.showback = (self.depth > 1) ? true : false;

				navbarSvc.build(user.employee_type, $state.current.name, self.data.this, self.data.parents);

				self.navbar = navbarSvc.navbar;
				analyticSvc.trackPageView(self.user, self.navbar.currentLabel);

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

		/* if we are using ie9 or worse then we can't use CSS 3d tansformations and just show hide the panels*/
		if ( $('html').hasClass('no-csstransforms3d')) {
				
				$('.tile-back').hide();
				$('.tile-front').show();
				if ($scope.toggleInfo == toggleInfo) {
					$('#front-'+toggleInfo).show();
					$('#back-'+toggleInfo).hide();
				} else {
					$('#front-'+toggleInfo).hide();
					$('#back-'+toggleInfo).show();
				}
			}

		$scope.toggleInfo = (!$scope.toggleInfo || $scope.toggleInfo !== toggleInfo) ? toggleInfo : null;
	}

	self.setFocus = function(hasFocus){
		$scope.hasFocus = (!$scope.hasFocus) ? hasFocus : null;
	}

	self.search = function() {
		var term = $('#search_term').val();
		$state.go('root.search', {'term': term});
	}

	self.switch = function(i) {
		$('body').css('background', 'url(../assets/images/bg-page-' + i + '.jpg');
	}

	self.trackEvent = function(tile_name, action, tile_type){
		analyticSvc.trackEvent(tile_name, action, tile_type);
	}
	self.build();
	
}]);

/* State controller - used to build Wall tiles **/
app.controller('searchCtrl', ['$rootScope','$scope', '$stateParams', '$state', 'user', 'navbarSvc', 'endpointsSvc', 'analyticSvc',
	function ($rootScope, $scope, $stateParams, $state, user, navbarSvc, endpointsSvc, analyticSvc) {

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

				analyticSvc.trackSiteSearch(self.term, 'Endpoints', self.data.endpoints.length);

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

		/* if we are using ie9 or worse then we can't use CSS 3d tansformations and just show hide the panels*/
		if ( $('html').hasClass('no-csstransforms3d')) {
				
				$('.tile-back').hide();
				$('.tile-front').show();
				if ($scope.toggleInfo == toggleInfo) {
					$('#front-'+toggleInfo).show();
					$('#back-'+toggleInfo).hide();
				} else {
					$('#front-'+toggleInfo).hide();
					$('#back-'+toggleInfo).show();
				}
			}

		$scope.toggleInfo = (!$scope.toggleInfo || $scope.toggleInfo !== toggleInfo) ? toggleInfo : null;
	}

	self.setFocus = function(hasFocus){
		$scope.hasFocus = (!$scope.hasFocus) ? hasFocus : null;
	}

	self.search = function() {
		var term = $('#search_term').val();
		$state.go('root.search', {'term': term});
	}

	self.trackEvent = function(tile_name, action, tile_type){
		analyticSvc.trackEvent(tile_name, action, tile_type);
	}

	self.build();
	
}]);

/* Profile controller - used for My Accounts pages and states */
app.controller('profileCtrl', ['$rootScope', '$scope', '$state', 'user', 'navbarSvc', 'accountsSvc', 'analyticSvc',
	function ($rootScope, $scope, $state, user, navbarSvc, accountsSvc, analyticSvc) {

		self = this;
		self.user = user;
		var parents = [];
		var current = []

		if ($state.current.name !== 'root.my-accounts') {
			parents['guid'] = null;
			parents['link'] = null;
		}
		navbarSvc.build(user.employee_type, $state.current.name, current, parents);

		self.navbar = navbarSvc.navbar;

		analyticSvc.trackPageView(self.user, self.navbar.currentLabel);

		accountsSvc.getData($state.current.name).then( 
			function(response) { 
				self.data = response.data.data;
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
		});		

		self.toggleInfo = function(toggleInfo){

			/* if we are using ie9 or worse then we can't use CSS 3d tansformations and just show hide the panels*/
		if ( $('html').hasClass('no-csstransforms3d')) {
				
				$('.tile-back').hide();
				$('.tile-front').show();
				if ($scope.toggleInfo == toggleInfo) {
					$('#front-'+toggleInfo).show();
					$('#back-'+toggleInfo).hide();
				} else {
					$('#front-'+toggleInfo).hide();
					$('#back-'+toggleInfo).show();
				}
			}

			$scope.toggleInfo = (!$scope.toggleInfo || $scope.toggleInfo !== toggleInfo) ? toggleInfo : null;
		}

		self.trackEvent = function(tile_name, action, tile_type){
			analyticSvc.trackEvent(tile_name, action, tile_type);
		}
	
}]);

/* Search Modal controller - used on small devices to open close the search modal*/
app.controller('SearchModalCtrl', function ($scope, $modal) {

 	$scope.open = function () {

	    var modalInstance = $modal.open({
	      templateUrl: '/assets/js/app/views/partials/searchModal.html',
	      controller: 'searchInstanceCtrl as srchCtrl'
	    });
	}
});

/* Search Modal Instance controller - used on small devices to submit the form*/
app.controller('searchInstanceCtrl', function ($state, $scope, $modalInstance) {

	$scope.search = function() {
;
		var term = $('#modal_search_term').val();
		$modalInstance.close();
		$state.go('root.search', {'term': term});
	}

	$scope.cancel = function () {
		$modalInstance.dismiss('cancel');
	};
});



/* Error controller - used for disp[laying error page and messages */
app.controller('errorCtrl', ['$rootScope', '$scope',
	function ($rootScope, $scope) {

		self = this;
		self.error = $rootScope.error;

		/*if (self.error.status == 401) {
			window.location.replace('https://login01.kingston.ac.uk/nidp/idff/sso');
			return false
		}*/
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

/* Accounts Service - retrieves summary data for deifferent Accounts via API calls */
app.factory('accountsSvc',['$http','$q',function($http,$q){

	var service = {

			accounts:{},

			getData: function(route){

				if (route == 'root.my-tickets') {
					return $http.get('/api/my-tickets/');
				} else {
					deferred = $q.defer();
                	deferred.resolve({"data":[]});
                	return deferred.promise;
				}

			}
		}

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

				if (currentState == 'root.staff' || currentState == 'root.student') {
					if (userType == 0) {
						label = (currentState == 'root.staff') ? "University Organisations" : "Student Channels";
						link = (currentState == 'root.staff') ? "0" : "1";
					} else {
						label = "Home";
						link = "1";
					}
				} else {
					label = "My Accounts";
					link = "my-accounts";
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

/* Analytic Service - executes Piwik analytics calls */
app.factory('analyticSvc',['Piwik',function(piwik){

	var service = {

			trackPageView: function(user, title){

				var dept = user.department_code;

				piwik.setUserId(user.id);
				piwik.setCustomVariable( 1, 'Vistor type', user.employee_class, 'visit' );
				piwik.setCustomVariable( 2, 'Organisation Code', dept.substring(0,4), 'visit' );
				piwik.setCustomVariable( 3, 'Department Code', user.department_code, 'visit' );
				piwik.setCustomVariable( 4, 'Organisation name', user.department, 'visit' );
				piwik.setDocumentTitle(title);
				piwik.trackPageView();
			},

			trackEvent: function(tile_name, action, tile_type) {
				piwik.trackEvent(tile_name, action, tile_type);
			},

			trackSiteSearch: function(term, type, count){
				piwik.trackSiteSearch(term, type, count);
			}
        };

    return service;

}]) 

/*** DIRECTIVES ***/

/* Packery - adds the Packery library to the page */
app.directive('packery', ['$rootScope', '$timeout',
	function($rootScope, $timeout) {
		return {
			restrict: 'AE',
			scope: true,
			link: function(scope, element, attrs) {
			    scope.element = element;
			    if (!$rootScope.packery) {
			    	$('#mask').show();
			    	$rootScope.packery = new Packery(element[0].parentElement, {
			    		itemSelector: '.pack',
			    		stamp: '.stamp',
			    		columnWidth: 140,
			    		gutter: 10		    		
			    	});


		    	var orderItems = function() {
		    		var itemElems = $rootScope.packery.getItemElements();
		    		$timeout(clearMask, 1000 );
		    	};

		    	var clearMask = function(){
		    		if ( $('html').hasClass('no-csstransforms3d')) {
							$('.tile-back').hide();
						}
					document.body.scrollTop = document.documentElement.scrollTop = 0;
		    		$('#mask').fadeOut();
		    	}

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

// jQuery - additional event capture

$(document).ready(function(){
	/* Check for ie and add a class if detected */
	if (typeof document.body.style.msTransform == "string") {
		$("body").addClass("ie");
	} 

});

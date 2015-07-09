/* For Layout admin we do not have User dependency to be loaded first so we can use started angular routing instead
/* ui-router used in the front-end
*/

var app = angular.module('kuwnApp', ['ngRoute', 'mm.foundation'])

/*** CONFIGURATION & ROUTING ***/
/* Set our routing and templates */
	.config(
		['$routeProvider', '$locationProvider',

		function($routeProvider, $locationProvider) {
			
			/*Enable HTML5 mode */
			$locationProvider.html5Mode(true);

			$routeProvider

					.when('/layout/:service_group', {
						templateUrl: '/assets/js/app/views/layout.html',
						controller: 'layoutCtrl as ctrl'
					})

					.when('/error', {
						templateUrl: '/assets/js/app/views/error.html',
						controller: 'errorCtrl as ctrl'
					})
	}]);

/*** CONTROLLERS ***/


/* Layout controller - used to build Wall tiles **/
app.controller('layoutCtrl', ['$rootScope','$scope', '$routeParams', 'layoutSvc',
	function ($rootScope, $scope, $routeParams, layoutSvc) {

	self = this;

	self.service_group = $routeParams.service_group;
	
	self.data = {};

	self.build = function()	{


		layoutSvc.getLayout(self.service_group).then( 
			function(response) { 
				self.data = response.data.data;

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


	self.build();
	
}]);



/* Profile controller - used for MyStatus pages and states */
app.controller('errorCtrl', ['$rootScope', '$scope',
	function ($rootScope, $scope) {

		self = this;
		self.error = $rootScope.error;
}]);


/*** SERVICES ***/

/* Endpoint Service - retrieves Endpoints via API calls */

app.factory('layoutSvc',['$http','$q',function($http,$q){

	var layoutSvc = {

			getLayout: function(service_group){
				return $http.get('/api/layout/' + service_group);
			},

			setLayout: function(service_group, data){
				return $http.post('/api/layout/' + service_group, data);
			}

    	};

     return layoutSvc;

	}
]) 



/*** DIRECTIVES ***/

/* Packery - adds the Packery library with drag/drop ability for Admin pages */
app.directive('packery', ['$rootScope', '$timeout',
	function($rootScope, $timeout) {
		return {
			restrict: 'AE',
			scope: true,
			link: function(scope, element, attrs) {
			    scope.element = element;
			    if (!$rootScope.packery) {
			    	$rootScope.packery = new Packery(element[0].parentElement, {
			    		itemSelector: '.tile',
			    		stamp: '.stamp',
			    		animate: true,
          				animationOptions: {
            				duration: 100,
            				queue: true
          				}
			    	});

		    	var draggable1 = new Draggabilly(element[0]);
		    	$rootScope.packery.bindDraggabillyEvents(draggable1);

		    	var orderItems = function() {
		    		var itemElems = $rootScope.packery.getItemElements();
		    	};

		    	$rootScope.packery.on('layoutComplete', orderItems);
		    	$rootScope.packery.on('dragItemPositioned', orderItems);


			    } else {
			     
			      $timeout(function() {
			      	$rootScope.packery.appended(element[0]);
			      });
			      var draggable2 = new Draggabilly(element[0], {handle: '.handle'} );
			      $rootScope.packery.bindDraggabillyEvents(draggable2);


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

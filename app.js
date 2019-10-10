var CIAPP = angular.module('CIAPP', ['ui.router']);

CIAPP.config(function($urlRouterProvider, $stateProvider, $locationProvider) {
	//$locationProvider.hashPrefix();
	
	$urlRouterProvider.otherwise("/404");
	
	// use the HTML5 History API
	$locationProvider.html5Mode(true);
    
	// $stateProvider.state(ci_main.states[0]);
	// console.log(ci_main.states[0]);

	angular.forEach(ci_main.states, function (ciState) {
		console.log(ciState);
		$stateProvider.state(ciState);
	});
	
});

CIAPP.filter('reverse',[function(){
    return function(string){
        return string.split('').reverse().join('');
    };
}]);
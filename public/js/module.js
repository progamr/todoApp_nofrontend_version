(function () {
    var module = angular.module('todoApp', [
        'ui.router',
    ]);

    module.config(function ($stateProvider, $urlRouterProvider) {

        $stateProvider
            .state('home', {url : '/', templateUrl : 'templates/index.html'})
            .state('createItem', {url : '/todos/create', templateUrl : 'templates/create.html'})
            .state('todo', {url : '/todos/:id', templateUrl : 'templates/item.html'})
            .state('editItem', {url : '/todos/:id/edit', templateUrl : 'templates/item-edit.html'})

        $urlRouterProvider.otherwise('/');

    });
}());
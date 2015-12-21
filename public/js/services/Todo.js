(function (module) {

    var Todo = function () {

        return {
            id : null,
            title :'',
            body :''
        };

    };

    module.factory('Todo', Todo);

}(angular.module('todoApp')));
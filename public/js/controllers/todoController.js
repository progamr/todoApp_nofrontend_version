(function (module) {

    var todoController = function (Todo, $http, $stateParams) {

        var model = this;

        model.todo = Todo;
        // UI related
        model.errors = {};
        model.addedSuccessfully = false;
        model.failedAdd = false;
        model.updatedSuccessfully = false;
        model.failedUpdate = false;
        model.failedLoad = false;
        model.notFound = false;


        /**
         * edit todo
         * @param Todo object
         */
        model.editTodo = function (todo) {
            console.log(todo);
            $http.post('todoApp/api/editTodo', todo)
                .then(
                    function (response) {
                        // todo Not Found
                        if(response.data.flag == -1){
                            model.updatedSuccessfully = false;
                            model.failedUpdate = true;
                            model.errors = response.data.errors;
                        }
                        // failed to update for some reason
                        else if(response.data.flag == 0){
                            model.updatedSuccessfully = false;
                            model.failedUpdate = true;
                            model.errors = response.data.errors;
                        }
                        else{
                            model.failedUpdate = false;
                            model.updatedSuccessfully = true;
                            model.todo.title = '';
                            model.todo.body = '';
                        }
                    },
                    function (errors) {
                        model.failedUpdate = true;
                    });
        };

        /**
         * get Todo by id
         */
        model.getTodo = function () {
            $http.get('todoApp/api/todo/' + $stateParams.id)
                .then(
                    function (response) {
                        if(response.data.flag == -1){
                            model.notFound = true;
                        }
                        else
                        model.todo = response.data;

                    },
                    function (response) {
                        model.failedLoad = true;
                    });
        };

        model.getTodo();
    };

    module.controller('todoController', todoController);
}(angular.module('todoApp')));
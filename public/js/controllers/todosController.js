(function (module) {

    var todosController = function (Todo, $http) {

        var model = this;

        model.todo = Todo;
        model.todos = [];
        // ui related
        model.failedLoad = false;
        model.notFound = false;
        model.updatedSuccessfully = false;
        model.failedUpdate = false;
        model.addedSuccessfully = false;
        model.failedAdd = false;
        model.failedDelete = false;
        model.deletedSucceffully = false;
        model.errors = {};
        /**
         * get list of Todos
         */
        model.getTodos = function () {
            $http.get('todoApp/api/todos')
                .then(
                    function (response) {
                        model.todos = response.data;
                    },
                    function (errors) {
                        model.failedLoad = true;
                    });
        };

        /**
         * add todo
         * @param Todo object
         */
        model.addTodo = function (todo) {
            $http.post('todoApp/api/addTodo', todo)
                .then(
                    function (response) {
                        if(response.data.flag == 0){
                            model.addedSuccessfully = false;
                            model.failedAdd = true;
                            model.errors = response.data.errors;
                        }
                        else{
                            model.failedAdd = false;
                            model.addedSuccessfully = true;
                            model.todo.title = '';
                            model.todo.body = '';
                        }
                        console.log(response);
                    },
                    function (errors) {
                        model.failedAdd = true;
                    });
        };

        /**
         * delete todo by id
         * @param int id
         */
        model.deleteTodo = function(id, index) {
            console.log(id);
            console.log(index);
            $http.get('todoApp/api/deleteTodo/' + id)
                .then(
                    function (response) {
                        model.failedDelete = false;
                        model.deletedSucceffully = true;
                        model.todos.splice(index, 1);
                    },
                    function (errors) {
                        model.failedDelete = true;
                    });
        }

        model.getTodos();

    };

    module.controller('todosController', todosController);
}(angular.module('todoApp')));
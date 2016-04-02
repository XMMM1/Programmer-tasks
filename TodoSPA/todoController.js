angular.module('todoApp')
    .controller('TodoListController', function ($scope, todoStorage) {
        $scope.todoList = this;
        //var store = todoStorage.store;
        //$scope.showData = function () {
        //.success(function (data) {
        //console.log(todoStorage.get());
        //});
        $scope.curPage = 0;
        $scope.pageSize = 3;
        $scope.numOfPage = 1;
        $scope.todoList.todos = [];
        todoStorage.get().then(function (data) {
            $scope.todoList.todos = data;
            console.log(data);
        });

        $scope.numberOfPages = function () {
            $scope.numOfPage = Math.ceil($scope.todoList.todos.length / $scope.pageSize);
            return Math.ceil($scope.todoList.todos.length / $scope.pageSize);
        };

        $scope.todoList.addTodo = function () {
            //console.log($scope.todoList);
            if ($scope.todoList.description.length > 0 && $scope.todoList.description.length < 255) {
                //$scope.todoList.template.description = $scope.todoList.description;
                var date = new Date();
                var mySqlDate = date.getFullYear() + '-' + date.getMonth() + '-' + date.getDay() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
                $scope.todo = {
                    Todo: {
                        description: $scope.todoList.description,
                        status: false,
                        added: mySqlDate,
                        changed: mySqlDate,
                        user: 'admin'
                    }
                };
                $scope.todoList.todos.push($scope.todo);
                $scope.todoList.description = '';
                $scope.numOfPage = $scope.numberOfPages();
                todoStorage.insert($scope.todo);

            }
            else if ($scope.todoList.description.length > 255) {
                alert('Input string was too long: ' + $scope.todoList.description.length + '. Please insert valid string');
            } else if ($scope.todoList.description.length < 1) {
                alert('Input string was empty: ' + $scope.todoList.description.length + '. Please insert valid string');
            }
        }
        ;

        $scope.todoList.remaining = function () {
            var count = 0;
            angular.forEach($scope.todoList.todos, function (todo) {
                count += todo.status ? 0 : 1;
            });
            return count;
        };

        $scope.todoList.removeTodo = function ($index) {
            var td = $scope.todoList.todos[$index];
            todoStorage.delete(td).then(function (data) {
                console.log('delete', data);
            });
            //$scope.todoList.todos.splice($index, 1);
            console.log('remove todo: ' + td.id);
            //console.log('remove todo: ',$index);
        };
        $scope.todoList.clearAll = function ($index) {
            for (var todo in $scope.todoList.todo) {
                console.log('todo remove all: ', $scope.todoList.todo[todo].Todo);
                //$scope.todoList.removeTodo(todo.id);
            }
            $scope.todoList.todos = [];
            console.log('delete all');
            //console.log('remove todo: ',$index);
        };
        $scope.todoList.statusUpdate = function ($index) {
            var td = $scope.todoList.todos[$index];
            if (td.Todo.status == true) {
                alert('deaktiviran');
                td.Todo.status = false;
            } else {
                td.Todo.status = true;
                alert('aktiviran');
            }

            todoStorage.put(td);
            console.log('status update: ', td);
        };
        $scope.todoList.editTodo = function ($todo) {
            //var td = $scope.todoList.todos[$index];
            console.log('todo edit: ', $todo);
        };


    }
)
;
angular.module('todoApp').filter('pagination', function () {
    return function (input, start) {
        start = +start;
        return input.slice(start);
    };
});




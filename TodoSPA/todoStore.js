angular.module('todoApp')
    .factory('todoStorage', function ($http) {
        'use strict';
        var host = "http://murn.eu/razgovori/api/";
        var store = {
            todos: [],
            delete: function (todo) {
                var originalTodos = store.todos.slice(0);

                store.todos.splice(store.todos.indexOf(todo), 1);
                //console.log('todo to delte: ',todo.Todo);
                return $http.delete(host + 'delete/' + todo.Todo.id)
                    .then(function success() {
                        return store.todos;
                    }, function error() {
                        angular.copy(originalTodos, store.todos);
                        return originalTodos;
                    });
            },

            get: function () {
                return $http.get(host)
                    .then(function (resp) {
                        angular.copy(resp.data, store.todos);
                        console.log('get data ', resp.data);
                        return store.todos;
                    });
            },

            insert: function (todo) {
                console.log('inserting todo', todo);
                var originalTodos = store.todos.slice(0);

                return $http.post(host + 'add', todo)
                    .then(function success(resp) {
                        store.todos.push(todo);
                        console.log('insert ok', todo);
                        return store.todos;
                    }, function error() {
                        angular.copy(originalTodos, store.todos);
                        console.log('insert error', todo);
                        return store.todos;
                    });
            },

            put: function (todo) {
                var originalTodos = store.todos.slice(0);
                return $http.put(host + 'edit/' + todo.Todo.id, todo)
                    .then(function success() {
                        return store.todos;
                    }, function error() {
                        angular.copy(originalTodos, store.todos);
                        return originalTodos;
                    });
            }
        };
        return store;
    });

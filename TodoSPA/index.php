<!DOCTYPE html>
<html>
<head lang="en">
    <title>Todo Progmbh SPA App</title>
    <link type="text/css" rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../vendor/bootstrap-material/dist/css/material.min.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <!--    <script type="text/javascript" rel="javascript"-->
    <!--            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>-->
    <script type="text/javascript" rel="javascript" src="angular.js"></script>
    <script type="text/javascript" rel="javascript" src="angular-route.js"></script>
    <script type="text/javascript" rel="javascript" src="app.js"></script>
    <script type="text/javascript" rel="javascript" src="todoController.js"></script>
    <script type="text/javascript" rel="javascript" src="todoStore.js"></script>
</head>
<body ng-app="todoApp">
<div class="container" ng-controller="TodoListController as todoList">
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="well bs-component">
                <div class="">
                    <h1 class="text-center">Todos</h1>
                </div>
                <form ng-submit="todoList.addTodo()">
                    <input ng-model="todoList.description" name="name" id="name"
                           class="form-control input-lg text-center"
                           type="text"
                           placeholder="Type name of todo task." autofocus>
                </form>
                <div style="margin-top: 20px;">
                    <div>
                        <div
                            ng-repeat="todo in todoList.todos | filter:myFilter | pagination: curPage * pageSize | limitTo: pageSize">

                            <div class="well well-sm">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" ng-model="todo.Todo.status"
                                               ng-click="todoList.statusUpdate($index)">
                                        <span class="checkbox-material">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <label ng-dblclick="todoList.editTodo($index)">{{::todo.Todo.description}}</label>
                                    <span class="todo-{{::todo.status}}">{{::todo.Todo.description}}
                                        <sub>&nbsp;&nbsp;&nbsp;({{::todo.Todo.user}},
                                            {{::todo.Todo.added |date : 'mediumDate'}})</sub>
                                    </span>
                                    <button class="btn btn-default btn-flat pull-right"
                                            ng-click="todoList.removeTodo($index)" style="margin-top: -5px;">
                                        <i class="mdi-navigation-close"></i>

                                        <div class="ripple-wrapper"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <span>{{::todoList.remaining()}} od {{::todoList.todos.length}} unfinished</span>-->


                <form class="form-inline">
                    <div class="text-center">
                        <button class="btn btn-default btn-raised" ng-click="myFilter = {}">All</button>
                        <button class="btn btn-default btn-raised" ng-click="myFilter = {status: 'false'}">Unfinished
                        </button>
                        <button class="btn btn-default btn-raised" ng-click="myFilter = {status: 'true'}">Finished
                        </button>
                        <button class="btn btn-warning btn-raised" ng-click="todoList.clearAll()">Clear all</button>
                        <div class="pagination-div" ng-show="todoList.todos.length">
                            <button type="button" class="btn btn-primary" ng-disabled="curPage == 0"
                                    ng-click="curPage=curPage-1">PREV
                            </button>
                            <span>Page {{curPage + 1}} of {{numOfPage}}</span>
                            <button type="button" class="btn btn-primary"
                                    ng-disabled="curPage >= todoList.todos.length/pageSize - 1"
                                    ng-click="curPage = curPage+1">NEXT
                            </button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

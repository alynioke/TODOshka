'use strict';

/* Controllers */



var todoApp = angular.module('todoApp', ['boolvalFilter', 'xeditable', 'TaskService']);

todoApp
.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
})

.controller('TaskListCtrl', function($scope, Task) {

  //$scope.task = {};
  $scope.todays = {};

  //!! reuse that code how 
  Task.get()
    .success(function(data) {
      $scope.todays = data;
    })
    .error(function(data) {   //ang function
      console.log(data);
    });
  

  $scope.addTask = function() {
    // save the Task. pass in Task data from the form
    // use the function we created in our service
    Task
      .save($scope.task)        //our custom function
      .success(function(data) { //ang function
        // refresh the Task list
          Task.get()
            .success(function(taskData) {
              $scope.todays = taskData;
            })
            .error(function(taskData) {   //ang function
              console.log(taskData);
            });

      })
      .error(function(data) {   //ang function
        console.log(data);
      });

  };



  $scope.getElementById = function(id) {
    for (var i = $scope.todays.length - 1; i >= 0; i--) {
          if ($scope.todays[i]['id'] == id)
            return $scope.todays[i];
          //else ?? 
        };    
  };
  //$scope.pred = 'created_at';


//update FIELD, VALUE
  $scope.toggle = function (elem, attr) {
    elem[attr] = !elem[attr];
    Task.update(elem, attr)
      .success(function(updateData){
          Task.get()
            .success(function(taskData) {
              $scope.todays = taskData;
            })
            .error(function(taskData) {   //ang function
              console.log(taskData);
            });
      })
      .error(function(updateData){
      });
  }

  $scope.toggleDo = function(task) {
    task.done = !task.done;
  }




});

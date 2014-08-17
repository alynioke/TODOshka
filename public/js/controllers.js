'use strict';

/* Controllers */

var todoApp = angular.module('todoApp', ['boolvalFilter', 'xeditable', 'TaskService']);

todoApp
.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
})

.controller('TaskListCtrl', function($scope, Task) {

  $scope.todays = {};
  $scope.tomorrows = {};
  $scope.laters = {};

  var getTasks = function() {
    Task.get()
    .success(function(data) {
      $scope.todays = data['todays'];
      $scope.tomorrows = data['tomorrows'];
      $scope.laters = data['laters'];
    })
    .error(function(data) {   //ang function
      console.log(data);
    });
  }
  getTasks();
  

  $scope.addTask = function() {
    // save the Task. pass in Task data from the form
    // use the function we created in our service
    Task
      .save($scope.task)        //our custom function
      .success(function(data) { //ang function
        // refresh the Task list
          $(".taskInput").val('');
          getTasks();
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

  $scope.getTElementById = function(id) {
    for (var i = $scope.tomorrows.length - 1; i >= 0; i--) {
          if ($scope.tomorrows[i]['id'] == id)
            return $scope.tomorrows[i];
          //else ?? 
        };    
  };

  $scope.getLElementById = function(id) {
    for (var i = $scope.laters.length - 1; i >= 0; i--) {
          if ($scope.laters[i]['id'] == id)
            return $scope.laters[i];
          //else ?? 
        };    
  };


  $scope.toggle = function (elem, attr) {
    elem[attr] = !elem[attr];

    // special processing required if changing "later" ON if "t" is ON
    // and if T is ON and later changing to ON

    Task.update(elem, attr)
      .success(function(updateData){
          getTasks();
      })
      .error(function(updateData){
      });
  }
});

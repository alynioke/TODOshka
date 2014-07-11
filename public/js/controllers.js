'use strict';

/* Controllers */

var todoApp = angular.module('todoApp', []);

todoApp.controller('PhoneListCtrl', function($scope) {
  $scope.todays = [
    {
      'r': true,
      'b': true,
     'content': 'Сходить в магаз за вкусняшками и завтраков',
      't': false,
      'l': false
    },
    {
      'r': true,
      'b': false,
     'content': 'Написать друзьям на фб',
      't': false,
      'l': false
    },
    {
      'r': false,
      'b': true,
     'content': 'say thanks to Olivier',
      't': false,
      'l': false
    },
    {
      'r': false,
      'b': false,
     'content': 'Fast just got faster with Nexus S.',
      't': false,
      'l': false
    }
  ];
});

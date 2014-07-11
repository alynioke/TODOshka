angular.module('todoBoolFilter', []).filter('boolval', function() {
  return function(input) {
    return input ? 'TRUE' : 'FALSE';
  };
});
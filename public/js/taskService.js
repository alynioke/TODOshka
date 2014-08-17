angular.module('TaskService', [])
.factory('Task', function($http) {
	return {
		get : function() {
			return $http.get('/tasks');
		},
		save : function(contentD) {
			var parameters = {
			    content: contentD
			}
			return $http({
					method: 'POST',
					url: '/tasks',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					params: parameters
				});
		},
		update : function(elem, attr) {
			var parameters = {};
			parameters[attr] = elem[attr];
			return $http({
					method: 'PUT',
					url: '/tasks/'+elem['id'],
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					params: parameters
				});
		}
	}
});
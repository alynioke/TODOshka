angular.module('boolvalFilter', [])
.filter('active', function() {
  return function(input) {
    return input ? 'btn-info' : 'btn-default';
  };
})
.filter('ifUrgent', function() {
	return function(input) {
		return input ? 'urgent' : '';
	}
})
.filter('ifImportant', function() {
	return function(input) {
		return input ? 'important' : '';
	}
})
.filter('ifDone', function() {
	return function(input) {
		return input ? 'done' : '';
	}
})
.filter('taskNotDone', function() {
    return function(tasks){
        var notDone = [];    
        var Done = [];         
        for (var i=0; i<tasks.length; i++){
            if (tasks[i].done != true) {
                notDone.push(tasks[i]);
            } else {
                Done.push(tasks[i]);
            }
        }
        notDone.sort(function(a,b) { 
			var dateA = new Date(a.created_at);
			var dateB = new Date(b.created_at);
        	return (dateA < dateB); 
        } );
        return notDone.concat(Done);
    };
})
;


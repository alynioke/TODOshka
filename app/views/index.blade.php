<!doctype html>
<html lang="en" ng-app="todoApp">
<head>
	<meta charset="utf-8">
	<title>TODOshka</title>

	<script src="[[URL::asset('/js/angular.js')]]"></script>
	<script src="[[URL::asset('/js/xeditable.js')]]"></script>

	<script src="[[URL::asset('/js/controllers.js')]]"></script>
	<script src="[[URL::asset('/js/filters.js')]]"></script>
	<script src="[[URL::asset('/js/taskService.js')]]"></script>

	<link href="[[URL::asset('/css/index.css')]]" rel="stylesheet" />
	<link href="[[URL::asset('/css/xeditable.css')]]" rel="stylesheet" />
	<link href="[[URL::asset('/css/bootstrap.min.css')]]" rel="stylesheet" media="screen">
</head>


<body ng-controller="TaskListCtrl">
  <div class="container">
  		<div class="row row-margin">
  			<form ng-submit="addTask()">
				<div class="input-group">
					<input autofocus type="text" class="form-control input-lg" name="task" ng-model="task" placeholder="Do something awesome!">
					<span class="input-group-btn">
					  <button type="submit" class="btn btn-default btn-lg">Create</button>
					</span>
				</div>


			</form>	
  		</div>
  		{{test}}
		<h1 class="text-center">Today</h1>
		<div class="row row-margin" ng-repeat="t in todays | taskNotDone | orderBy:pred">
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.urgent | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'urgent')">R</div>
						<div class="col-md-5 col-md-offset-2 btn {{t.important | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'important')">B</div>
					</div>
                </div>
			</div>
			<div class="col-md-8 btn btn-info 
						{{t.urgent | ifUrgent}}
						{{t.important | ifImportant}}
						{{t.done | ifDone}}"
					data-ng-click="toggleDo(getElementById(t.id))"
				>
				<span editable-text="t.content" ng-click="$event.stopPropagation();" >
					{{t.content}}
				</span>
			</div>
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-6 optional btn {{t.tomorrow | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'tomorrow')">T</div>
						<div class="col-md-6 optional btn {{t.later | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'later')">?</div>
					</div>
                </div>
			</div>
		</div>

  </div>

</body>
</html>

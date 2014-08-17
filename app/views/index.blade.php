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
	<script src="[[URL::asset('/js/jquery-2.1.1.min.js')]]"></script>
	<script src="[[URL::asset('/js/bootstrap.min.js')]]"></script>
	<script src="[[URL::asset('/js/index.js')]]"></script>

	<link href="[[URL::asset('/css/xeditable.css')]]" rel="stylesheet" />
	<link href="[[URL::asset('/css/bootstrap.min.css')]]" rel="stylesheet" media="screen">
	<link href="[[URL::asset('/css/index.css')]]" rel="stylesheet" />
	
</head>


<body ng-controller="TaskListCtrl">



	<!-- Modal for HELP-->
	<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="helpModalLabel">Help</h4>
				</div>
				<div class="modal-body">
					Lorem help ipsum dolor sit amet, consectetur adipisicing elit. Odit earum fugiat dolor, facere temporibus molestias aspernatur sunt vero asperiores voluptate, eum quidem! Quas accusamus, id sequi et, cumque fugit enim!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for STATS-->
	<div class="modal fade" id="statsModal" tabindex="-1" role="dialog" aria-labelledby="statsModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="statsModalLabel">Statistics</h4>
				</div>
				<div class="modal-body">
					Lorem stats ipsum dolor sit amet, consectetur adipisicing elit. Odit earum fugiat dolor, facere temporibus molestias aspernatur sunt vero asperiores voluptate, eum quidem! Quas accusamus, id sequi et, cumque fugit enim!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>






	<div class="help" data-toggle="modal" data-target="#helpModal">
		<span class="glyphicon glyphicon-question-sign"></span>
	</div>
	<div class="addTask">
		<form ng-submit="addTask()" >
			<div class="input-group">
				<input autocomplete="off" autofocus type="text" class="form-control input-lg taskInput" name="task" ng-model="task">
				<span class="input-group-btn">
				  <button type="submit" class="btn btn-default btn-lg">Create</button>
				</span>
			</div>
		</form>	
	</div>
	<div class="stats" data-toggle="modal" data-target="#statsModal">
		<span class="glyphicon glyphicon-stats"></span>
	</div>




  	<div class="container">
		<h1 class="text-center">Today</h1>
		<div class="row row-margin" ng-repeat="t in todays | taskNotDone | orderBy:created_at">
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.urgent | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'urgent')">R</div>
						<div class="col-md-5 col-md-offset-2 col-md-offset-2 btn {{t.important | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'important')">B</div>
					</div>
                </div>
			</div>
			<div class="col-md-8 btn btn-info 
						{{t.urgent | ifUrgent}}
						{{t.important | ifImportant}}
						{{t.done | ifDone}}"
					data-ng-click="toggle(getElementById(t.id), 'done')"
				>
				<span editable-text="t.content" ng-click="$event.stopPropagation();" >
					{{t.content}}
				</span>
			</div>
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.tomorrow | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'tomorrow')">T</div>
						<div class="col-md-5 col-md-offset-2 btn {{t.later | active}}" 
							data-ng-click="toggle(getElementById(t.id), 'later')">?</div>
					</div>
                </div>
			</div>
		</div>




	<h1 class="text-center">Tomorrow</h1>
		<div class="row row-margin" ng-repeat="t in tomorrows | taskNotDone | orderBy:created_at">
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.urgent | active}}" 
							data-ng-click="toggle(getTElementById(t.id), 'urgent')">R</div>
						<div class="col-md-5 col-md-offset-2 col-md-offset-2 btn {{t.important | active}}" 
							data-ng-click="toggle(getTElementById(t.id), 'important')">B</div>
					</div>
                </div>
			</div>
			<div class="col-md-8 btn btn-info 
						{{t.urgent | ifUrgent}}
						{{t.important | ifImportant}}
						{{t.done | ifDone}}"
					data-ng-click="toggle(getTElementById(t.id), 'done')"
				>
				<span editable-text="t.content" ng-click="$event.stopPropagation();" >
					{{t.content}}
				</span>
			</div>
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.tomorrow | active}}" 
							data-ng-click="toggle(getTElementById(t.id), 'tomorrow')">T</div>
						<div class="col-md-5 col-md-offset-2 btn {{t.later | active}}" 
							data-ng-click="toggle(getTElementById(t.id), 'later')">?</div>
					</div>
                </div>
			</div>
		</div>




	<h1 class="text-center">Later</h1>
		<div class="row row-margin" ng-repeat="t in laters | taskNotDone | orderBy:created_at">
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.urgent | active}}" 
							data-ng-click="toggle(getLElementById(t.id), 'urgent')">R</div>
						<div class="col-md-5 col-md-offset-2 col-md-offset-2 btn {{t.important | active}}" 
							data-ng-click="toggle(getLElementById(t.id), 'important')">B</div>
					</div>
                </div>
			</div>
			<div class="col-md-8 btn btn-info 
						{{t.urgent | ifUrgent}}
						{{t.important | ifImportant}}
						{{t.done | ifDone}}"
					data-ng-click="toggle(getLElementById(t.id), 'urgent')"
				>
				<span editable-text="t.content" ng-click="$event.stopPropagation();" >
					{{t.content}}
				</span>
			</div>
			<div class="col-md-2 optional">
				<div class="container-fluid">
                    <div class="row">
						<div class="col-md-5 btn {{t.tomorrow | active}}" 
							data-ng-click="toggle(getLElementById(t.id), 'tomorrow')">T</div>
						<div class="col-md-5 col-md-offset-2 btn {{t.later | active}}" 
							data-ng-click="toggle(getLElementById(t.id), 'later')">?</div>
					</div>
                </div>
			</div>
		</div>




  </div>

</body>
</html>

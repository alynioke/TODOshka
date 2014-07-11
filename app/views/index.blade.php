<!doctype html>
<html lang="en" ng-app="todoApp">
<head>
	<meta charset="utf-8">
	<title>Google Phone Gallery</title>

	<script src="[[URL::asset('/js/angular.js')]]"></script>
	<script src="[[URL::asset('/js/controllers.js')]]"></script>
	<script src="[[URL::asset('/js/filters.js')]]"></script>

	<link href="[[URL::asset('/css/index.css')]]" rel="stylesheet" />
	<link href="[[URL::asset('/css/bootstrap.min.css')]]" rel="stylesheet" media="screen">
</head>
<body ng-controller="PhoneListCtrl">

  <div class="container">

	<h2>Today</h2>
		<div class="row row-margin" ng-repeat="t in todays">
			<div class="col-md-1 btn btn-danger">R - {{t.r | boolval}}</div>
			<div class="col-md-1 btn btn-info">B - {{t.b | boolval}}</div>
			<div class="col-md-8 btn btn-info">
				{{t.content}}
			</div>
			<div class="col-md-1 btn btn-info">T - {{t.t | boolval}}</div>
			<div class="col-md-1 btn btn-info">? - {{t.l | boolval}}</div>
		</div>
  </div>

</body>
</html>

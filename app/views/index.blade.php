<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{URL::asset('/index.css')}}" rel="stylesheet" />
</head>
<body>
	<h2>Add new</h2>
	{{Form::open(['route' => 'tasks.store'])}}
		{{Form::label('task', 'Task')}}
		{{Form::text('content')}}
		{{Form::submit('Save!')}}
	{{Form::close()}}


    <h2>Today</h2>
	@foreach($today as $t)
		<li @if($t->urgent) class="urgent" @endif 
			@if($t->important) class="important" @endif 
		>
			
			{{$t->content}}
		</li>
	@endforeach

	<h2>Tomorrow</h2>
	@foreach($tomorrow as $t)
		<li @if($t->urgent) class="urgent" @endif 
			@if($t->important) class="important" @endif >
			{{$t->content}}
		</li>
	@endforeach

	<h2>Later</h2>
	@foreach($later as $t)
		<li @if($t->urgent) class="urgent" @endif 
			@if($t->important) class="important" @endif >
			{{$t->content}}
		</li>
	@endforeach

</body>
</html>
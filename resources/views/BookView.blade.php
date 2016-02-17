<!DOCTYPE html>
<html lang="en">
<head>
	<title>Alexandria Book</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">
		body { background: #60B37D !important; }
	</style>
</head>

<body>
<br>
<div class="container">

	<div class="col-md-12">
		<div class="jumbotron">
			<h1>{{ $bookTitle }}</h1>
		</div>
	</div>
		
	
	@if($bookIds[0] != -1)
	<div class="col-md-8">
		<div class="jumbotron">
			{!! isset($table) ? $table : 'Error' !!}
		</div>	
	</div>
	
	<div class="col-md-4">
		<div class="well">
			{{ Form::open(array('action' => array('OutputController@Output'))) }}
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Template
				<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#">MLA</a></li>
				</ul>
			</div>
			<br>
			{{ Form::hidden('bookIds', $bookIds) }}
			{{ Form::submit('Get Citation', array('class'=>'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>
	@endif
</div>

</body>
</html>
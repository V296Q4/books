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
			<h1>Multiple test pageasdf</h1>
		</div>
	</div>
		
	<div class="col-md-4">
	
		<div class="well">
			{{ Form::open(array('action' => array('OutputController@Output'))) }}
			@foreach($bookIds as $bookId)
				{{ Form::hidden('bookIds[]', $bookId) }}
			@endforeach
			{{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>

</div>

</body>
</html>
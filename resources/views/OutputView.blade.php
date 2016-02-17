<!DOCTYPE html>
<html lang="en">
<head>
	<title>Alexandria Output</title>
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

	<div class="col-md-8">
		@if (isset($outputList))
		<div class="well">
			@foreach($outputList as $listItem)
				<p>{!! $listItem !!}</p>
			@endforeach
		</div>
		@endif
		
		@if (isset($returnUrl))
		<div class="well">
			<a href={{$returnUrl}} class="btn btn-default">Return</a>
		</div>
		@endif
	</div>

</div>

</body>
</html>
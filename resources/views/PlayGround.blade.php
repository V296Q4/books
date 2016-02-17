<!DOCTYPE html>
<html lang="en">
<head>
<!--This stuff in the header is mostly for bootstrap. It needs to be here, but no need to mess with it, other than the title.-->
  <title>Alexandria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<!--Overrides the Bootstrap stylesheet and sets the background color to a pleasant shade of pastel-ish green-->
<style type="text/css">
   body { background: #60B37D !important; }
</style>

<br>
<div class="container">
	<!--This uses Bootstrap's column grid system. There are 12 columns total in the container, and can be split between various elements using declarations such as "col-md-8" or "col-md-4" (respectively 8 and 4 columns)-->
	<div class="col-md-8">
		<div class="jumbotron">
			<!--In a jumbotron Bootstrap element, includes a header with a safely echoed $ClientIP variable from the PlaygroundController-->
			<!--Safe echoing tags echo a variable but don't execute any HTML, JScript, etc within them.-->
			<h1>Hello {{ $ClientIP }}!</h1>
		</div>
		<div class="well">
		<!--Open a form using the Laravel form Facade. When submitted, form calls the submit method of the PlaygroundController-->
			{!! Form::open(array('action' => array('PlaygroundController@submit'))) !!}
			<div class="col-md-10">
				<!--Open a text field form element, with name 'title'. Also, places it under Bootstrap form-control class, and includes placeholder text-->
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter a Book Title Here...']); !!}
			</div>
			<!--Create a form submission button, using the Bootstrap btn class-->
			{!! Form::submit('Submit', array('class'=>'btn btn-success')) !!}
			<!--Close the form segment-->
			{!! Form::close() !!}
		</div>
		<div class="well">
			<!--Unsafely echo the $table variable from the PlaygroundController. This means the table HTML code included in that variable is actually rendered as HTML, instead of as text. This produces a bootstrap table.-->
			<!--Unsafe echoing tags, echo a variable and render HTML, JScript, etc contained within the variable-->
			{!! $table !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="well well-lg">
				<!--For good measure, render an image in the column using Bootstrap's img-responsive class, which intelligently resizes image elements-->
				<img src="images/books.png" class="img-responsive center-block" alt="Alexandria">
		</div>
	</div>
</div>

</body>
</html>
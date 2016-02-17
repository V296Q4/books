@extends('Master')

@section('title')
	Alexandria - Add Attribute
@stop

@section('main_content')

	<div class="col-md-8">
		<div class="jumbotron">
			<h2>Add an Attribute</h2>
		</div>
	</div>

<div class="col-md-8">
	<div class="jumbotron">
	
	  <form action="addattr" method="POST" style="margin-top: 20%" class="form-horizontal" role="form">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="lname">Label Name:</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="lname" name="lname" placeholder="label name" required>
			  </div>
			</div>

			<div class="form-group"> 
			  <div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
				  <label><input type="checkbox" name="editable" id="editable" value="yes" checked>Editable</label>
				</div>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="note">Note:</label>
			  <div class="col-sm-10"> 
				<textarea class="form-control" rows="5" id="note" name="note"></textarea>
			  </div>
			</div>
			
			<div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Add</button>
			  </div>
			</div>
		</form>
	</div>
</div>
@stop
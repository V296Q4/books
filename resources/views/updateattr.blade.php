@extends('Master')

@section('main_content')
	@if(isset($attr))
		@if($attr->editable)
			<form action="updateattr" method="POST" style="margin-top: 20%" class="form-horizontal" role="form">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="aid" value="{{$attr->id}}">

				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Label Name:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="lname" name="lname" placeholder="{{$attr->labelName}}" required>
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
					<textarea class="form-control" rows="5" id="note" name="note" placeholder="{{$attr->notes}}"></textarea>
				  </div>
				</div>
				  
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Update</button>
				  </div>
				</div>
			</form>
		@else
		<form action="" method="POST" style="margin-top: 20%" class="form-horizontal" role="form">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="aid" value="{{$attr->id}}">

			<div class="form-group">
			  <label class="control-label col-sm-2" for="lname">Label Name:</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="lname" name="lname" placeholder="{{$attr->labelName}}" readonly>
			  </div>
			</div>

			<div class="form-group"> 
			  <div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
				  <label><input type="checkbox" name="editable" id="editable" value="no" disabled>Editable</label>
				</div>
			  </div>
			</div>

			<div class="form-group">
			  <label class="control-label col-sm-2" for="note">Note:</label>
			  <div class="col-sm-10"> 
				<textarea class="form-control" rows="5" id="note" name="note" placeholder="{{$attr->notes}}" readonly></textarea>
			  </div>
			</div>
			  
			<div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="button" class="btn btn-default disabled">Update</button>
			  </div>
			</div>
		</form>
	  @endif
	@else
		<p>Invalid Attribute</p>
	@endif
@stop
@extends('Master')

@section('title')
	Alexandria - Output
@stop

@section('main_content')
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

@stop
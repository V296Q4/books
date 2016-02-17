@extends('Master')

@section('title')
	Alexandria - {{ $bookTitle }}
@stop

@section('main_content')
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
@stop
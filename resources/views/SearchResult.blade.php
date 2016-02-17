@extends('Master')

@section('title')
	Alexandria - {{ $searchString }}
@stop

@section('main_content')

	@if(isset($searchString) && isset($table))
		<div class="col-md-12">
			<div class="jumbotron">
				<h3>Results for "{{ $searchString }}"</h3>
				
				@if($resultCount == 0)
					<h4>No results</h4>
				@elseif($resultCount == 1)
					<h4>{{ $resultCount }} result</h4>
			
				@elseif($resultCount > 100)
					<h4>Showing 100 of {{ $resultCount }} results</h4>
				@endif
				
			</div>
		</div>
			

		<div class="col-md-8">
			<div class="jumbotron">
				{!! $table !!}
			</div>	
		</div>
		
		<div class="col-md-4">
			<div class="well">
				{{ Form::open(array('action' => array('OutputController@Output'))) }}
				{{ Form::label('title', 'Get output for selected results:') }}
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Template
					<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#">MLA</a></li>
					</ul>
				</div>
				<br>
				{{ Form::submit('Get Citation', array('class'=>'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	@endif
@stop
<!DOCTYPE html>

<html>
	<head>
		<title>@yield('title')</title>
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
		<nav class="navbar navbar-default">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('Home') }}">Home</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Attributes <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/addattr">Add</a></li>
								<li><a href="/updateattr">Update</a></li>
								<li><a href="/deleteattr">Delete</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">View All</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Templates <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Add</a></li>
								<li><a href="#">Update</a></li>
								<li><a href="#">Delete</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">View All</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Collections <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Add</a></li>
								<li><a href="#">Update</a></li>
								<li><a href="#">Delete</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">View All</a></li>
							</ul>
						</li>
					</ul>

					{{ Form::open(array('action' => array('SearchController@Search'), 'class' => 'navbar-form navbar-left')) }}
						<div class="form-group">
							<div>
								<input class="form-control" type="text" name="input">
							</div>
						</div>
						<button type="submit" class="btn btn-default">Search</button>
					</form>
			
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">username <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		
		<div class="container">
			@yield('main_content')
		</div>
	
	</body>
</html>
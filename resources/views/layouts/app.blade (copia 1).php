
<html>
	<head>
		<title>Soccer - @yield('titulo')</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
	</head>
	<body>
	
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand " href="/">Soccer</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse " id="navbarSupportedContent">
		      	<form class="form-inline my-2 my-lg-0" >
			 		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			    </form>
			</div>
		</nav>
		<h6>@yield('titulo' ) </h6>

		
		<div class="container border">

				@yield('contenido')

			</div>
		</div>
	</body>

	
</html>
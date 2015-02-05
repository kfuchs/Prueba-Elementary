<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tienda</title>
	{{ HTML::style('css/main.css'); }}
</head>
<body>
	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">
				<div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
					<ul class="nav">
						<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
					</ul>
					<div class="lateral">
						<ul class="nav hidden-xs" id="lg-menu">
							<li class="active">
								<i class="glyphicon glyphicon-home">{{HTML::link('lista','Lista')}}</i>
							</li>
							<li>
								<i class="glyphicon glyphicon-shopping-cart">{{HTML::link('vendedor','Vendedores')}}</i>
							</li>
							<li>
								<i class="glyphicon glyphicon-tags">{{HTML::link('producto','Productos')}}
								</i> 
							</li>
						</ul>
					</div>
					<ul class="list-unstyled hidden-xs" id="sidebar-footer">
						<li>
						</li>
					</ul>

				</div>
				<div class="column col-sm-10 col-xs-11" id="main">
					<div class="navbar navbar-blue navbar-static-top">  
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							</button>
							<a href="/" class="navbar-brand logo">b</a>
						</div>
						<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm" style="max-width:360px;">
									<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
							<ul class="nav navbar-nav">
								<li>
									<a href="/"><i class="glyphicon glyphicon-home"></i>Inicio </a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">

							</ul>
						</nav>
					</div>
					<div class="padding" align="center">
						<div class="full col-sm-9">
							@yield('contenido')
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		{{ HTML::style('js/main.js'); }}

	</body>






	</html>

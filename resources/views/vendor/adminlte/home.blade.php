@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


<style type="text/css">
a.glass{
	/* background styles */
	position: relative;
	display: inline-block;
	padding: 15px 25px;
	background-color: green; /*for compatibility with older browsers*/
	background-image: linear-gradient(yellow,orange);

	/* text styles */
	text-decoration: none;
	color: #fff;
	font-size: 25px;
	font-family: sans-serif;
	font-weight: 100;

	border-radius: 3px;
	box-shadow: 0px 1px 4px -2px #333;
	text-shadow: 0px -1px #333;
}

a.glass:after{
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	width: calc(100% - 4px);
	height: 50%;
	/background: linear-gradient(#C2DD10, #rgba(255,255,255,0.2));
}

a.glass:hover{
	background: linear-gradient(#F7F9A8,#F4F722);
}

a.glass2{
	/* background styles */
	position: relative;
	display: inline-block;
	padding: 15px 25px;
	background-color: green; /*for compatibility with older browsers*/
	background-image: linear-gradient(green,lightgreen);

	/* text styles */
	text-decoration: none;
	color: #fff;
	font-size: 25px;
	font-family: sans-serif;
	font-weight: 100;

	border-radius: 3px;
	box-shadow: 0px 1px 4px -2px #333;
	text-shadow: 0px -1px #333;
}

a.glass2:after{
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	width: calc(100% - 4px);
	height: 50%;
	background: linear-gradient(rgba(255,255,255,0.0), rgba(255,255,255,0.0));
}

a.glass2:hover{
	background: linear-gradient(#073,#0fa);
}

a.glass3{
	/* background styles */
	position: relative;
	display: inline-block;
	padding: 15px 25px;
	background-color: green; /*for compatibility with older browsers*/
	background-image: linear-gradient(purple,pink);

	/* text styles */
	text-decoration: none;
	color: #fff;
	font-size: 25px;
	font-family: sans-serif;
	font-weight: 100;

	border-radius: 3px;
	box-shadow: 0px 1px 4px -2px #333;
	text-shadow: 0px -1px #333;
}

a.glass3:after{
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	width: calc(100% - 4px);
	height: 50%;
	background: linear-gradient(rgba(255,255,255,0.0), rgba(255,255,255,0.0));
}

a.glass3:hover{
	background: linear-gradient(pink,#F38AFF);
}




</style>


@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">

	
			<div class="col-md-8 col-md-offset-2">
				<h2>Bienvenido Sr. <strong>{{ Auth::user()->name }}</strong> </h2>
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h1 class="box-title">Crear o Ver solicitudes</h1>
						
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
			
						<div class="col-sm-6">
							<div class="row">
								<a type=" button" style="width: 400px; height: 100px;  font-size: 200%; font-style: oblique;  text-shadow: 2px 2px 4px #000;" class="glass"  href="/solicitud/create">Crear solicitud<i style="position:relative; left:100px; font-size: 165%; top:15px;" class='fa fa-send'></i></a>
							</div>
							
							<div class="row">
								<br>
								<a type="button"  style="width: 400px; height: 100px;  font-size: 150%; font-style: oblique;  text-shadow: 2px 2px 4px #000;" class="glass" href="/solicitud/createTerceros">Crear solicitud <br> para tercero contratistas<i style="position:relative; left:50px; top:-20px; font-size: 220%" class='fa fa-send'> </i></a>
							</div>
							<div class="row">
								<br>
								<a type="button"  style="width: 400px; height: 100px;  font-size: 180%; font-style: oblique;  text-shadow: 2px 2px 4px #000;" class="glass" href="/solicitud/createTercerosC">Crear solicitud <br> para tercero<br><i style="position:relative; left:280px; top:-75px; font-size: 180%" class='fa fa-send'></i></a>
							</div>
							
						</div>
						<div class="col-sm-6">	

							<div class="row">
								<a type="button"  style="width: 400px; height: 100px;  font-size: 200%; font-style: oblique;  text-shadow: 2px 2px 4px #000;" class="glass2" href="/solicitud/enviar">Editar mis solicitudes<br><i style="position:relative; left:300px; font-size: 165%; top:-40px;" class='fa fa-user'></i></a>
							</div>

							<div class="row">
								<br>
								<a type="button"  style="width: 400px; height: 100px;  font-size: 200%; font-style: oblique;  text-shadow: 2px 2px 4px #000;" class="glass2" href="/solicitud/index">Consultar Solicitudes<br><i style="position:relative; left:300px; font-size: 165%; top:-40px;" class="fa fa-users"></i></a>
							</div>
						
							<div class="row">
								<br>
								<a type="button"  style="width: 400px; height: 100px;  font-size: 200%; font-style: oblique;  text-shadow: 2px 2px 4px #000;" class="glass3"  href="/solicitud/reportabilidad" >Reportabilidad<br><i style="position:relative; left:300px; font-size: 165%; top:-40px;" class="fa fa-pie-chart"></i></a>
							</div>
						</div>
						
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
					<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h1 class="box-title">Guias de apoyo</h1>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						
						<br>
						<br>
						<br>
						<div align="center">
							<!--button style="height: 250px; width: 250px;  white-space: normal;"  type="button" class="btn btn-success btn-lg shine">Guia de Servicios y Recursos Computacionales</button-->
							<a style="background: #222D32;" href="{{ url('/home') }}" class="logo">
        						<!-- mini logo for sidebar mini 50x50 pixels -->
						        <!-- logo for regular state and mobile devices -->
						        <span class="logo-lg" style="background-color: white;"><b><img src="storage/guia.gif"></b> </span>
						    </a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							

							<!--button style="height: 250px; width: 250px; white-space: normal;"  type="button" class="btn btn-warning btn-lg">Manual de Ayuda de Usuarios</button-->
							<a style="background: #222D32;" href="/storage/Manual-de-ayuda-prototipo.pdf" class="logo">
        						<!-- mini logo for sidebar mini 50x50 pixels -->
						        <!-- logo for regular state and mobile devices -->
						        <span class="logo-lg" style="background-color: white;"><b><img src="storage/manual.gif"></b> </span>
						    </a>
						</div>
						<br>
						
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

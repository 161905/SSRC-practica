@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection

<style type="text/css">
        /* bootstrap hack: fix content width inside hidden tabs */
        .tab-content > .tab-pane:not(.active),
        .pill-content > .pill-pane:not(.active) {
            display: block;
            height: 0;
            overflow-y: hidden;


        }
        /* bootstrap hack end */

        .center-pills {
            display: flex;
            justify-content: left;
            /*color: #fff;
            background-color: #5bc0de;
            padding: 15px 25px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            outline: none;
            border: none;
            border-radius: 15px;*/
        }

</style>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Estado', 'Cantidad'],
          @foreach($cantidad_sol as $cas)
          ['{{$cas->Estado}}',{{$cas->num}}],
          @endforeach 
          
        ]);

        var options = {
          
          'width': 900,
          'height': 315,
        };

        var chart = new google.visualization.PieChart(document.getElementById('estado_sol'));

        chart.draw(data, options);
      }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Estado', 'Cantidad'],
          @foreach($cantidad_sol_p as $cap)
          ['{{$cap->Estado}}',{{$cap->num}}],
          @endforeach 
          
        ]);

        var options = {
          'width': 900,
          'height': 315,

        };

        var chart = new google.visualization.PieChart(document.getElementById('estado_sol_propias'));

        chart.draw(data, options);
      }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Nombre', 'Cantidad'],
          @foreach($ejecu_sol as $ejs)
          ['{{$ejs->name}}',{{$ejs->num}}],
          @endforeach 
          
        ]);

        var options = {
          'width': 900,
          'height': 315,
        };

        var chart = new google.visualization.PieChart(document.getElementById('sol_eje'));

        chart.draw(data, options);
      }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Nombre', 'Cantidad'],
          @foreach($rec_sol as $rs)
          ['{{$rs->nombre}}',{{$rs->num}}],
          @endforeach 
          
        ]);

        var options = {
          'width': 900,
          'height': 315,
        };

        var chart = new google.visualization.PieChart(document.getElementById('rec_eje'));

        chart.draw(data, options);
      }
</script>
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!--div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Example box</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        
                    </div>
                    
                    <div class="box-body">
                        Put your content here
                    </div>
                    
                </div-->
                    
                            <ul class="nav center-pills">
                                <li class="active"><a class="btn btn-warning" type="button" data-toggle="pill" href="#home">Estado todas las solicitudes</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li><a class="btn btn-warning" type="button" data-toggle="pill" href="#menu1">Estado de todas tus solicitudes</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li><a class="btn btn-warning" type="button" data-toggle="pill" href="#menu2">Ejecutor por solicitud</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li><a class="btn btn-warning" type="button" data-toggle="pill" href="#menu3">Recursos por solicitud</a></li>
                            </ul>

                            <div class="tab-content" style="background-color: white;">
                                <div id="home" class="tab-pane fade in active" align="center">
                                    <div class="panel-body">
                                        Se muestran toda las solicitudes existentes en el sistema.
                                    
                                        <div  id="estado_sol"></div>
                                    
                                        <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr class="thead-inverse">
                                                <td style="background-color: #FCC47D;"><strong>Estado</strong></td>
                                                <td style="background-color: #FCC47D;"><strong>Numero de solicitudes</strong></td>
                                              </tr>

                                          </thead>
                                        @foreach($cantidad_sol as $cas)
                                          <tr>
                                            <td>{{$cas->Estado}}</td>
                                            <td>{{$cas->num}}</td>
                                          </tr>
                                        @endforeach 
                                        </table>
                                    </div>

                                </div>

                                <div id="menu1" class="tab-pane fade" align="center">
                                    <div class="panel-body">
                                        Se muestran toda las solicitudes de las cuales eres ejecutor.
                                        <div  id="estado_sol_propias"></div>
                                        <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr class="thead-inverse">
                                                <td style="background-color: #FCC47D;"><strong>Estado</strong></td>
                                                <td style="background-color: #FCC47D;"><strong>Numero de solicitudes</strong></td>
                                              </tr>

                                          </thead>
                                        @foreach($cantidad_sol_p as $cap)
                                          <tr>
                                            <td>{{$cap->Estado}}</td>
                                            <td>{{$cap->num}}</td>
                                          </tr>
                                        @endforeach 
                                        </table>
                                    </div>

                                </div>
                                <div  id="menu2" class="tab-pane fade" align="center">
                                    <div class="panel-body">
                                        Se muestran toda las solicitudes asignadas a cada ejecutor.
                                        <div  id="sol_eje"></div>
                                        <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr class="thead-inverse">
                                                <td style="background-color: #FCC47D;"><strong>Estado</strong></td>
                                                <td style="background-color: #FCC47D;"><strong>Numero de solicitudes</strong></td>
                                              </tr>

                                          </thead>
                                        @foreach($ejecu_sol as $ejs)
                                          <tr>
                                            <td>{{$ejs->name}}</td>
                                            <td>{{$ejs->num}}</td>
                                          </tr>
                                        @endforeach 
                                        </table>
                                    </div>
                                </div>
                                <div  id="menu3" class="tab-pane fade" align="center">
                                    <div class="panel-body">
                                        Se muestran los recursos mas pedidos en las solicitudes.
                                        <div  id="rec_eje"></div>
                                        <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr class="thead-inverse">
                                                <td style="background-color: #FCC47D;"><strong>Nombre</strong></td>
                                                <td style="background-color: #FCC47D;"><strong>Numero de solicitudes</strong></td>
                                              </tr>

                                          </thead>
                                        @foreach($rec_sol as $rs)
                                          <tr>
                                            <td>{{$rs->nombre}}</td>
                                            <td>{{$rs->num}}</td>
                                          </tr>
                                        @endforeach 
                                        </table>
                                    </div>
                                </div>

                            </div>


         
               
                

			</div>
		</div>
	</div>

@endsection

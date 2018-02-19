@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
    <style type="text/css">
      table tbody tr td a {
          display: block;
          width: 100%;
          height: 100%;
        }
    </style>

@endsection


@section('main-content')
<div class="container">
  <div class="row">
      <!--div class="col-md-9 col-md-offset-1"-->
      <div class="col-12">
        <input type="text" id="TABLA0" onkeyup="columna0()" placeholder="Buscar por ID..">
        <input type="text" id="TABLA1" onkeyup="columna1()" placeholder="Buscar por nombre..">
        <input type="text" id="TABLA2" onkeyup="columna2()" placeholder="Buscar por dueño..">
        <input type="text" id="TABLA3" onkeyup="columna3()" placeholder="Buscar por ejecutor..">
        <input type="text" id="TABLA4" onkeyup="columna4()" placeholder="Buscar por clasificacion..">

                    <table class="table table-striped table-bordered table-hover" id="myTable">.

                      <thead class="thead-inverse">
                        <tr>
                          <th scope="col">ID RECURSO</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">id Aprobador</th>
                          <th scope="col">id Ejecutor</th>
                          <th scope="col">Clasificacion</th>
                          <th scope="col">Pais</th>
                          <th scope="col">Nota</th>
                          <th scope="col">Tipo Recurso</th>

                        </tr>
                      </thead>
                      <tbody > 
                          @foreach ($recurs as $rec)  
                          <tr>
                            <td><a class="myButton" data-toggle="modal" data-target="#model-{{$rec->recid}}">{{$rec->recid}}</a></td>
                            <td>{{$rec->nombre}}</td>
                            <td>
                              <?php
                                  if ($rec->idAprobador == NULL){
                                      print("<strong>[FALTA]</strong>");
                                  }
                                  else{
                                      foreach ($userrs as $usera) {
                                          if($usera->id == $rec->idAprobador){
                                              echo $usera->userid;
                                          }
                                      }

                                  }
                              ?>
                            </td>
                            <td>
                             <?php
                                  if ($rec->idEjecutor == NULL){
                                      print("<strong>[FALTA]</strong>");
                                  }
                                  else{
                                      foreach ($userrs as $usera) {
                                          if($usera->id == $rec->idEjecutor){
                                              echo $usera->userid;
                                          }
                                      }

                                  }
                              ?>
                            </td>
                            <td>                                              
                              <?php
                                 if ($rec->idClasifica == NULL){
                                      print("<strong>[SIN CLASIFICACION]</strong>");
                                    }
                                 else{
                                  foreach ($clasi as $cl) {
                                      if($cl->idClasifica == $rec->idClasifica){
                                            echo $cl->nombre;
                                        }
                                 }
                                }
                               ?>
                                                  
                            </td>
                            <td>{{$rec->pais}}</td>
                            <td>{{$rec->nota}}</td>
                            <td>{{$rec->tipo_r}}</td>
                          </tr>
                          </a>
                          <!-- Modal -->
                                <div class="modal fade" id="model-{{ $rec->recid }}" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h1 class="modal-title" id="myModalLabel">
                                                    {{$rec->nombre}}
                                                </h1>
                                            </div>
                                            <div class="modal-body">
                                            <p style="border-style: solid;">
                                              <strong>NOMBRE: </strong>{{$rec->nombre}}
                                            </p>

                                            <p style="border-style: solid;">
                                              <strong>ID RECURSO: </strong>{{$rec->recid}}
                                            </p>

                                            <p style="border-style: solid;">
                                              <strong>CLASIFICACION: </strong>
                                              <?php
                                                if ($rec->idClasifica == NULL){
                                                    print("<strong>[SIN CLASIFICACION]</strong>");
                                                }
                                                else{
                                                    foreach ($clasi as $cl) {
                                                        if($cl->idClasifica == $rec->idClasifica){
                                                            echo $cl->nombre;
                                                        }
                                                    }

                                                }
                                                ?>
                                            </p>

                                            <p style="border-style: solid;">
                                              <strong>PAIS: </strong>{{$rec->pais}}
                                            </p>
                                            <p style="border-style: solid;">
                                              <strong>APROBADOR: </strong>
                                            <?php
                                                if ($rec->idAprobador == NULL){
                                                    print("<strong>[FALTA]</strong>");
                                                }
                                                else{
                                                    foreach ($userrs as $usera) {
                                                        if($usera->id == $rec->idAprobador){
                                                            echo $usera->userid;
                                                        }
                                                    }

                                                }
                                            ?>
                                            </p>

                                            <p style="border-style: solid;">
                                              <strong>EJECTUTOR: </strong>
                                            <?php
                                                if ($rec->idEjecutor == NULL){
                                                    print("<strong>[FALTA]</strong>");
                                                }
                                                else{
                                                    foreach ($userrs as $usera) {
                                                        if($usera->id == $rec->idEjecutor ){
                                                            echo $usera->userid;
                                                        }
                                                    }

                                                }
                                            ?>
                                            </p>
                                            <p style="border-style: solid;">
                                              <strong>TIPO RECURSO: </strong>{{$rec->tipo_r}}
                                            </p>
                                            <p style="border-style: solid;">
                                              <strong>MAIL GSD: </strong><?php
                                                if ($rec->mail_gsd == 1){
                                                    print("SI");
                                                }
                                                else{
                                                    print("NO");

                                                }
                                            ?>
                                            </p>
                                            <p style="border-style: solid;">
                                              <strong>CODIGO GS: </strong>{{$rec->cod_gsd}}
                                            </p>


                                            <p style="border-style: solid;">
                                              <strong>NOTA: </strong>{{$rec->nota}}
                                            </p>


                                            </div>



                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->




                          @endforeach
                        </tbody>
                    </table>



      </div>
  </div>
</div>

@endsection
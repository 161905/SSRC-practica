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
<style>
DIV.table 
{
    display:table;
    border: 1px solid black;
    text-align: left;

}
FORM.tr, DIV.tr
{
    display:table-row;
    border: 1px solid black;
    padding: 20px;
    text-align: left;
}

FORM.tr, DIV.tr:hover
{
    background-color: #9EC6DF;
}

SPAN.td
{
    display:table-cell;
    border: 1px solid black;
    padding: 20px;
    text-align: left;
}
</style>


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
                                              <div class="table">
                                              <div class="tr">
                                                <span class="td" style="background-color: #E6E6E6;"><strong>Nombre: </strong></span>
                                                <span class="td">{{$rec->nombre}}</span>
                                              </div>

                                              <div class="tr">
                                                <span class="td" style="background-color: #E6E6E6;"><strong>Id Recurso: </strong></span>
                                                <span class="td">{{$rec->recid}}</span>
                                              </div>
                                
                              

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;"><strong>CLASIFICACION: </strong></span>
                                              <span class="td">
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
                                              </span>
                                            </div>

                                            <div class="tr">
                                            <span class="td"  style="background-color: #E6E6E6;">
                                              <strong>PAIS: </strong>
                                            </span>
                                            <span class="td">
                                              {{$rec->pais}}
                                            </span>
                                           </div>


                                            <div class="tr">
                                              <span class="td"  style="background-color: #E6E6E6;"><strong>APROBADOR: </strong>
                                              </span>
                                              <span class="td">
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
                                            </span>
                                            </div>

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                              <strong>EJECTUTOR: </strong>
                                              </span>
                                              <span class="td">
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
                                            ?></span>
                                            </div>

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                                <strong>TIPO RECURSO: </strong>
                                              </span>
                                              <span class="td">
                                                {{$rec->tipo_r}}
                                              </span>
                                            </div>
                                            
                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                              <strong>MAIL GSD: </strong>
                                              </span>
                                              <span class="td">
                                                <?php
                                                if ($rec->mail_gsd == 1){
                                                    print("SI");
                                                }
                                                else{
                                                    print("NO");

                                                }
                                            ?>
                                            </span>
                                            </div>

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                              <strong>CODIGO GSD: </strong>
                                              </span>
                                              <span class="td">
                                              {{$rec->cod_gsd}}
                                            </span>
                                            </div>


                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                              <strong>NOTA: </strong>
                                              </span>
                                              <span class="td">
                                              {{$rec->nota}}
                                            </span>
                                            </div>
                                            </div>


                                            

                                            <h2><strong>Subrecursos asociados</strong></h2>
                                            <div class="table">
                                            <div class="tr" style="background-color: #E6E6E6;">
                                              <span class="td">
                                                <strong>ID Subrecurso</strong>
                                              </span>
                                              <span class="td">
                                                <strong>Nombre</strong>
                                              </span>

                                            </div>
                                            @foreach($subrecs as $sub)
                                            @if($sub->recid == $rec->recid)
                                            <div class="tr">
                                              <span class="td">
                                              {{$sub->subrecid}}
                                              </span>
                                              <span class="td">
                                              {{$sub->nombre}}
                                              <br>
                                              </span>
                                            </div>
                                             @endif
                                            @endforeach

                                            </div>
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
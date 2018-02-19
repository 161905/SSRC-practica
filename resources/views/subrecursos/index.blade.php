@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<!--div class="col-md-9 col-md-offset-1"-->
            <div class="col-12">
                    <input type="text" id="TABLA0" onkeyup="columna0()" placeholder="Buscar por ID Subrecurso..">
                    <input type="text" id="TABLA1" onkeyup="columna1()" placeholder="Buscar por ID Recurso..">
                    <input type="text" id="TABLA2" onkeyup="columna2()" placeholder="Buscar por Nombre Subrecurso..">
                    <input type="text" id="TABLA3" onkeyup="columna3()" placeholder="Buscar por Nombre Recurso..">
                    <input type="text" id="TABLA4" onkeyup="columna4()" placeholder="Buscar por Dueño..">

                                <table class="table table-striped table-bordered table-hover" id="myTable">.

                                  <thead class="thead-inverse">
                                    <tr>
                                      <th scope="col">ID SUBRECURSO</th>
                                      <th scope="col">ID RECURSO</th>
                                      <th scope="col">Nombre Subrecurso</th>
                                      <th scope="col">Nombre Recurso</th>
                                      <th scope="col">Dueño</th>
                                      <th scope="col">Pais</th>
                                      <th scope="col">Grupo NT</th>

                                    </tr>
                                  </thead>
                                  <tbody > 
                                      @foreach ($subrecs as $sub)  
                                      <tr>

                                        <td><a class="myButton" data-toggle="modal" data-target="#model-{{$sub->subrecid}}">{{$sub->subrecid}}</a></td>
                                        <td>{{$sub->recid}}</td>
                                        <td>{{$sub->nombre}}</td>
                                        <td>
                                          <?php
                                              if ($sub->recid == NULL){
                                                  print("<strong>[FALTA]</strong>");
                                              }
                                              else{
                                                  foreach ($recurs as $rec) {
                                                      if($sub->recid == $rec->recid){
                                                          echo $rec->nombre;
                                                      }
                                                  }

                                              }
                                          ?>
                                        </td>
                                        <td>
                                         <?php
                                              if ($sub->idDueño == NULL){
                                                  print("<strong>[FALTA]</strong>");
                                              }
                                              else{
                                                  foreach ($userrs as $us) {
                                                      if($us->id == $sub->idDueño){
                                                          echo $us->userid;
                                                      }
                                                  }

                                              }
                                          ?>
                                        </td>
                                        <td>{{$sub->pais}}</td>
                                        <td>{{$sub->grupo_nt}}</td>
                                      </tr>
                                      </a>
                                      <!-- Modal -->
                                            <div class="modal fade" id="model-{{ $sub->subrecid }}" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h3 class="modal-title" id="myModalLabel">
                                                                {{$sub->nombre}}
                                                            </h3>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p style="border-style: solid;">
                                                          <strong>NOMBRE SUBRECURSO: </strong>{{$sub->nombre}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>NOMBRE RECURSO: </strong><?php
                                                              if ($sub->recid == NULL){
                                                                  print("<strong>[FALTA]</strong>");
                                                              }
                                                              else{
                                                                  foreach ($recurs as $re) {
                                                                      if($re->recid == $sub->recid){
                                                                          echo $re->nombre;
                                                                      }
                                                                  }

                                                              }
                                                          ?>
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>ID SUBRECURSO: </strong>{{$sub->subrecid}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>ID RECURSO: </strong>{{$sub->recid}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>DUEÑO: </strong><?php
                                                              if ($sub->idDueño == NULL){
                                                                  print("<strong>[FALTA]</strong>");
                                                              }
                                                              else{
                                                                  foreach ($userrs as $us) {
                                                                      if($us->id == $sub->idDueño){
                                                                          echo $us->userid;
                                                                      }
                                                                  }

                                                              }
                                                          ?>
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>PAIS: </strong>{{$sub->pais}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>RECURSO ELLIPSE: </strong><?php
                                                              if ($sub->recurso_ellipse == 0){
                                                                  print("NO");
                                                              }
                                                              else{
                                                                  print("SI");
                                                              }
                                                          ?>
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>GRUPO NT: </strong>{{$sub->grupo_nt}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>TABLA ASOCIADA: </strong>{{$sub->tabla_aso}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>ACTIVO: </strong><?php
                                                              if ($sub->activo == 0){
                                                                  print("NO");
                                                              }
                                                              else{
                                                                  print("SI");

                                                              }
                                                          ?>
                                                        <p style="border-style: solid;">
                                                          <strong>NOTA: </strong>{{$sub->nota}}
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>REQUIERE ETIQUETA: </strong><?php
                                                              if ($sub->activo == 0){
                                                                  print("NO");
                                                              }
                                                              else{
                                                                  print("SI");
                                                              }
                                                          ?>
                                                        </p>
                                                        <p style="border-style: solid;">
                                                          <strong>ETIQUETA PARA NOTA: </strong>{{$sub->tag_nota}}
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
@endsection

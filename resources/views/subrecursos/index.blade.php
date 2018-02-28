@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
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
                                                        <div class="table">
                                              			  <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>NOMBRE SUBRECURSO </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->nombre}}
                                                           </span>
                                                          </div>
                                                     
                                                      
                                              			  <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>NOMBRE RECURSO </strong>
                                                           </span>
                                                           <span class="td">
                                                           		<?php
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
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>ID SUBRECURSO </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->subrecid}}
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>ID RECURSO </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->recid}}
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>DUEÑO </strong>
                                                           </span>
                                                           <span class="td">
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
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>PAIS </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->pais}}
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>RECURSO ELLIPSE </strong>
                                                           </span>
                                                           <span class="td">
                                                           		<?php
		                                                              if ($sub->recurso_ellipse == 0){
		                                                                  print("NO");
		                                                              }
		                                                              else{
		                                                                  print("SI");
		                                                              }
		                                                          ?>
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>GRUPO NT </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->grupo_nt}}
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>TABLA ASOCIADA </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->tabla_aso}}
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>ACTIVO </strong>
                                                           </span>
                                                           <span class="td">
                                                           		<?php
		                                                              if ($sub->activo == 0){
		                                                                  print("NO");
		                                                              }
		                                                              else{
		                                                                  print("SI");

		                                                              }
		                                                          ?>
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>NOTA </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->nota}}
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>REQUIERE ETIQUETA? </strong>
                                                           </span>
                                                           <span class="td">
		                                                           	<?php
		                                                              if ($sub->activo == 0){
		                                                                  print("NO");
		                                                              }
		                                                              else{
		                                                                  print("SI");

		                                                              }
		                                                          ?>
                                                           </span>
                                                          </div>
                                                          <div class="tr">
                                                           <span class="td" style="background-color: #E6E6E6;">
                                                     			<strong>NOTA DE LA ETIQUETA </strong>
                                                           </span>
                                                           <span class="td">
                                                           		{{$sub->tag_nota}}
                                                           </span>
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
@endsection

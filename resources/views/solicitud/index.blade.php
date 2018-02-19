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
                                      <th>Num. Solicitud</th>
                                      <th>Creador</th>
                                      <th>Solicitante</th>
                                      <th>Recurso</th>
                                      <th>Supervisor</th>
                                      <th>Estado</th>
                                      <th>Creacion</th>
                                      <th>Aprob. Sup.</th>
                                      <th>Aprob. Dueño</th>
                                      <th>Ejecucion</th>
                                      <th>Rechazo</th>
                                      <th>Ticket GSD</th>

                                    </tr>
                                  </thead>
                                  <tbody > 
                                      @foreach ($solis as $sol)  
                                      <tr>
                                        <td>
                                          <a class="myButton" href="/solicitud/show/{{$sol->numSol}}/">{{$sol->numSol}}</a>
                                        </td>
                                        <td><?php
                                        foreach ($userrs as $us) {
                                              if($sol->idCreador == $us->id){
                                                  echo $us->name;
                                              }
                                            }

                                         ?></td>
                                        <td><?php
                                        foreach ($userrs as $us) {
                                              if($sol->idSolicitante == $us->id){
                                                  echo $us->name;
                                              }
                                            }

                                         ?>
                                        </td>
                                        <td>
                                        <?php
                                        foreach ($recurs as $rec) {
                                             if($sol->recid == $rec->recid){
                                                  echo $rec->nombre;
                                              }
                                            }

                                         ?>
                                        </td>
                                        <td>
                                        <?php
                                        foreach ($userrs as $use) {
                                             if($sol->idSupervisor == $use->id){
                                                  echo $use->name;
                                              }
                                            }

                                         ?>
                                        </td>
                                        <td>{{$sol->Estado}}</td>
                                        <td>{{$sol->created_at}}</td>
                                        <td>{{$sol->fechaSup}}</td>
                                        <td>{{$sol->fechaApr}}</td>
                                        <td>{{$sol->fechaEje}}</td>
                                        <td>{{$sol->fechaRec}}</td>
                                        <td>{{$sol->ticketGSD}}</td>



                                      </tr>

                                      @endforeach
                                    </tbody>
                                </table>
                </div>
              </div>
@endsection

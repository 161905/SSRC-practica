@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">

    <div class="row">
        @if (isset($Funciono))
                        <div class="box box-success box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Solicitud enviada!</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            Se a enviado su solicitud satisfactoriamente
                                        </div>
                                        <!-- /.box-body -->
                        </div>
        @endif   
      <!--div class="col-md-9 col-md-offset-1"-->
        <div class="col-12">
                    <input type="text" id="TABLA0" onkeyup="columna0()" placeholder="Buscar por Num. Solicitud..">
                    <input type="text" id="TABLA1" onkeyup="columna1()" placeholder="Buscar por Solicitante..">
                    <input type="text" id="TABLA2" onkeyup="columna2()" placeholder="Buscar por Recurso..">
                    <input type="text" id="TABLA3" onkeyup="columna3()" placeholder="Buscar por Supervisor..">
                    <input type="text" id="TABLA4" onkeyup="columna4()" placeholder="Buscar por Estado..">
                    <input type="text" id="TABLA5" onkeyup="columna5()" placeholder="Buscar por Fecha de Creacion..">
                    <br><br>
                    <button style="width: 200px" class="myButton2" onclick="pendientes2('SOLICITUD CREADA')">Solicitudes creadas</button>
                    <button style="width: 200px" class="myButton5" onclick="pendientes2('RECHAZADO')">Solicitudes rechazadas</button>
                    <button style="width: 200px" class="myButton4" onclick="hora2()">Solicitudes hoy</button>
                                <table class="table table-striped table-bordered table-hover" id="myTable">.

                                  <thead class="thead-inverse">
                                    <tr>
                                      <th>Num. Solicitud</th>
                                      <th>Solicitante</th>
                                      <th>Recurso</th>
                                      <th>Supervisor</th>
                                      <th>Estado</th>
                                      <th>Creacion</th>

                                    </tr>
                                  </thead>
                                  <tbody > 
                                     @foreach ($solis as $sol)
                                      @if($sol->idCreador == $user->id)

                                      <tr>
                                        <td>
                                          <a class="myButton" href="/solicitud/enviar2/{{$sol->numSol}}">{{$sol->numSol}}</a>
                                          

                                        </td>
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
                                      </tr>
                                      @endif
                                      @endforeach

                                       @foreach ($solis2 as $sol)
                                      @if($sol->idCreador == $user->id)

                                      <tr>
                                        <td>
                                          <a class="myButton" href="/solicitud/enviar2/{{$sol->numSol}}">{{$sol->numSol}}</a>
                                          

                                        </td>
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
                                      </tr>
                                      @endif
                                      @endforeach

                                       @foreach ($solis3 as $sol)
                                      @if($sol->idCreador == $user->id)

                                      <tr>
                                        <td>
                                          <a class="myButton" href="/solicitud/enviar2/{{$sol->numSol}}">{{$sol->numSol}}</a>
                                          

                                        </td>
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
                                      </tr>
                                      @endif
                                      @endforeach
                                      @foreach ($solis4 as $sol)
                                      @if($sol->idCreador == $user->id)

                                      <tr>
                                        <td>
                                          <a class="myButton" href="/solicitud/enviar2/{{$sol->numSol}}">{{$sol->numSol}}</a>
                                          

                                        </td>
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
                                      </tr>
                                      @endif
                                      @endforeach
                                         
                                    </tbody>
                                </table>
        </div>
   </div>
 </div>
@endsection

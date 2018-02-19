@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <!--div class="col-md-6 col-md-offset-1"-->
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                    <h2 align="center">Solicitud de recurso N°: <strong>{{$solis->numSol}}</strong></h2>
                    <table class="table table-striped table-bordered table-hover" id="myTable">

                          <!--thead class="thead-inverse">
                            <tr>
                              <th scope="col">ID RECURSO</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">id Aprobador</th>
                              <th scope="col">id Ejecutor</th>
                              

                            </tr>
                          </thead-->
                          <tbody>   
                              <tr>
                                <th scope="row">Solicitante</th>
                                <td>
                                    <?php
                                    foreach ($userrs as $us) {
                                        if($us->id == $solis ->idSolicitante){
                                            echo "{$us->name}";
                                        }
                                    }
                                    ?>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Rut</th>
                                <td>
                                    <?php
                                    foreach ($userrs as $us) {
                                        if($us->id == $solis ->idSolicitante){
                                            echo "{$us->rut}";
                                        }
                                    }
                                    ?>        
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Estado Solicitud</th>
                                <td>{{$solis->Estado}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Tipo</th>
                                <td>
                                    <?php
                                    foreach ($userrs as $us) {
                                        if($us->id == $solis ->idSolicitante){
                                            echo "{$us->tipo}";
                                        }
                                    }
                                    ?>
                                        
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Supervisor</th>
                                <td>
                                    <?php
                                    foreach ($userrs as $us) {
                                       if($solis->idSupervisor == $us->id){
                                            echo "{$us->name}";
                                       }
                                    }

                                    ?>

                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Contrato</th>
                                <td>(Info. del AD)</td>
                              </tr>
                              <tr>
                                <th scope="row">Porcion</th>
                                <td>(Info. del AD)</td>
                              </tr>
                              <tr>
                                <th scope="row">Fin contrato</th>
                                <td>(Info. del AD)</td>
                              </tr>
                              <tr>
                                <th scope="row">Division</th>
                                <td><?php
                                    foreach ($userrs as $us) {
                                        if($us->id == $solis ->idSolicitante){
                                            echo "{$us->division}";
                                        }
                                    }
                                    ?></td>
                              </tr>
                              @if($solis->aneContrato != NULL)
                              <tr>
                                <th scope="row">Anexo Contrato</th>
                                <td>{{$solis->aneContrato}}</td>
                              </tr>
                              <tr>
                              <th scope="col">Compromiso de reserva</th>
                                    <td><a type="button"  href="{{Storage::url($solis->compromisoReserva)}}">Ver compromiso de reserva</a></td>
                              </tr>
                              @endif
                              <tr>
                              <tr>
                                <th scope="row">Cargo</th>
                                <td>(Info. del AD)</td>
                              </tr>
                              <tr>
                                <th scope="row">Ticket GSD</th>
                                <td>{{$solis->ticketGSD}}</td>
                              </tr>

                            
                            </tbody>
                        </table>




                    <form  action="{{route('solicitud.supervisor.update',$solis->numSol)}}" method="POST">
                        {!!method_field('PUT')!!}
                        {!!csrf_field()!!}
                        <textarea style="width: 424px; height: 100px;" name="Nota_Supervisor" value="Nota_Supervisor" placeholder="Envie una nueva nota..."></textarea>
                        <br>

                        <input type="hidden" name="idEmisor" value="{{$user->id}}">


                        <div class="modal fade" id="confirmar" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h1 class="modal-title" id="myModalLabel">                                              Confirmar
                                        </h1>
                                    </div>
                                    <div class="modal-body">
                                                        
                                        ¿Seguro desea enviar esta nota?
                                     </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info" name="actualizar" value="actualizar">Enviar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                            
                                <!-- /.modal-content -->
                                </div>
                                        <!-- /.modal-dialog -->
                            </div>
                        </div>
                                          

                      <!--button type="submit" data-toggle="modal" data-target="confirmar" class="btn btn-primary" name="rechazar" value="rechazar">Rechazar</button-->

                      <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmar">Enviar nueva nota</a>
                      <a type="button" class="btn btn-primary" href="../../../../solicitud/supervisor/index">Volver</a>
                    </form>  
                </div>
              </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <h2 align="center">Recurso <strong>
                          @foreach($recurs as $rec)
                          @if($rec->recid == $solis->recid)
                              {{$rec->nombre}}
                          @endif
                          @endforeach
                      </strong></h2>
                      <table class="table table-striped table-bordered table-hover" id="myTable">

                            <!--thead class="thead-inverse">
                              <tr>
                                <th scope="col">ID RECURSO</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">id Aprobador</th>
                                <th scope="col">id Ejecutor</th>
                                

                              </tr>
                            </thead-->
                            <tbody>   
                                <tr>
                                  <th scope="row"><h4><strong>Dueño</strong></h4></th>
                                  <td colspan="3"><h4>
                                      <?php
                                      foreach ($recurs as $rec) {
                                          if($rec->recid==$solis->recid){
                                              if ($rec->idAprobador == NULL){
                                                  echo "<strong>[SIN DUEÑO]</strong>";
                                              }
                                              else{
                                                  foreach ($userrs as $us) {
                                                      if($us->id == $rec->idAprobador){
                                                          echo "{$us->name}";
                                                      }
                                                  }
                                              }
                                          }
                                      }
                                      ?>

                                  </h4></td>
                                </tr>
                                <tr>
                                  <td colspan="7" align="center">
                                   <h4><strong>Subrecursos</strong></h4>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">Nombre subrecurso</th>
                                  <th scope="row">Accion</th>
                                  <th scope="row">Grupo NT</th>
                                  <th scope="row">ID Aprobador</th>
                                  <th scope="row">Estado</th>
                                  <th scope="row">Valor anexo</th>
                                  <th scope="row">Fecha resolucion</th>
                                </tr>
                                <tr>
                                <?php
                                foreach ($SolSub as $ss) {
                                  if($ss->numSol == $solis->numSol){
                                      foreach ($subrecs as $sb) {
                                          if($ss->subrecid == $sb->subrecid)
                                              if($sb->idDueño == NULL){
                                                      echo "
                                                      <tr>

                                                      <td>$sb->nombre</td>
                                                      <td>$ss->accion</td>
                                                      <td>$sb->grupo_nt</td>
                                                      <td><strong>[FALTA]</storng></td>
                                                      <td>$ss->Estado</td>
                                                      <td>$ss->tag</td>
                                                      <td>$ss->fechaApr</td>


                                                      </tr>



                                                      ";
                                                  }
                                              else{
                                              foreach ($userrs as $us) {
                                                  if($sb->idDueño == $us->id){
                                                      echo "
                                                      <tr>

                                                      <td>$sb->nombre</td>
                                                      <td>$ss->accion</td>
                                                      <td>$sb->grupo_nt</td>
                                                      <td>$us->name</td>
                                                      <td>$ss->Estado</td>
                                                      <td>$ss->tag</td>
                                                      <td>$ss->fechaApr</td>


                                                      </tr>



                                                      ";

                                                  }
                                              }
                                          }
                                              
                                      }
                                  }
                                    
                                }


                                ?>
                                </tr>
                              
                              </tbody>
                          </table>

                  </div>
                </div>
            </div>
            <div class="col-md-8">
              <div class="panel panel-default">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover" id="myTable">
                          <tbody>   
                             
                              @foreach ($mensajes as $men) 
                               
                              <tr>
                                <th style="width: 150px;">
                                  <?php
                                  foreach ($userrs as $us) {
                                    if($us->id == $men->id){
                                      echo $us->name;
                                      
                                      
                                    }
                                  }
                                  ?>
                                  <br>
                                  {{$men->cargo}}
                                  <br>
                                  {{$men->created_at}}

                                </th>
                                <td>{{$men->mensaje}}</td>
                                  
                              </tr>

                              @endforeach
                            
                            </tbody>
                        </table>
                </div>
              </div>
            </div>


        </div>
      </div>

    </div>
@endsection

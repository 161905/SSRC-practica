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

FORM.tr:nth-child(even) {background-color: #f2f2f2;}
DIV.tr:nth-child(even) {background-color: #f2f2f2;}

FORM.tr:hover, DIV.tr:hover
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
                                <th scope="row">Correo</th>
                                <td>
                                    <?php
                                    foreach ($userrs as $us) {
                                        if($us->id == $solis ->idSolicitante){
                                            echo "{$us->email}";
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
                              
                              @foreach($userrs as $us)
                              @if($us->id == $solis->idSolicitante && $us->tipo == 'CONTRATISTA')
                              <tr>
                                <th scope="row">Anexo Contrato</th>
                                <td>{{$solis->aneContrato}}</td>
                              </tr>
                              <tr>
                              <th scope="col">Compromiso de reserva</th>
                                    <td><a type="button"  href="{{Storage::url($solis->compromisoReserva)}}">Ver compromiso de reserva</a></td>
                              </tr>
                              @endif
                              @endforeach 
                                <th scope="row">Cargo</th>
                                <td>(Info. del AD)</td>
                              </tr>
                              <tr>
                                <th scope="row">Ticket GSD</th>
                                <td>{{$solis->ticketGSD}}</td>
                              </tr>

                      
                            
                            </tbody>
                        </table>

                        <form  action="{{route('solicitud.editar.update',$solis->numSol)}}" method="POST"

                          enctype="multipart/form-data" >
                        {!!method_field('PUT')!!}
                        {!!csrf_field()!!}


                        <div class="modal fade" id="confirmar" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">                                              Ingrese nuevo anexo
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                                        
                                        
                                        <input type="aneContrato" name="aneContrato" value="{{$solis->aneContrato}}">

                                     </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="anexo" value="anexo">Enviar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                            
                                <!-- /.modal-content -->
                                </div>
                                        <!-- /.modal-dialog -->
                            </div>
                        </div>

                        <div class="modal fade" id="compromiso" tabindex="" role="dialog" aria-labelledby="compromiso" aria-hidden="true">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="compromiso">                                              Ingrese nuevo compromiso de reserva
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                                        
                                        
                                        <input type="file" name="compromisoReserva">

                                     </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="compromiso" value="compromiso">Enviar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                            
                                <!-- /.modal-content -->
                                </div>
                                        <!-- /.modal-dialog -->
                            </div>
                        </div>
                                  
                                          

                      <!--button type="submit" data-toggle="modal" data-target="confirmar" class="btn btn-primary" name="rechazar" value="rechazar">Rechazar</button-->
                      @foreach($userrs as $us)
                      @if($us->id == $solis->idSolicitante && $us->tipo == 'CONTRATISTA')
                      <a type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmar">Actualizar anexo de contrato</a>
                      <br>
                      <br>
                      <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#compromiso">Actualizar compromiso de reserva</a>
                      <br>
                      <br>
                      @endif
                      @endforeach
                      <a type="button" class="btn btn-primary" href="/solicitud/enviar2/{{$solis->numSol}}">Volver</a>
                    </form>  

                </div>
              </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <h2 align="center">Recurso <strong>
                          {{$rec->nombre}}
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
                                      
                                      ?>

                                  </h4></td>
                                </tr>
                                <tr>
                                  <th scope="row"><h4><strong>Ejecutor</strong></h4></th>
                                  <td colspan="3"><h4>
                                      <?php
                                        if($rec->recid==$solis->recid){
                                            if ($rec->idEjecutor == NULL){
                                                echo "<strong>[SIN DUEÑO]</strong>";
                                            }
                                            else{
                                                foreach ($userrs as $us) {
                                                    if($us->id == $rec->idEjecutor){
                                                        echo "{$us->name}";
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
                                <!--tr>
                                  <th style="width: 350px;" scope="row">Nombre subrecurso</th>
                                  <th style="width: 100px;" scope="row">Accion</th>
                                  <th scope="row">Valor anexo</th>
                                  <th scope="row"></th>
                     
                                </tr-->
                                
                              
                              </tbody>
                          </table>
                          <div class="table">
                            @foreach($subrecs as $sub)
                             @if($sub->recid == $rec->recid && $sub->req_nota==1)
                              @foreach($SolSubI as $ssi)
                               @if($sub->subrecid == $ssi->subrecid && $solis->numSol == $ssi->numSol)
                                <form class="tr" method="POST" action="{{route('solicitud.editar.update',$solis->numSol)}}">
                                  {!!method_field('PUT')!!}
                                  {!!csrf_field()!!}
                                  <input type="hidden" name="subrecid" value="{{$sub->subrecid}}">
                                  <span class="td"><p style="position: relative; top: 60px;">{{$sub->nombre}}</p></span>
                                  <span class="td">
                                    
                                    <select style="position: relative; top: 60px;" name="accion" id="accion">
                                     |<option value="{{$ssi->accion}}">{{$ssi->accion}}</option>
                                     <option>No Seleccionar</option>
                                     <option>CREAR</option>
                                     <option>MODIFICAR</option>
                                     <option>ELIMINAR</option>
                                    </select>
                                               

                                  </span>
                                  <span class="td">
                                    <br>
                                    <strong>{{$sub->tag_nota}}</strong>
                                    <br>
                                    <textarea style="width: 200px; height: 100px;" name='tag'>{{$ssi->tag}}</textarea>
                                    <br>
                                    <br>
                                  </span>
                                  <span class="td">
                                    <button style="position: relative; top: 60px;" type="submit" class="btn btn-danger" name="actualizar" value="actualizar">Editar</button>
                                  </span>
                                </form>
                                @endif
                              @endforeach
                             @endif
                            @if($sub->recid == $rec->recid && $sub->req_nota==0)
                              @foreach($SolSubI as $ssi)
                               @if($sub->subrecid == $ssi->subrecid && $solis->numSol == $ssi->numSol)
                                <form class="tr" method="POST" action="{{route('solicitud.editar.update',$solis->numSol)}}">
                                  {!!method_field('PUT')!!}
                                  {!!csrf_field()!!}
                                  <input type="hidden" name="subrecid" value="{{$sub->subrecid}}">
                                  <span class="td">{{$sub->nombre}}</span>
                                  <span class="td">
                                    
                                    <select style="position: relative; top: 0px;" name="accion" id="accion">
                                     |<option value="{{$ssi->accion}}">{{$ssi->accion}}</option>
                                     <option>No Seleccionar</option>
                                     <option>CREAR</option>
                                     <option>MODIFICAR</option>
                                     <option>ELIMINAR</option>
                                    </select>
                                               

                                  </span>
                                  <!--span class="td">
                                    <br>
                                    <textarea style="width: 200px; height: 100px;" name='tag'>{{$ssi->tag}}</textarea>
                                    <br>
                                    <br>
                                  </span-->
                                  <span class="td">
                                    <button type="submit" class="btn btn-danger" name="actualizar" value="actualizar">Editar</button>
                                  </span>
                                </form>
                                @endif
                              @endforeach
                             @endif
                            @endforeach

                            @foreach($TEST as $te)
                                @if($te->req_nota == 1)
                                <form class="tr" method="POST" action="{{route('solicitud.editar.update',$solis->numSol)}}">
                                  {!!method_field('PUT')!!}
                                  {!!csrf_field()!!}
                                  <input type="hidden" name="subrecid" value="{{$te->subrecid}}">
                                  <span class="td"><p style="position: relative; top: 60px;">{{$te->nombre}}</p></span>
                                  <span class="td">
                                    <select style="position: relative; top: 60px;" name="accion" id="accion">
                                      <option>No Seleccionar</option>
                                      <option>CREAR</option>
                                      <option>MODIFICAR</option>
                                      <option>ELIMINAR</option>
                                     </select>
                                  </span>
                                  <span class="td">
                                    <br>
                                    <strong>{{$te->tag_nota}}</strong>
                                    <textarea style="width: 200px; height: 100px;" name='tag'></textarea>
                                    <br>
                                    <br>
                                  </span>
                                  <span class="td">
                                    <button style="position: relative; top: 60px;" type="submit" class="btn btn-danger" name="crear" value="crear">Editar</button>
                                  </span>
                                </form>
                                @endif
                                @if($te->req_nota == 0)
                                <form class="tr" method="POST" action="{{route('solicitud.editar.update',$solis->numSol)}}">
                                  {!!method_field('PUT')!!}
                                  {!!csrf_field()!!}
                                  <input type="hidden" name="subrecid" value="{{$te->subrecid}}">
                                  <span class="td">{{$te->nombre}}</span>
                                  <span class="td">
                                    <select style="position: relative; top: 0px;" name="accion" id="accion">
                                      <option>No Seleccionar</option>
                                      <option>CREAR</option>
                                      <option>MODIFICAR</option>
                                      <option>ELIMINAR</option>
                                     </select>
                                  </span>
                                  <span class="td">
                                    <button type="submit" class="btn btn-danger" name="crear" value="crear">Editar</button>
                                  </span>
                                </form>
                                @endif

                            @endforeach

                          </div>

                  </div>
                </div>
            </div>
        


        </div>
      </div>

    </div>

<script type="text/javascript">
  $(function() {
    alert( $('textarea').val() );
});

</script>

@endsection

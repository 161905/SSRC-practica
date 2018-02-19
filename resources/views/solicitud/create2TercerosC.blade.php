@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
        <header>
          <h2 align="center">Recurso a solicitar: <strong>{{$recurs->nombre}}</strong></h2>
          <h4 align="center">Dueño del recurso: 
            <strong>
            <?php
            if($recurs->idAprobador == NULL)
              echo "[SIN DUEÑO]";
            else
              echo "$dueño->name";
            ?>
          </strong></h4>
        </header>

            <div class="col-md-9 col-md-offset-1">
  

        <form  action="{{route('solicitud.storeTercerosC')}}" method="POST"

                      enctype="multipart/form-data" 
                      >

                    {!!csrf_field()!!}



                    @if ($errors->any())
       
                   <div class="box box-danger box-solid">
                    
                          <div class="box-header with-border">
                                <h3 class="box-title">ERROR</h3>
                             <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                            </div>
                                            <!-- /.box-tools -->
                         </div>
                                        <!-- /.box-header -->
                    @foreach ($errors->all() as $error)
                         <div class="box-body">

                              {{$error}}
                        </div>
                    @endforeach                                <!-- /.box-body -->
                    </div>
                    @endif

                    <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dropdown">
                                      <button type="button" onclick="solicitante()" class="dropbtn">Solicitante</button>
                                        <div id="idSolicitante" class="dropdown-content">
                                          <input type="text" placeholder="Search.." id="solicitanteinput" onkeyup="filterFunctionSolicitante()">
                                          @foreach ($userNoCont as $usera )

                                            <a type="button" onclick="solicitante2('{{$usera->userid}}','{{$usera->id}}')">{{$usera->name}}</a >
                                          @endforeach
                                        </div>

                                    </div>  
                            </div>
                            <div class="col-md-1">
                                Solicitante:
                                <br>
                                <input style="
                                    border-width:0px;
                                    border:none;
                                    font-weight: 900;
                                " type="text" id="idSolicitanter" value="" readonly>  
                                <input style="
                                    border-width:0px;
                                    border:none;
                                    font-weight: 900;
                                " type="hidden" id="idSolicitanter2" name="idSolicitante" value="" readonly>  
                            
                            </div>
                        </div>
                    </div>
                    </div>

                    





                    <input type="hidden" name="idCreador" value="{{$user->id}}">
                    <input type="hidden" name="recid" value="{{$recurs->recid}}">


                    <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dropdown">
                                      <button type="button" onclick="supervisor()" class="dropbtn">Supervisor</button>
                                        <div id="idSupervisor" class="dropdown-content">
                                          <input type="text" placeholder="Search.." id="supervisorinput" onkeyup="filterFunction()">
                                          @foreach ($userrs as $usera )
                                            <a type="button" onclick="supervisor2('{{$usera->userid}}','{{$usera->id}}')">{{$usera->name}}</a >
                                          @endforeach
                                        </div>

                                    </div>  
                            </div>
                            <div class="col-md-1">
                                Supervisor:
                                <br>
                                <input style="
                                    border-width:0px;
                                    border:none;
                                    font-weight: 900;
                                " type="text" id="idSupers" value="" readonly>  
                                <input style="
                                    border-width:0px;
                                    border:none;
                                    font-weight: 900;
                                " type="hidden" id="idSupers2" name="idSupervisor" value="" readonly>  
                            
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="panel-body">
                    <div class="form-group">
                            <label for="aneContrato">Numero de Contrato</label>
                            <input style="width: 400px;" type="aneContrato" name="aneContrato" class="form-control" id="aneContrato"  placeholder="Ingresar numero de contrato">
                            {{$errors->first('aneContrato')}}
                    </div>
                    </div>

                    <div class="panel-body">
                    <div class="form-group">
                               <label for="compromisoReserva">Adjunte compromiso de reserva</label>
                               <input type="file" name="compromisoReserva">
                               <!--p class="help-block">Example block-level help text here.</p-->
                    </div>
                    </div>
                    <br>
                    <div class="panel-body">
                    <div class="form-group">
                               <a type="button"   class="btn btn-info" href="/storage/compromisoReserva.pdf">Descargar compromiso de reserva</a>
                               <!--p class="help-block">Example block-level help text here.</p-->
                    </div>
                    </div>



                    <div class="panel-body">
                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="pais">Seleccione pais:</label>
                                <select name="pais" id="pais" class="form-group">
                                    <option value="CL">CHILE</option>
                                    <option value="PE">PERU</option>
                                    <option value="[OTRO]">OTRO</option>
                                </select>
                            </div>
                        </div>
                     </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                         <thead class="thead-inverse">
                        <tr>
                          <th scope="col">ID SUBRECURSO</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Accion</th>
                          <th scope="col">Valor</th>
                        </tr>
                      </thead>
                    <tbody > 
                          @foreach ($subrecs as $sub)
                          @if($recurs->recid == $sub->recid)  
                            <tr>
                                <td>{{$sub->subrecid}}</td>
                                <td>{{$sub->nombre}}</td>
                                <td>
                                    <select name="subA-{{$sub->subrecid}}">
                                      <option value="NADA"></option>
                                      <option value="CREAR">CREAR</option>
                                      <option value="MODIFICAR">MODIFICAR</option>
                                      <option value="ELIMINAR">ELIMINAR</option>
                                    </select>
                                </td>
                                <td><input type="textarea" placeholder="Informacion adicional" name="subV-{{$sub->subrecid}}">  </td>
                                
                            </tr>
                          @endif
                          @endforeach
                      </tbody>
                  </table>

                  <button type="submit" class="btn btn-warning" name="grabar" value="grabar">Grabar</button>

                  <button type="submit" class="btn btn-success" name="enviar" value="enviar">Enviar a supervisor</button>

                  <a type="button" class="btn btn-primary" href="../../../../solicitud/createTercerosC">Volver</a>

            </form>  

            </div>
        </div>
    </div>

<script type="text/javascript">
function supervisor2(u,id) {
    $("#idSupers").val(u);
    $("#idSupers2").val(id);
}

function solicitante2(u,id) {
    $("#idSolicitanter").val(u);
    $("#idSolicitanter2").val(id);
}
</script>
@endsection

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

.myButton3 {
    -moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
    -webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
    box-shadow:inset 0px 39px 0px -24px #e67a73;
    background-color:#e4685d;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;
    border:1px solid #ffffff;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:12px;
    padding:6px 15px;
    text-decoration:none;
    text-shadow:0px 1px 0px #b23e35;
    width: 110px;
    text-align: center;
    
}
.myButton3:hover {
    background-color:#eb675e;
    width: 110px;
}
.myButton3:active {
    position:relative;
    top:1px;
    width: 110  px;
}
</style>

@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
      <!--div class="col-md-9 col-md-offset-1"-->
      <div class="col-12">
        <input type="text" id="TABLA0" onkeyup="columna0()" placeholder="Buscar por ID..">
        <input type="text" id="TABLA1" onkeyup="columna1()" placeholder="Buscar por nombre..">
        <input type="text" id="TABLA2" onkeyup="columna2()" placeholder="Buscar por RUT..">
        <input type="text" id="TABLA3" onkeyup="columna3()" placeholder="Buscar por tipo..">
        <input type="text" id="TABLA4" onkeyup="columna4()" placeholder="Buscar por perfil..">

                    <table class="table table-striped table-bordered table-hover" id="myTable">.

                      <thead class="thead-inverse">
                        <tr>
                          <th scope="col">USERID</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Rut</th>
                          <th scope="col">Tipo</th>
                          <th scope="col">Perfil</th>
                          <th scope="col">Correo</th>
                          <th scope="col">Anexo</th>
                          <th scope="col">Division</th>

                        </tr>
                      </thead>
                      <tbody > 
                          @foreach ($userrs as $usera)
                          
                          <tr>
                            <td><a class="myButton3" data-toggle="modal" data-target="#model-{{$usera->id}}">{{$usera->userid}}</a></td>
                            <td>{{$usera->name}}</td>
                            <td>{{$usera->rut}}</td>
                            <td>{{$usera->tipo}}</td>
                            <td>{{$usera->perfil}}</td>
                            <td>{{$usera->email}}</td>
                            <td>{{$usera->anexo}}</td>
                            <td>{{$usera->division}}</td>



                          </tr>
                                                    <!-- Modal -->
                                <div class="modal fade" id="model-{{ $usera->id }}" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h1 class="modal-title" id="myModalLabel">
                                                    {{$usera->userid}}
                                                </h1>
                                            </div>
                                            <div class="modal-body">
                                              <div class="table">
                                              <div class="tr">
                                                <span class="td" style="background-color: #E6E6E6;"><strong>Nombre: </strong></span>
                                                <span class="td">{{$usera->name}}</span>
                                              </div>

                                              <div class="tr">
                                                <span class="td" style="background-color: #E6E6E6;"><strong>RUT: </strong></span>
                                                <span class="td">{{$usera->rut}}</span>
                                              </div>
                                
                              

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;"><strong>CORREO: </strong></span>
                                              <span class="td">
                                              {{$usera->email}}
                                              </span>
                                            </div>

                                            <div class="tr">
                                            <span class="td"  style="background-color: #E6E6E6;">
                                              <strong>TIPO: </strong>
                                            </span>
                                            <span class="td">
                                              {{$usera->tipo}}
                                            </span>
                                           </div>


                                            <div class="tr">
                                              <span class="td"  style="background-color: #E6E6E6;"><strong>PERFIL: </strong>
                                              </span>
                                              <span class="td">
                                              {{$usera->perfil}}
                                            </span>
                                            </div>

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                              <strong>DIVISION: </strong>
                                              </span>
                                              <span class="td">
                                              {{$usera->division}}
                                            </span>
                                            </div>

                                            <div class="tr">
                                              <span class="td" style="background-color: #E6E6E6;">
                                                <strong>VALOR ANEXO: </strong>
                                              </span>
                                              <span class="td">
                                                {{$usera->anexo}}
                                              </span>
                                            </div>
                                           

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

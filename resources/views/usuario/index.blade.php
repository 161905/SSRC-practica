@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection


@section('main-content')
<div class="container">
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
                            <td>{{$usera->userid}}</a></td>
                            <td>{{$usera->name}}</td>
                            <td>{{$usera->rut}}</td>
                            <td>{{$usera->tipo}}</td>
                            <td>{{$usera->perfil}}</td>
                            <td>{{$usera->email}}</td>
                            <td>{{$usera->anexo}}</td>
                            <td>{{$usera->division}}</td>



                          </tr>
                          </a>
                  




                          @endforeach
                        </tbody>
                    </table>



      </div>
  </div>
</div>

@endsection

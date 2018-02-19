@extends('adminlte::page')

@section('htmlheader_title')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection


@section('main-content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 align="center">Crear solicitud para terceros contratistas</h1>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                              @if (isset($Funciono))
                                    <div class="box box-success box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Solicitud registrada!</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            Se a registrado su solicitud satisfactoriamente
                                        </div>
                                        <!-- /.box-body -->
                                  </div>
                              @endif   
                              @foreach($clasi as $cl)
                                <div class="dropdown">
                                      <button type="button" style="width: 1000px;" onclick="recursos({{$cl->idClasifica}})" class="dropbtn">{{$cl->nombre}}</button>
                                        <div id="{{$cl->idClasifica}}" style="width: 1000px;" class="dropdown-content" >
                                          <input type="text" style="width: 1000px;"     placeholder="Search.." id="r-{{$cl->idClasifica}}" onkeyup="filterFunction2({{$cl->idClasifica}})">
                                          @foreach ($recurs as $rec)
                                          @if($rec->idClasifica == $cl->idClasifica)
                                            <a type="button" href="/solicitud/create2TercerosC/{{$rec->recid}}">{{$rec->nombre}}</a>
                                          @endif
                                          @endforeach
                                        </div>

                                        <br><br>
                                </div>  
                              @endforeach

                            </div>
                    </div>
                </div>


        </div>
    </div>
</div>

<script type="text/javascript">
    function supervisor2(u,id) {
        $("#idSupers").val(u);
        $("#idSupers2").val(id);
    }

    function recursos2(r,r2,id) {
        $("#recids").val(r);
        $("#recids2").val(id);
        $("#recids3").html(r2);
    }

</script>






@endsection


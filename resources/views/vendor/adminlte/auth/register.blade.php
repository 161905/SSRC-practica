@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>SSRC</b></a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ingrese nombre y apellido" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    

                            <div class="col-md">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese correo" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    

                            <div class="col-md">
                                <input id="password" type="password" class="form-control" name="password" 
                                placeholder="Ingrese contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme contraseña" required>
                            </div>
                        </div>

                         <div class="form-group">

                            <div class="col-md">
                                <input id="userid" type="userid" class="form-control" name="userid" placeholder="Ingrese USERID">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-md">
                                <input id="rut" type="rut" class="form-control" name="rut" placeholder="Ingrese rut">
                            </div>
                        </div>



            
                        <div class="form-group">
                            <div class="col-md">
                                <select class="form-control" id="perfil" name="perfil" type="perfil">
                                <option selected disabled>SELECCIONE PERFIL</option>
                                  <option value="SIN PERFIL">SIN PERFIL</option>
                                  <option value="CONSULTA">CONSULTA</option>
                                  <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                  <option value="SUPERVISOR">SUPERVISOR</option>
                                  <option value="EJECUTOR">EJECUTOR</option>
                                  <option value="DUEÑO">DUEÑO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <select class="form-control" id="tipo" name="tipo" type="tipo">
                                <option selected disabled>SELECCIONE TIPO</option>
                                  <option value="INDEFINIDO">INDEFINIDO</option>
                                  <option value="EMPLEADO">EMPLEADO</option>
                                  <option value="CONTRATISTA">CONTRATISTA</option>
                                  <option value="HONORARIO">HONORARIO</option>
                                  <option value="MEMORISTA">MEMORISTA</option>
                                  <option value="APRENDIZ">APRENDIZ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <select class="form-control" id="division" name="division" type="division">
                                <option selected disabled>SELECCIONE DIVISION</option>
                                  <option value="INDEFINIDO">INDEFINIDO</option>
                                  <option value="CLSCL">CLSCL</option>
                                  <option value="CLLOB">CLLOB</option>
                                  <option value="CLCGE">CLCGE</option>
                                  <option value="CLLTOL">CLLTOL</option>
                                  <option value="CLSOL">CLSOL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <textarea id="anexo" name="anexo" type="anexo" rows="4" cols="46" placeholder="Escriba aquí su anexo"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                @include('adminlte::auth.partials.social_login')

                <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

</body>

@endsection

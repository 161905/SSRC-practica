<!-- Left side column. contains the logo and sidebar -->
<aside style="width: 300px;" class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section  class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li style="color:white; " class="header"><h4><strong>MENU</strong></h4></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span style="width: 300px" >Inicio</span></a></li>



            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span  style="width: 300px"  >Seguridad y Usuarios</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul  style="width: 300px"  class="treeview-menu">
                    <li><a href="/usuario/index">Usuarios</a></li>
                    <li><a href="#">Carga Active Directory Anglo</a></li>
                    <li><a href="#">Campos Active Directory</a></li>
                    <li><a href="#">Reemplazos</a></li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#"><i class='fa fa-table'></i> <span style="width: 300px" >Tablas Generales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul style="width: 300px"  class="treeview-menu">
                    <li><a href="/recursos/index">Recursos</a></li>
                    <li><a href="/subrecursos/index">SubRecursos</a></li>
                    <li><a href="#">Tarea de Recurso</a></li>
                    <li><a href="#">Clasificacion de Recursos</a></li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#"><i class='fa fa-send'></i> <span style="width: 300px" >Solicitudes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul  style="width: 300px" class="treeview-menu">
                    <li><a href="/solicitud/create">Crear Solicitud</a>
                    </li>
                    <li>
                        <a href="#"><i class='fa fa-send'></i> <span style="width: 300px" >Crear solicitud para tercero </span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul  style="width: 300px" class="treeview-menu">
                                <li><a href="/solicitud/createTerceros">No contratista con cuenta de red</a></li>
                                <li><a href="/solicitud/createTercerosC">Contratista con cuenta de red</a></li>
                                <li><a href="#">Sin cuenta de red</a></li>
                            </ul>
                    </li>
                    <li><a href="/solicitud/index">Consulta Solicitud</a>
                    </li>
                
                    <li>
                        <a href="#"><i class='fa fa-user'></i> <span style="width: 300px" >Mis solicitudes</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul style="width: 300px"  class="treeview-menu">
                                <li><a href="/solicitud/enviar">Editar y/o Enviar solicitud</a></li>
                                <li><a href="/solicitud/solicitudescreadas">Solicitudes creadas</a></li>
                                <li><a href="/solicitud/solicitudessolicitadas">Solicitudes solicitadas</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href="#"><i class='fa fa-user-circle'></i> <span style="width: 300px" >Supervisores</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul style="width: 300px"  class="treeview-menu">
                                <li>

                                    <a href="/solicitud/supervisor/index"><span>Aprobacion de Supervisor&nbsp;</span> <span class="label label-danger">
                                        <?php
                                        $i = 0;
                                        foreach ($SB_S as $sol) {
                                            if($sol->idSupervisor == $user->id && $sol->Estado == 'PENDIENTE DE SUPERVISOR'){
                                                $i++;
                                            }
                                        }
                                        echo $i;

                                        ?>
                                    </span></a>
                                    
                                </li>
                                <li><a href="/solicitud/index">Consulta Proceso</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href="#"><i class='glyphicon glyphicon-inbox'></i> <span style="width: 300px" >Dueño Rec. o SubRec.</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul  style="width: 300px" class="treeview-menu">
                                <li><a href="/solicitud/dueño/index"><span>Aprobacion de Recurso &nbsp; </span><span class="label label-danger">
                                        <?php
                                        $i = 0;
                                        foreach ($SB_S as $sol) {
                                            foreach ($SB_R as $rec) {
                                                if($sol->recid == $rec->recid){
                                                    if($rec->idAprobador == $user->id && $sol->Estado == 'PENDIENTE DE APROBACION DE DUEÑO RECURSO')
                                                        $i++;
                                                }
                                            }
                                        }
                                        echo $i;

                                        ?>

                                </span></a></li>
                                <li><a href="#">Aprobacion de SubRecurso</a></li>
                                <li><a href="#">Consulta Proceso</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href="#"><i class='glyphicon glyphicon-check'></i> <span style="width: 300px" >Ejecutores</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul  style="width: 300px" class="treeview-menu">
                                <li><a href="/solicitud/ejecutor/index"><span>Ejecutar Solicitud&nbsp;</span><span class="label label-danger">
                                    <?php
                                    $i = 0;
                                    foreach ($SB_S as $sol) {
                                        foreach ($SB_R as $rec) {
                                            if($sol->recid == $rec->recid){
                                                if($rec->idEjecutor == $user->id && $sol->Estado == 'PENDIENTE DE EJECUCION')
                                                    $i++;
                                            }
                                        }
                                    }
                                    echo $i;
                                    ?>
                                </span></a></li>
                                <li><a href="#">Ejecutar Tarea</a></li>
                                <li><a href="#">Consulta Proceso</a></li>
                            </ul>
                    </li>
                </ul>

                    
                    

             


            </li>
            <li ><a href="/solicitud/reportabilidad"><i class='fa fa-pie-chart'></i> <span style="width: 300px" >Reportabilidad</span></a></li>


            









        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

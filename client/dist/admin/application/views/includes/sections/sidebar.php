<div class="scrollbar-sidebar">
    <?php if(!isPhone()){?>
    <div class="app-sidebar__inner">
        <?php
            echo $this->dynamic_menu->build_menu('1',$permissions,$this->session->userdata('role'));
        ?>                          
    </div>
    <?php }?>

    <?php if(isPhone()){?>
        <?php if(role() == 1 || role() == 3){?>
        <div class="menu-parent">
            <div class="elem blue"  onclick="load_screen('','dashboard/main_dashboard','1_tag',true,'1',true)">
                
                <i class="pe-7s-rocket"></i>
                <span>Inicio</span>
            </div>
            <div class="elem" id="prestamos">
                <i class="pe-7s-cash"></i>
                <span>Préstamos</span>
            </div>
            <div class="elem menu-content menu-content--right ga-2" id="prestamos-menu">
                <ul>
                    <li><a name="Inicio" id="55_tag" onclick="load_screen(null,'prestamos','55_tag',true,'1',true)">Nuevo préstamo </a></li>
                    <li><a name="Inicio" id="57_tag" onclick="load_screen('','cobros/cobrar_view','57_tag',true,'1',true)">Cobrar Prestamo 
                    <!-- <div class="ml-auto badge badge-pill badge-danger"><span style="color:white;">N</span></div> -->
                    </a></li>
                </ul>
            </div>
            <div class="elem" id="utilidades">
                <i class="pe-7s-plugin"></i>
                <span>Utilidades</span>
            </div>
            <div class="elem" id="reportes">
                <i class="pe-7s-display1"></i>
                <span>Reportes</span>
            </div>
            <div class="elem menu-content menu-content--left ga-3" id="utilidades-menu">
                <ul>
                    <li><a id="57_tag" onclick="load_screen('','caja/caja_view','57_tag',true,'1',true)">Desembolsos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','caja/cuadre_view','57_tag',true,'1',true)">Cuadre de Caja</a></li>
                    <li><a id="57_tag" onclick="load_screen('','prestamos/calcular_view','57_tag',true,'1',true)">Calculadora</a></li>
                    <li><a id="57_tag" onclick="load_screen('','contrato/documentos_view','57_tag',true,'1',true)">Documentos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','rutas/orden_ruta_view','57_tag',true,'1',true)">Gestion de Rutas</a></li>
                    <li><a id="57_tag" onclick="load_screen('','clientes/credit_notes','57_tag',true,'1',true)">Notas de Crédito</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/geolocation','57_tag',true,'1',true)">Geolocación</a></li>
                </ul>
            </div>
            <div class="elem menu-content menu-content--right ga-3" id="reportes-menu">
                <ul>
                    <li><a id="57_tag" onclick="load_screen('','reports/reporte_ingresos','57_tag',true,'1',true)">De cuotas</a></li>
                    <li><a id="57_tag" onclick="load_screen('','caja/report_cuadres_view','57_tag',true,'1',true)">De cuadres</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/prestamos_view','57_tag',true,'1',true)">De préstamos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/clientes_view','57_tag',true,'1',true)">De clientes</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/cobranzas_view','57_tag',true,'1',true)">De cobranzas</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/cartera','57_tag',true,'1',true)">Cartera de préstamos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/estado_cuentas','57_tag',true,'1',true)">Estado cuentas</a></li>
                </ul>
            </div>
            <div class="elem" id="empresa">
                <i class="pe-7s-config"></i>
                <span>Mi Empresa</span>

            </div>
            <div class="elem" id="ayuda">
                <i class="pe-7s-help2"></i>
                <span>Ayuda</span>
            </div>
            <div class="elem menu-content menu-content--left ga-4" id="empresa-menu">
                <ul>
                    <li><a id="53_tag" onclick="load_screen('','clientes/clientes_view','53_tag',true,'1',true)">Clientes</a></li>
                    <li><a id="59_tag" onclick="load_screen('','rutas/rutas_view','59_tag',true,'1',true)">Rutas</a></li>
                    <li><a id="3_tag" onclick="load_screen('','configuration/users_view','3_tag',true,'1',true)">Usuarios</a></li>
                    <li><a id="3_tag" onclick="miEmpresa()">Configuración</a></li>
                    <?php if(role() == 3){?>
                    <li><a id="3_tag" onclick="load_screen('','roles/index','3_tag',true,'1',true)">Roles</a></li>
                    <li><a id="3_tag" onclick="load_screen('','configuration/empresas_view','3_tag',true,'1',true)">Empresas</a></li>
                    <li><a id="3_tag" onclick="load_screen('','configuration/leads_view','3_tag',true,'1',true)">Leads</a></li>
                    <?php }?>
                </ul>
            </div>
            <div class="elem menu-content menu-content--right ga-4" id="ayuda-menu">
                <ul>
                    <li><a id="74_tag" onclick="load_screen('','tutorials/index','74_tag',true,'1',true)">Tutoriales</a></li>
                </ul>
            </div>
        </div>
        <?php } elseif(role() == 5) {?>     
        <div class="menu-parent">
            <div class="elem blue"  onclick="load_screen('','dashboard/main_dashboard','1_tag',true,'1',true)">
                
                <i class="pe-7s-rocket"></i>
                <span>Inicio</span>
            </div>
            <div class="elem" id="prestamos">
                <i class="pe-7s-cash"></i>
                <span>Préstamos</span>
            </div>
            <div class="elem menu-content menu-content--right ga-2" id="prestamos-menu">
                <ul>
                    <li><a name="Inicio" id="55_tag" onclick="load_screen(null,'prestamos','55_tag',true,'1',true)">Nuevo préstamo</a></li>
                    <li><a name="Inicio" id="57_tag" onclick="load_screen('','cobros/cobrar_view','57_tag',true,'1',true)">Cobrar Prestamo</a></li>
                </ul>
            </div>
            <div class="elem" id="utilidades">
                <i class="pe-7s-plugin"></i>
                <span>Utilidades</span>
            </div>
            <div class="elem" id="reportes">
                <i class="pe-7s-display1"></i>
                <span>Reportes</span>
            </div>
            <div class="elem menu-content menu-content--left ga-3" id="utilidades-menu">
                <ul>
                    <li><a id="57_tag" onclick="load_screen('','caja/caja_view','57_tag',true,'1',true)">Desembolsos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','prestamos/calcular_view','57_tag',true,'1',true)">Calculadora</a></li>
                    <li><a id="57_tag" onclick="load_screen('','contrato/documentos_view','57_tag',true,'1',true)">Documentos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','rutas/orden_ruta_view','57_tag',true,'1',true)">Gestion de Rutas</a></li>
                </ul>
            </div>
            <div class="elem menu-content menu-content--right ga-3" id="reportes-menu">
                <ul>
                    <li><a id="57_tag" onclick="load_screen('','reports/reporte_ingresos','57_tag',true,'1',true)">De cuotas</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/prestamos_view','57_tag',true,'1',true)">De préstamos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/clientes_view','57_tag',true,'1',true)">De clientes</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/cobranzas_view','57_tag',true,'1',true)">De cobranzas</a></li>
                    <li><a id="57_tag" onclick="load_screen('','reports/estado_cuentas','57_tag',true,'1',true)">Estado cuentas</a></li>
                </ul>
            </div>
            <div class="elem" id="empresa">
                <i class="pe-7s-config"></i>
                <span>Mi Empresa</span>

            </div>
            <div class="elem" id="ayuda">
                <i class="pe-7s-help2"></i>
                <span>Ayuda</span>
            </div>
            <div class="elem menu-content menu-content--left ga-4" id="empresa-menu">
                <ul>
                    <li><a id="53_tag" onclick="load_screen('','clientes/clientes_view','53_tag',true,'1',true)">Clientes</a></li>
                    <li><a id="59_tag" onclick="load_screen('','rutas/rutas_view','59_tag',true,'1',true)">Rutas</a></li>
                </ul>
            </div>
            <div class="elem menu-content menu-content--right ga-4" id="ayuda-menu">
                <ul>
                    <li><a id="74_tag" onclick="load_screen('','tutorials/index','74_tag',true,'1',true)">Tutoriales</a></li>
                </ul>
            </div>
        </div>                   
        <?php } else {?>
            <div class="menu-parent">
            <div class="elem blue" id="prestamos" onclick="load_screen('','cobros/cobrar_view','57_tag',true,'1',true)">
                <i class="pe-7s-cash"></i>
                <span>Cobros</span>
            </div>
            <div class="elem" id="reportes">
                <i class="pe-7s-display1"></i>
                <span>Reportes</span>
            </div>
            <div class="elem menu-content menu-content--right ga-3" id="reportes-menu">
                <ul>
                    <li><a id="57_tag" onclick="load_screen('','reports/prestamos_view','57_tag',true,'1',true)">De préstamos</a></li>
                    <li><a id="57_tag" onclick="load_screen('','clientes/clientes_view','57_tag',true,'1',true)">De clientes</a></li>
                </ul>
            </div>
        </div>              
        <?php }?>
    <?php }?>
</div>
</div>
<div class="app-main__outer">
    <div class="app-main__inner">
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $this->session->userdata('empresa_nombre');?> | Mi oficina</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="App para la gestión financiera para PYMES.">
    <style>
    .app-sidebar .scrollbar-sidebar {
        z-index: 105000!important;
        width: 100%;
    }
    .sidebar-mobile-open .app-sidebar {
        transform: translateX(0);
    }
    .menu-parent {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: auto;
            grid-column-gap: 20px;
            grid-row-gap: 20px;
            padding: 14px;
        }

        .menu-parent .elem {
            min-height: 150px;
            background-color: #ffffff;
            padding: 16px 24px;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 6px 20px 0px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .menu-parent .elem.blue {
            background-image: linear-gradient(#365bb9, #4c7af0);
            color: #ffffff;
        }

        .menu-parent .elem.purple {
            background-image: linear-gradient(to bottom, #c471f5 0%, #fa71cd 100%);
            color: #ffffff;
        }

        .menu-parent .elem.red {
            background-image: linear-gradient(to bottom, #ff0844 0%, #ff4574 100%);
            color: #ffffff;
        }

        .menu-parent .elem.green {
            background-image: linear-gradient(to top, #76f8be 0%, #50A7C2 100%);
            color: #ffffff;
        }


        .menu-parent .elem i {
            font-size: 48px;
        }

        .menu-parent .elem ul {
            padding: 0;
            margin: 0;
            transition: 350ms;
            list-style: none;
            width: 100%;
            text-align: center;
        }

        .menu-parent .elem:hover ul {
            bottom: 0;
            opacity: 1;
        }

        .menu-parent .elem ul li:not(:nth-child(1)) {
            margin-top: 12px;
        }

        .menu-parent .elem ul li a {
            text-decoration: none;
            color: black;
            opacity: 0.8;
            padding: 8px 0;
            font-size: 18px;
            display: block
        }

        .menu-parent .elem ul li a:active { 
            background: aliceblue;
        }
        .menu-parent .elem span {
            font-size: 20px;
            font-weight: 300;
        }

        .menu-parent .elem.menu-content {
            min-height: auto !important;
            position: relative;
            transform: translateY(-20px);
            opacity: 0;
            position: absolute;
            pointer-events: none;
        }
        .visibleMenuItem {
            opacity: 1 !important;
            transform: translateY(0px) !important;
            position: relative !important;
            pointer-events: all !important;
            transition: 300ms;
        }
        .menu-parent .elem.menu-content.ga-2 {
            grid-area: 2 / 1 / 2 / 3;
        }

        .menu-parent .elem.menu-content.ga-3 {
            grid-area: 3 / 1 / 3 / 3;
        }

        .menu-parent .elem.menu-content.ga-4 {
            grid-area: 4 / 1 / 4 / 3;
        }

        .menu-content.menu-content--right::after {
            content: '';
            position: absolute;
            right: 15%;
            top: -10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #fff;
            clear: both;
        }

        .menu-content.menu-content--left::after {
            content: '';
            position: absolute;
            left: 15%;
            top: -10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #fff;
            clear: both;
        }
        <?php if(isPhone()){?>
        html, body {
        overflow-x: hidden;
        }
        body {
        position: relative
        }
        <?php }?>
    </style>
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo $this->load->assets('main.css');?>" rel="stylesheet">
    <link href="<?php echo $this->load->assets('css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo $this->load->assets('css/sweetalert.css');?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->load->assets('css/fileinput.min.css');?>">
    <link href="<?php echo $this->load->assets("js/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo $this->load->assets("css/bootstrap-datepicker3.css"); ?>" rel="stylesheet">
    <link href="<?php echo $this->load->assets("js/plugins/select2/select2.min.css"); ?>" rel="stylesheet">  
    <link href="<?php echo $this->load->assets("js/plugins/semantic/semantic.min.css"); ?>" rel="stylesheet">  
    <link href="<?php echo $this->load->assets("js/plugins/intro/intro.min.css"); ?>" rel="stylesheet">  
    <link rel="stylesheet" href="<?php echo $this->load->assets('css/common.loading.css'); ?>">  
    <link rel="stylesheet" href="<?php echo $this->load->assets('css/bootstrap-dialog.css'); ?>">  
    <link rel="stylesheet" href="<?php echo $this->load->assets('js/plugins/toast/toast.min.css'); ?>">  
    <link rel="shortcut icon" href="<?= $this->load->assets('images/favicon.png');?>">
    <!-- <script src="<?= base_url()?>OneSignalSDK.js" async='async'></script> -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
      <?php if(($this->session->userdata('role') == 1 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 5) && $this->config->item('is_live')){?>
      var OneSignal = window.OneSignal || [];
    //   OneSignal.push(["init", {
    //     appId: "9fa6fc8f-1349-4ec5-b878-e7c78b6555d6",
    //     autoRegister: true, /* Set to true to automatically prompt visitors */
    //     notifyButton: {
    //         enable: false /* Set to false to hide */
    //     }
    //   }]);

      OneSignal.push(function() {
        OneSignal.init({
            appId: "9fa6fc8f-1349-4ec5-b878-e7c78b6555d6",
        });
        OneSignal.sendTag("empresa_id", "<?= $this->session->userdata('empresa_id');?>"); 
      });
      <?php }?>
    </script>     
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <?php if(role() !== 4){?>
                    <div class="search-wrapper ui search">
                        <div class="input-holder">
                            <input type="text" class="search-input prompt" placeholder="NOMBRE | CÉDULA | ID">
                            <button class="search-icon" data-step="1" data-intro=""><span>
                            </span></button>
                        </div>
                        <div class="results"></div>
                        <button class="close"></button>
                    </div>
                    <?php }?>


                    <ul class="header-menu nav">
                        <li class="nav-item">
                                <?php 
                                    $empresa = get_empresa();
                                    if($this->session->userdata('day_billed') && $this->session->userdata('plan_id') !== 4 && $empresa['empresa']->auto_billed !== '1'){
                                        if((int)date('d') === ($this->session->userdata('day_billed') - 1) && (role() == 1 || role() == 3  || role() == 5) ){
                                            //Es un dia antes 
                                            //var_dump( $empresa);die;
                                            $data = $this->db->select('empresas_payments.*')->from('empresas_payments')->where(array('empresas_payments.empresa_id'=>empresa_id(),'month'=>date('m')))->get()->row();
                                            if(!$data){
                                                if(role() == 5){
                                                    echo '<a href="javascript:alert(\'Para realizar pagos, debe de ser un administrador.\');" class="nav-link"><span style="background: antiquewhite;">'.''. "Manana se vence su factura. Click aquí para realizar su pago.<span></a>";
                                                } else {
                                                    echo '<a href="javascript:plans();" class="nav-link"><span style="background: antiquewhite;">'.''. "Manana se vence su factura. Click aquí para realizar su pago.<span></a>";
                                                }
                                            } else {
                                                echo '<a href="javascript:plans();" class="nav-link">'.$this->session->userdata('empresa_nombre').'</a>';
                                            }
                                        } else if((int)date('d') === ($this->session->userdata('day_billed')) && (role() == 1 || role() == 3  || role() == 5) ){
                                            //Es el dia del pago
                                            //var_dump( $empresa);die;
                                            $data = $this->db->select('empresas_payments.*')->from('empresas_payments')->where(array('empresas_payments.empresa_id'=>empresa_id(),'month'=>date('m')))->get()->row();
                                            if(!$data){
                                                if(role() == 5){
                                                    echo '<a href="javascript:alert(\'Para realizar pagos, debe de ser un administrador.\');" class="nav-link"><span style="background: antiquewhite;">'.''. "Su factura esta vencida. Click aquí para realizar su pago.<span></a>";
                                                } else {
                                                    echo '<a href="javascript:plans();" class="nav-link"><span style="background: antiquewhite;">'.''. "Su factura esta vencida. Click aquí para realizar su pago.<span></a>";
                                                }
                                                
                                            } else {
                                                echo '<a href="javascript:plans();" class="nav-link">'.$this->session->userdata('empresa_nombre').'</a>';
                                            }
                                        } else {
                                            //miEmpresa()
                                            if(role() == 1 || role() == 3){
                                                echo '<a href="javascript:miEmpresa()" class="nav-link">'.$this->session->userdata('empresa_nombre').'</a>';
                                            }
                                            else {
                                                echo '<a href="#" class="nav-link">'.$this->session->userdata('empresa_nombre').'</a>';
                                            }
                                        }
                                    } else {
                                        if($this->session->userdata('plan_id') == 4){
                                            echo '<a href="javascript:plans();" class="nav-link">'.$this->session->userdata('empresa_nombre').'</a>';
                                        } else {
                                            echo '<a href="#" class="nav-link">'.$this->session->userdata('empresa_nombre').'</a>';
                                        }
                                        
                                    }
                                ?>
                                                        
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <?php if(!isPhone()){ ?>
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="<?php echo $this->load->assets('img/favicon_image.png');?>"
                                                alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <?php if(role() == 1 || role() == 3){?>
                                            <h6 tabindex="-1" class="dropdown-header">CONFIGURACIÓN</h6>
                                            <button type="button" tabindex="0" class="dropdown-item" onclick="miEmpresa()" href="#">Empresa</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <?php }?>
                                            <a href="<?= base_url('session/logout'); ?>" tabindex="0" style="text-decoration: none;"><button type="button" tabindex="0" class="dropdown-item">Salir de
                                                oficina</button></a>
                                            
                                        </div>
                                        <?php } else {?>
                                            <a href="<?= base_url('session/logout'); ?>" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="<?php echo $this->load->assets('img/logout.jpg');?>"
                                                alt="">
                                        </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                      <?= strtoupper($this->session->userdata('username'));?>
                                    </div>
                                    <div class="widget-subheading">
                                      <?= $this->session->userdata('rol_name');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow" style="    z-index: 9999;">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
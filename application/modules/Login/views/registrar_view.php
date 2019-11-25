<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SITTEL - PERU</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url('assets')?>/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!--LINKS STYLES-->
    <!-- Bootstrap Core Css -->
    <link href="<?=base_url('assets')?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?=base_url('assets')?>/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?=base_url('assets')?>/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Colorpicker Css -->
    <link href="<?=base_url('assets')?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="<?=base_url('assets')?>/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Multi Select Css -->
    <link href="<?=base_url('assets')?>/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <!-- Bootstrap Spinner Css -->
    <link href="<?=base_url('assets')?>/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
    <!-- Bootstrap Tagsinput Css -->
    <link href="<?=base_url('assets')?>/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="<?=base_url('assets')?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- noUISlider Css -->
    <link href="<?=base_url('assets')?>/plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=base_url('assets')?>/css/themes/all-themes.css" rel="stylesheet" />
    <!-- Sweetalert Css -->
    <link href="<?=base_url('assets')?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>

<body class="theme-blue-grey">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-indigo">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Un momento...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid" >
            <div class="navbar-header" >
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?=base_url()?>">SITTEL - PERU</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse" >

                <ul class="nav navbar-nav navbar-right" style="padding: 0;margin-top: -5px">
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" style="display: none;">
            <!-- User Info -->
            <div class="user-info" >
                <div class="image">
                    <img src="<?=base_url('assets')?>/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="email"><?=$this->session->userdata('s_user')->usuario_email?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu" >
                <ul class="list">
                    <li class="header">MENU DE NAVEGACION</li>
                    <li class="active">
                        <a href="<?=base_url()?>">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="version">
                    <b>Version: </b> 1.0.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid" style="position: absolute;left: 0; width: 100%;">
            <form id="form">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTRAR AL SINDICATO FETRATEL
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Datos Principales:</h2>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Apellidos *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" value="<?=$user->persona_apellidos ?>" disabled name="apellido">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Nombres *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" value="<?=$user->persona_nombres ?>" disabled name="nombre">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            DNI *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" value="<?=$user->persona_numdocumento ?>" disabled name="numerodocumento">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Email Personal *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" value="<?=$user->persona_emailpersonal ?>" disabled name="emailpersonal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Email Fetratel *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" value="<?=$user->persona_emailcorporativo ?>" disabled name="emailfetratel">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                            </div>

                            <h2 class="card-inside-title">Datos Secundarios:</h2>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Tel. Fijo *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="teleffijo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Tel. Movil *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="telefmovil">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Tel. Corporativo *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="telefonocorporativo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Empresa *
                                        </span>
                                        <select class="form-control show-tick" data-live-search="true" name="empresa">
                                        <option value="0">SELECCIONE</option>
                                        <?php for ($i=0; $i < count($empresa); $i++) { ?> 
                                        <option value=""><?=strtoupper($empresa[$i]->empresa_nombre)?></option> 
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Cargo *
                                        </span>
                                        <select class="form-control show-tick" data-live-search="true" name="cargo">
                                        <option value="0">SELECCIONE</option>
                                        <option value="">DIRECTOR</option>
                                        <option value="">GERENTE GENERAL</option>
                                        <option value="">GERENTE</option>
                                        <option value="">EMPLEADO</option>
                                        <option value="">FUNCIONARIO</option>
                                        <option value="">EJECUTIVO</option>
                                        <option value="">PROPIETARIO</option>
                                        <option value="">NO REGISTRADO</option>
                                        <option value="">OTROS</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Hijos *
                                        </span>
                                        <select class="form-control show-tick" data-live-search="true" name="hijos">
                                        <option value="0">SELECCIONE</option>
                                        <!--********************************KENY PONTE**************************-->
                                         <?php 
                                            for ($i=0; $i <=10; $i++) { 
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                         ?>
                                         <!--********************************KENY PONTE**************************-->
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Gerencia Jefatura *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="gerenciajefatura">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Grado de Instrucción *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="gradoinstruccion">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            CIP *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="cip">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h2 class="card-inside-title">Accesos al Sistema:</h2>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Usuario *
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" value="<?=$user->usuario_email?>" disabled name="usuario">
                                            <input type="hidden" id="token" name="token" value="<?=$user->usuario_token?>">
                                            <input type="hidden" name="iduser" value="<?=$user->persona_id?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Contraseña *
                                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control date" name="clave">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button class="btn btn-info btn-lg btn-block" onclick="register()">REGISTRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>
    <script>var baseurl = '<?=base_url()?>';</script>
    <script src="<?=base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap Core Js -->
 <script src="<?=base_url('assets')?>/plugins/bootstrap/js/bootstrap.js"></script>
 <!-- Select Plugin Js -->
 <script src="<?=base_url('assets')?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 <!-- Slimscroll Plugin Js -->
 <script src="<?=base_url('assets')?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
 <!-- Bootstrap Notify Plugin Js -->
 <script src="<?=base_url('assets')?>/plugins/bootstrap-notify/bootstrap-notify.js"></script>
 <!-- Waves Effect Plugin Js -->
 <script src="<?=base_url('assets')?>/plugins/node-waves/waves.js"></script>
 <!-- SweetAlert Plugin Js -->
 <script src="<?=base_url('assets')?>/plugins/sweetalert/sweetalert.min.js"></script>
 <!-- Autosize Plugin Js -->
 <script src="<?=base_url('assets')?>/plugins/autosize/autosize.js"></script>
<!-- Moment Plugin Js -->
<script src="<?=base_url('assets')?>/plugins/momentjs/moment.js"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?=base_url('assets')?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- Custom Js -->
<script src="<?=base_url('assets')?>/js/admin.js"></script>
<script src="<?=base_url('assets')?>/js/pages/forms/basic-form-elements.js"></script>    
<!-- Demo Js -->
<script src="<?=base_url('assets')?>/js/demo.js"></script>
</body>
<script>
var baseurl = '<?=base_url()?>';
function register()
{
    var frm = $("#form").serialize();  
    var r = confirm('Seguro que desea guardar los datos actuales?');
    if (r) {
        $.ajax({
        type:'POST',
        url: baseurl+'Login/upLastRegister',
        data: frm,
        success:function(json){
            window.location.href = baseurl;
        }
    })
    }
}    

</script>
</html>
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
                    	<input type="hidden" value="<?=$user->usuario_id?>" id="id">
                        <div class="header">
                            <h2>
                                INVITACIÓN A SINDICATO FETRATEL
                            </h2>
                        </div>
                        <div class="body">
                        	<h1>
                        		<center>
                        			SU CUENTA FUE CONFIRMADA Y LA CONTRASEÑA <br> SE ENVIARA A SU EMAIL.
                        		</center>
                        	</h1>
                        	<hr>
                        	<p>
                        		<center><button class="btn btn-info btn-lg" id="btn-enviarPass">ENVIAR CONTRASEÑA</button></center>
                        	</p>
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
<script>
	var baseurl = '<?=base_url()?>';
	$("#btn-enviarPass").click(function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url: baseurl+'Login/confirmarUse',
			data: { cod : $("#id").val()},
			success: function(json){
				location.reload();
			}
		})
	})
</script>
</body>
</html>
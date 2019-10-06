<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=$title_page?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url('assets')?>/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!--LINKS STYLES-->
    <?=$this->load->view($links)?>
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
                <a class="navbar-brand" href="<?=base_url()?>"><?=$title_page?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse" >

                <ul class="nav navbar-nav navbar-right" style="padding: 0;margin-top: -5px">
                    <?php if ($this->session->userdata('s_user')->usuario_rol == 1): ?>
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">build</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">ADMINISTRACION</li>
                            <li class="body" style="height: 100px;">
                                <ul class="menu">
                                    <!--li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Ajustes Generales</h4>
                                                <p>
                                                    <i class="material-icons">label</i> General Settings
                                                </p>
                                            </div>
                                        </a>
                                    </li-->
                                    <li>
                                        <a href="<?=base_url('Quejas')?>">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Buzón de quejas</h4>
                                                <p>
                                                    <i class="material-icons">label</i> Mailbox
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <!--<li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Panel de administradores</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>-->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <?php endif ?>
                    <!-- Settings -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">OPCIONES</li>
                            <li class="body" style="height: 150px;">
                                <ul class="menu">
                                    <li>
                                        <a href="<?=base_url('ChangePassword')?>">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">lock</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Cambiar contraseña</h4>
                                                <p>
                                                    <i class="material-icons">label</i> Change password
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('Contactar')?>">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">announcement</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Contactar al administrador</h4>
                                                <p>
                                                    <i class="material-icons">label</i> Contact the administrator
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('Principal')?>/closesession">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">input</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Salir</h4>
                                                <p>
                                                    <i class="material-icons">label</i> Sign out
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" >
                <div class="image">
                    <img src="<?=base_url('assets')?>/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata('s_user')->usuario_nombre?></div>
                    <div class="email"><?=$this->session->userdata('s_user')->usuario_email?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU DE NAVEGACION</li>
                    <li class="active">
                        <a href="<?=base_url()?>" target="_blank">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('s_user')->usuario_rol == 1): ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">apps</i>
                            <span>Mantenimiento</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a target="_blank" href="<?=base_url('Mafiliado')?>">Afiliados</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mempresa')?>/registrarcargo">Cargos</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mempresa')?>">Empresas</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Msecretaria')?>">Secretarias</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mdocumentos')?>/subtema">Subtemas</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mdocumentos')?>">Temas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">format_list_bulleted</i>
                            <span>Listado</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a target="_blank" href="<?=base_url('Mafiliado')?>/listar">Afiliados</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mempresa')?>/listarcargo">Cargos</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mempresa')?>/listar">Empresas</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Msecretaria')?>/listar">Secretarias</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mdocumentos')?>/sublistar">Subtemas</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Mdocumentos')?>/listar">Temas</a>
                            </li>
                        </ul>
                    </li>    
                    <?php endif ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">mail</i>
                            <span>Tickets</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a target="_blank" href="<?=base_url('Ticket')?>">Nuevo Ticket</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Ticket')?>/listar/0">Enviados</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?=base_url('Ticket')?>/listar/1">Recibidos</a>
                            </li>
                           	<?php if ($this->session->userdata('s_user')->usuario_rol == 1): ?>
                            <li>
                                <a target="_blank" href="<?=base_url('Ticket')?>/listadoAdmin">General</a>
                            </li>
                            <?php endif ?>
                        </ul>
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
        <div class="container-fluid">
            <?= $this->load->view($content_view)?>
        </div>
    </section>
    <script>var baseurl = '<?=base_url()?>';</script>
    <script src="<?=base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
    <?=$this->load->view($scripts)?>
</body>
</html>
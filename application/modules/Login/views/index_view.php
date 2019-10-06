<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Iniciar Sesion | SITTEL PERU</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url('assets')?>/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url('assets')?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url('assets')?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url('assets')?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SITTEL<b> PERU</b></a>
            <small>Sistema Gestion de Tickets</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?=base_url('Login')?>/verificar">
                    <div class="msg">Ingresa tu cuenta para iniciar sesion</div>
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus value="<?=(isset($_COOKIE["member_login"])) ? $_COOKIE["member_login"] : '' ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required value="<?=(isset($_COOKIE["member_pass"])) ? $_COOKIE["member_pass"] : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-teal" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> >
                            <label for="rememberme">Recordarme</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-teal waves-effect" type="submit">INGRESAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-4">
                            <a href="sign-up.html"></a>
                        </div>
                        <div class="col-xs-8 align-right">
                            <a href="<?=base_url('Login')?>/recuperar">Olvidaste tu contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="<?=base_url('assets')?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url('assets')?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url('assets')?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url('assets')?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url('assets')?>/js/admin.js"></script>
    <script src="<?=base_url('assets')?>/js/pages/examples/sign-in.js"></script>
</body>
</html>
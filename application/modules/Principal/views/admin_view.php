<div class="block-header">
     <h2>Registro de tickets</h2>
</div>
<!-- Widgets -->
<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect" onclick="total_tickets()" >
                        <div class="icon">
                            <i class="material-icons">send</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL DE TICKETS GENERADOS</div>
                            <div class="number count-to" data-from="0" data-to="<?=$pendientes+$procesando+$cerrado?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect" onclick="pendientes()" >
                        <div class="icon">
                            <i class="material-icons">send</i>
                        </div>
                        <div class="content">
                            <div class="text">TICKETS PENDIENTES</div>
                            <div class="number count-to" data-from="0" data-to="<?=$pendientes?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect"  onclick="proceso()" >
                        <div class="icon">
                            <i class="material-icons">mail</i>
                        </div>
                        <div class="content">
                            <div class="text">TICKETS EN PROCESO</div>
                            <div class="number count-to" data-from="0" data-to="<?=$procesando?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect" onclick="resueltos()" >
                        <div class="icon">
                            <i class="material-icons">drafts</i>
                        </div>
                        <div class="content">
                            <div class="text">TICKETS RESUELTOS</div>
                            <div class="number count-to" data-from="0" data-to="<?=$cerrado?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect" onclick="usuarios()" >
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">USUARIOS</div>
                            <div class="number count-to" data-from="0" data-to="<?=$usuarios?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect" onclick="afiliados()" >
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">AFILIADOS</div>
                            <div class="number count-to" data-from="0" data-to="<?=$afiliados?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect" onclick="actividad()" >
                        <div class="icon">
                            <i class="material-icons">activity</i>
                        </div>
                        <div class="content">
                            <div class="text">ACTIVIDAD</div>
                            <div class="number count-to" data-from="0" data-to="<?=$actividad?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>                 
</div>
<!-- #END# Widgets -->

<div class="row">
    <h1 style="color: gray">Cuadro estadistico</h1>
    <hr>
    <div class="col-lg-6 col-md-6 col-xs-12" >
        <canvas id="myChart0" width="400" height="300" style="background: #fff;"></canvas>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12" >
        <canvas id="myChart1" width="400" height="300" style="background: #fff;"></canvas>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12" >&nbsp</div>

    <div class="col-lg-6 col-md-6 col-xs-12" >
        <canvas id="myChart2" width="400" height="300" style="background: #fff;"></canvas>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12" >
        <canvas id="myChart3" width="400" height="300" style="background: #fff;"></canvas>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12" >&nbsp</div>

    <div class="col-lg-6 col-md-6 col-xs-12" >
        <canvas id="myChart4" width="400" height="300" style="background: #fff;"></canvas>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12" >
        <canvas id="myChart5" width="400" height="300" style="background: #fff;"></canvas>
    </div>
</div>

<script>

    function total_tickets() {
        window.open('<?=base_url('Principal')."/generarExcelTotalTickets"?>', '_blank');
    }

    function proceso() {
        window.open('<?=base_url('Principal')."/generarExcelTicketsProcesados"?>', '_blank');
    }

    function pendientes() {
        window.open('<?=base_url('Principal')."/generarExcelTicketsPendientes"?>', '_blank');
    }

    function resueltos() {
        window.open('<?=base_url('Principal')."/generarExcelTicketsCerrados"?>', '_blank');
    }

    function usuarios() {
        window.open('<?=base_url('Principal')."/generarExcelUsuarios"?>', '_blank');
    }
    function afiliados() {
        window.open('<?=base_url('Principal')."/generarExcelAfiliados"?>', '_blank');
    }
    function actividad() {
        window.open('<?=base_url('Principal')."/generarExcelActividad"?>', '_blank');
    }

    var baseURL = '<?= base_url()?>';
</script>
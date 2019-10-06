<?php 
$tipo_user = $this->session->userdata('s_user')->usuario_rol ;
    switch ($tipo_user) {
        case '1':
    $nombre = strtoupper($this->session->userdata('s_user')->usuario_nombre);        
        break;
        case '2':
    $nombre = strtoupper($this->session->userdata('s_persona')->cargo_descripcion);        
        break;
        case '3':
    $nombre = strtoupper($this->session->userdata('s_persona')->secretaria_encargado);;        
        break;
        case '4':
    $nombre = strtoupper($this->session->userdata('s_persona')->persona_nombres);;        
        break;
}
$codigo_user = $this->session->userdata('s_user')->usuario_id;
function Dias($start) { 
  $date = date_format(date_create($start),'Y-m-d');
  $start_ts = strtotime($date); 
  $end_ts = strtotime(date('Y-m-d')); 
  $diff = $end_ts - $start_ts; 
  return round($diff / 86400); 
} 
function ordenFecha($fecha){
$date = date_create($fecha);
$fecha=date_format($date, 'd-m-Y g:i A');
return $fecha;
}
?>
<style>
  .span_mensaje{
    font-size: 12.025px;
    white-space: nowrap;
    color: #ffffff;
    background-color: #999999;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    padding: 1px 3px 2px 3px;
  }
  .bsuccess{    
    background-color: #5cb85c;
  }
  .bwarning{
    background-color: #d9534f;
  }
  .binfo{
    background-color: #428bca;
  }
  .bdefault{
    background-color: gray;
  }
</style>
<table id="ticketlist" class="table table-bordered table-striped">
  <thead>
    <tr>                              
      <th># Ticket</th>
      <th>Remitente</th>
      <th>Destinatario</th>
      <th>Entidad</th>
      <th>Tema</th>
      <th>Sub Tema</th>
      <th>Asunto</th>
      <th>Fecha Envio</th>
      <th>Dias</th>
      <th>Estado</th>
      <!--<th></th>-->
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if (count($listado) > 0) {
    $c = 1;
      for ($i=0; $i < count($listado); $i++) { 
  ?>
    <tr>
      <td><?=$listado[$i]->ticket_numero?></td>
      <td><?=$usuario[$listado[$i]->actividad_origen]?></td>
      <td><?=$usuario[$listado[$i]->actividad_destino]?></td>
      <td><?=$listado[$i]->usuario_entidad?></td>
      <td><?=$listado[$i]->tema_detalle?></td>
      <td><?=$listado[$i]->subtema_detalle?></td>
      <td><?=$listado[$i]->ticket_asunto?></td>
      <td><?=ordenFecha($listado[$i]->actividad_fechareg)?></td>
      <td><?=Dias($listado[$i]->actividad_fechareg)?></td>
      <td>
        <?php 
        switch ($listado[$i]->ticket_estado) {
          case '1':
            if (Dias($listado[$i]->actividad_fechareg) <= 1) {
              echo "<span class='span_mensaje bsuccess'>Pediente</span>";
            } else {
              echo "<span class='span_mensaje bwarning'>Pediente</span>";
            }            
          break;  
          case '2':
            echo "<span class='span_mensaje binfo'>Procesando</span>";
          break;  
          case '3':
            echo "<span class='span_mensaje bdefault'>Cerrado</span>";
          break; 
        }
        ?>
      </td>
      <!--<td>
    <?php if ($listado[$i]->actividad_archivo != ""): ?>
    <a target="_blank" href="<?= base_url('assets').'/ticket'.$listado[$i]->actividad_archivo?>">
          <button class='btn btn-default btn-xs' title='Archivo'>
          <span class='fa fa-folder-open'></span></button>
    </a>        
    <?php endif ?>
      </td>-->
      <td>
        <button class='btn btn-default btn-xs' title='Actividad' data-toggle='modal' data-target='#actividadModal' onclick="actividad(<?=$codigo_user?>,'<?=$listado[$i]->ticket_numero?>',<?=$listado[$i]->ticket_id?>)">
          <span class='glyphicon glyphicon-eye-open'></span></button>
      </td>
    </tr>      
  <?php
    $c++;  }
  }
  ?> 
  </tbody>
</table>
<div class="modal fade" id="actividadModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #428bcb;color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="searchModalLabel"></h4>
            </div>
            <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_modal_tupa" style="border-collapse: collapse;">
                        <thead>
                          <tr> 
                            <th>Actividad</th>
                            <th>Remitente</th>
                            <th>Destinatario</th>
                            <th>Fecha Envio</th>
                            <th>Mensaje</th>   
                          </tr>
                        </thead>
                        <tbody>
                           
                        </tbody> 
                        </table>
                    </div>                
            <div id="frm_activity" class="row" style="display: none;">
                  <form id="frm" class="form-horizontal">
                    <div class="col-md-12">
                      
                      <div class="form-group">
                        <label  class="col-sm-1 control-label input-sm">Remitente<i class="formvalidimportant">*</i></label>
                        <div class="col-sm-4">
                          <input type="hidden" name="ticket" id="ticket">
                          <input type="hidden" name="actividad" id="actividad">
                          <input type="hidden" name="tipouser" id="tipouser"
                          value="<?=$tipo_user ?>"> <!-- CAMBIO $codigo_user -->
                          <input type="hidden" name="remitente" id="remitente"
                          value="<?=$codigo_user ?>">
                          <input type="text" class="form-control input-sm"
                          value="<?=$nombre?>" disabled>
                        </div>
                        <div class="col-sm-1"></div>
                        <label  class="col-sm-1 control-label input-sm">Acción<i class="formvalidimportant">*</i></label>
                        <div class="col-sm-4">
                          <select class="form-control select input-sm" name="accion" id="accion">
                            <option value="0">Seleccione</option>
                            <option value="2">Derivar</option>
                            <option value="3">Cerrar</option>
                          </select>
                      </div>
                      </div>      

                      <div class="form-group">
                      <label  class="col-sm-1 control-label input-sm">Destinatario<i class="formvalidimportant">*</i></label>
                      <div class="col-sm-4">
                          <select class="form-control select input-sm" name="destinatario" id="destinatario" disabled>
                          </select>
                      </div>
                      <label  class="col-sm-2 control-label input-sm">Adjuntar Archivo<i class="formvalidimportant">*</i></label>
                      <div class="col-sm-5">
                          <input type="file" name="archivo" id="archivo" class="form-control">
                      </div>                   
                    </div>   

                    <div class="form-group">
                      <label  class="col-sm-1 control-label input-sm">Mensaje<i class="formvalidimportant">*</i></label>
                      <div class="col-sm-11">
                          <textarea class="form-control" name="mensaje" id="mensaje" cols="10" rows="2" style="resize: none"></textarea>
                      </div>   
                    </div>  

                    </div>
                  </form>
                </div>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
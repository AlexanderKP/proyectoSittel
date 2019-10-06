<select class="form-control select input-sm" id="destinatario" name="destinatario" >
<?php 
    for ($i=0; $i < count($destinatario); $i++) { 
?>
    <option value="<?=$destinatario[$i]->usuario_id?>">
            <?=$destinatario[$i]->secretaria_nombre.' - '.$destinatario[$i]->secretaria_encargado?>
    </option>
<?php
    }
?>
</select>
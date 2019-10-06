<select class="form-control select input-sm" id="destinatario" name="destinatario">
<?php 
    for ($i=0; $i < count($destinatario); $i++) { 
?>
    <option value="<?=$destinatario[$i]->usuario_id?>">
            <?=$destinatario[$i]->usuario_nombre . ' - '. $destinatario[$i]->usuario_email?>
    </option>
<?php
    }
?>
</select>

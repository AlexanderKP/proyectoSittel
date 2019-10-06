$(document).ready(function(){

  $.getJSON(baseurl+'Mafiliado/json_afiliados_pendiente', [], function (JsonData) {
    var afi  = JsonData['afiliados'];
    var html = '';
    var i = 0;
        $(afi).each(function () {
          i++;
          html += '<tr>';
          html += '<td>'+(i)+'</td>';
          html += '<td>'+this.persona_apellidos+' '+this.persona_nombres+'</td>';
          html += '<td>'+this.persona_numdocumento+'</td>';
          html += '<td><a title="Reenvio de Afiliacion" onclick="reenviar('+this.usuario_id+')" style="cursor:pointer;color:#3F51B5"><i class="material-icons">send</i></a></td>';
          html += '</tr>';
        $("#personas tbody").html(html);
      })
    })
});

$("#enviarAfiliacion").click(function(e){
  e.preventDefault();
	var frm = $("#form_afiliar").serialize();
	grabar(frm);
})

function grabar(n) {
    if ($('#apellido').val().length < 1 || 
    	$('#nombre').val().length < 1 || 
    	$('#emailpersonal').val().length < 1 || 
    	$('#emailfetratel').val().length < 1 || 
    	$('#documento').val().length < 1 ||
      $('#sindicato option:selected').val() == 0) {
      swal("Complete todo los campos");
    } else {
      swal({
        title: "SITTEL - Perú",
        text: "Aceptar para crear afiliado",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function () {
        setTimeout(function () {
          $.ajax({
            type:'POST',
            url: baseurl+'Mafiliado/guardarAfiliado',
            data:n,
            success: function(json){  
              swal("Se creo afiliado exitosamente!");
              setTimeout(function(){ location.reload(); }, 2000);
            }
          })
        }, 2000);
    });
    }
}

function limpiarFormulario(){
	$('#apellido').val("");
	$('#nombre').val("");
	$('#emailpersonal').val("");
	$('#emailfetratel').val("");
	$('#documento').val("");
}

function reenviar(n){
  console.log(n);
  $.ajax({
    type:'POST',
    url:baseurl+'Mafiliado/reenviarInvitacion/'+n,
    success:function(json){
      swal("Se reenvio la invitación");
    }
  })
}
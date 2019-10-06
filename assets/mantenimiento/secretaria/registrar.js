$(document).ready(function(){
	$.getJSON(baseurl+'Msecretaria/getSecretariaPendiente', [], function (JsonData) {
    	var html = '';
      var i = 0;
    	$("#pendienteSecre").empty();
    $(JsonData).each(function () {
          i++;
          html += '<tr>';
          html += '<td>'+(i)+'</td>';
          html += '<td>'+this.secretaria_nombre+'</td>';
          html += '<td>'+this.secretaria_encargado+'</td>';
          html += '<td><a title="Reenvio de Invitacion" onclick="reenviar('+this.usuario_id+')" style="cursor:pointer;color:#3F51B5"><i class="material-icons">send</i></a></td>';
          html += '</tr>';
        $("#pendienteSecre").html(html);
      })
})  
});

function reenviar(n){
  $.ajax({
    type:'POST',
    url:baseurl+'Login/reenviarInvitacion/'+n,
    success:function(json){
      swal("Se reenvio la invitación");
    }
  })
}

$("#enviarSecretaria").click(function(){
	var frm = $("#form_secretaria").serialize();
	grabar(frm);
});

function grabar(n) {
    if ($('#nombre').val().length < 1 || 
    	$('#descripcion').val().length < 1 || 
    	$('#email').val().length < 1 || 
    	$('#telefono').val().length < 1) {
        swal("Por favor llene todos los campos");
    } else {       
       $.ajax({
       	type:'POST',
       	url: baseurl+'Msecretaria/guardarSecretaria',
       	data:n,
       	success: function(json){
                 		
       	}
       })
    }
}
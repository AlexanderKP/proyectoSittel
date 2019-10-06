function actividad(usu,num, id)
{
	$("#actividadModal .modal-title").html('Actividad de Ticket N° '+num);
	var html = '';
	$.ajax({
		type:'POST',
		url:baseurl+'Ticket/json_actividadTicket/',
		data:{ticket : id},
		success:function(json){
			var n = JSON.parse(json);
			var user= n['usuario'];
			console.log(n);
			n = n['ticket'];
			for (var i = 0; i < n.length; i++) {
				html += '<tr>';
				html += '<td>'+n[i]['atipo_detalle']+'</td>';
				html += '<td>'+user[n[i]['actividad_origen']]+'</td>';
				html += '<td>'+user[n[i]['actividad_destino']]+'</td>';
				html += '<td>'+n[i]['actividad_fechareg']+'</td>';
				html += '<td>'+n[i]['actividad_mensaje'].replace(/(\r\n|\n|\r)/gm, "<br />")+'</td>';
				if (n[i]['actividad_archivo'] != "") {
				html += "<td>";
				html +="<a target='_blank' href='"+baseurl+'assets/ticket/'+n[i]['actividad_archivo']+"'><button class='btn btn-default btn-xs' title='Archivo'>";
          		html +=	"<i class='material-icons'>attach_file</i></button></a>";
				html +="</td>";	
				}else{
					html +="<td></td>";
				}	
				if (usu == n[i]['actividad_destino'] && n[i]['actividad_rsp'] == 1) {
				html += "<td>";
				html +="<button class='btn btn-default btn-xs' title='Responder' onclick='actv("+n[i]['ticket_id']+","+n[i]['actividad_id']+")'>";
          		html +=	"<i class='material-icons'>question_answer</i></button>";
				html +="</td>";	
				}else{
				html += '<td></td>';
				}							
				html += '</tr>';
				
			}
			$("#actividadModal #table_modal_tupa tbody").html(html);

		}
	})
}

//RESPONDER PROCESOS

function actv(ticket,actividad)
{
	$("#actividadEnviarRsp").show();
	$("#frm_activity").show();
	$("#actividadCancelarRsp").show();
	$("#btn-cerrarActividad").hide();
	$("#ticket").val(ticket);
	$("#actividad").val(actividad);
}

$("#actividadCancelarRsp").click(function(){
	limpiar_frm();
})
function limpiar_frm()
{
	$("#frm_activity").hide();
	$("#actividadEnviarRsp").hide();
	$("#actividadCancelarRsp").hide();
	$("#btn-cerrarActividad").show();
	$("#mensaje").val('');
	$("#archivo").val('');
}

$("#accion").change(function(){
	var accion = $(this).val();
	var ticket = $("#ticket").val();
	//var id = $("#remitente").val();
	var tipo = $("#tipouser").val();
	$("#destinatario").removeAttr('disabled',true);
	$.ajax({
		type:'POST',
		url:baseurl+'Ticket/listarDestinatario/'+tipo,
		data:{paccion:accion, pticket:ticket},
		success:function(json){
			var html = '';
			var n = JSON.parse(json);
			console.log(tipo);
			console.log(n);
			if (typeof n.usuario_id !== 'undefined') {
				for (var i = 0; i < n.length; i++) {
				html += '<option value="'+n[i]['usuario_id']+'">'+n[i]['usuario_nombre']+'</option>';
				}
			}else if (tipo == 3 && accion == 2){ //SOLO ENTRA CUANDO ES DERIVADO DEL SECRETARIO
				$.each(n, function( index, value ) {
				html += '<option value="'+index+'">'+value+'</option>';
				});
			}else{
				for (var i = 0; i < n.length; i++) {
				html += '<option value="'+n[i]['usuario_id']+'">'+n[i]['usuario_nombre']+'</option>';
				}
			}
			
			$("#destinatario").html(html);
			$("#destinatario").selectpicker('refresh');
		}
	})
})

$("#actividadEnviarRsp").click(function(){
	var form = new FormData($("#frm")[0]); 
	var archivo = document.getElementById('archivo').files[0]; 
    form.append('archivo', archivo);
    form.append('destinatario', $("#destinatario").val());	//alternativo, no captura por "form"
    $.ajax({
            type: "POST",
            url: baseurl+'Ticket/responderTicket',
            data: form,
            contentType: false,
            processData: false,
            success: function (json) {
            	limpiar_frm();
            },
            complete: function () {
                swal("El ticket fue enviado").then((value) => {
					location.reload();
				});
            }
    });
})

$(document).ready(function() {
    $('#ticketlist').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );


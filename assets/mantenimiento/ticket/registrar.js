	$("#tema").change(function(){
		$("#subtema").removeAttr('disabled',true);
		var n = $("#tema option:selected").val();
		var html= '';
		$.ajax({
			url:baseurl+'Mdocumentos/json_FiltrosubTemas/'+n,
			success:function(json){				
				var n = JSON.parse(json);
				if (n.length > 0) {
					for(var i = 0; i < n.length; i++){
					html += '<option value="'+n[i]['subtema_id']+'">'+n[i]['subtema_detalle']+'</option>';
					}
					$("#subtema").html(html);
					$("#subtema").selectpicker('refresh');
				}else{
					$("#subtema").empty();
					$("#subtema").prop( "disabled", true );
					$("#subtema").selectpicker('refresh');
				}
			}
		})
	})


$("#enviarTicket").click(function(){
	if ($('#remitente').val().length < 1 || 
    	$('#destinatario option:selected').val() == 0 || 
    	$('#tema option:selected').val() == 0 || 
    	$('#asunto').val().length < 1 || 
    	$('#detalle').val().length < 1 ) {
		swal('Complete todo los campos');
	} else{
		enviar();	
	}
})

function enviar(){
	var archivo = document.getElementById('archivo').files[0];
            var form = new FormData($("#form")[0]);            
            form.append('remitente', 	$("#remitente").val());
            form.append('destinatario', $("#destinatario option:selected").val());
            form.append('tema',    		$("#tema option:selected").val());
            form.append('subtema', 		$("#subtema option:selected").val());
            form.append('asunto',  		$("#asunto").val());
            form.append('detalle', 		$("#detalle").val());
            form.append('archivo', archivo);
            $.ajax({
                type: "POST",
                url: baseurl+'Ticket/generarTicket',
                data: form,
                contentType: false,
                processData: false,
                success: function (json) {
                	console.log(json);
                },
                complete: function () {
					swal("El ticket fue enviado")
					.then((value) => {
						location.reload();
					});
                }
            });
}
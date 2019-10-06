function eliminar(n,m)
{	
	swal({
        title: "SITTEL - Perú",
        text: "¿Esta seguro de eliminar este afiliado?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "Si, eliminalo!",
        closeOnConfirm: false
    }, function () {
       $.ajax({
			type:'POST',
			url:baseurl+'Mafiliado/deleteAfiliado',
			data:{usu: n , per: m},
			success:function(json)
			{
				window.location.href=baseurl+'Mafiliado/listar';
			}
		})
    });
}

function editar(n)
{
	$.ajax({
		type:'POST',
		url:baseurl+'Mafiliado/getAfiliado/'+n,
		success:function(json){
			var data = JSON.parse(json);
			//console.log(data);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombres").val(data[0].persona_nombres);
			$("#editarModal #emailp").val(data[0].persona_emailpersonal);
			$("#editarModal #emailc").val(data[0].persona_emailcorporativo);
			$("#editarModal #dni").val(data[0].persona_numdocumento);
		}
	})
}
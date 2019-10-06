function eliminar(n)
{
	var status = confirm('¿Seguro de eliminar el Sindicato?');
	if (status) {
		$.ajax({
			type:'POST',
			url:baseurl+'Msindicato/deleteSindicato/'+n,
			success:function(json)
			{
				window.location.href=baseurl+'Msindicato/listar';
			}
		})
	}
}

function editar(n)
{
	$.ajax({
		type:'POST',
		url:baseurl+'Msindicato/getSindicato/'+n,
		success:function(json){
			var data = JSON.parse(json);
			//console.log(data);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombre").val(data[0].sindicato_nombre);
			$("#editarModal #telefono").val(data[0].sindicato_telefono);
			$("#editarModal #email").val(data[0].sindicato_email);
		}
	})
}
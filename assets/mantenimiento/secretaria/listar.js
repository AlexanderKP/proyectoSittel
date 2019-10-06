function eliminar(n,m)
{
	var status = confirm('¿Seguro de eliminar el Sindicato?');
	if (status) {
		$.ajax({
			type:'POST',
			url:baseurl+'Msecretaria/deleteSecretaria',
			data:{usu:n,sec:m},
			success:function(json)
			{
				window.location.href=baseurl+'Msecretaria/listar';
			}
		})
	}
}

function editar(n)
{
	$.ajax({
		type:'POST',
		url:baseurl+'Msecretaria/getSecretaria/'+n,
		success:function(json){
			var data = JSON.parse(json);
			console.log(data);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombre").val(data[0].secretaria_nombre);
			$("#editarModal #descripcion").val(data[0].secretaria_encargado);
			$("#editarModal #telefono").val(data[0].secretaria_telefono);
			$("#editarModal #email").val(data[0].secretaria_email);
		}
	})
}
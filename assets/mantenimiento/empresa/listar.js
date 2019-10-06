function eliminar(n)
{
	var status = confirm('¿Seguro de eliminar la Empresa?');
	if (status) {
		$.ajax({
			type:'POST',
			url:baseurl+'Mempresa/deleteEmpresa/'+n,
			success:function(json)
			{
				window.location.href=baseurl+'Mempresa/listar';
			}
		})
	}
}

function editar(n)
{
	$.ajax({
		type:'POST',
		url:baseurl+'Mempresa/getEmpresa/'+n,
		success:function(json){
			var data = JSON.parse(json);
			//console.log(data);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombre").val(data[0].empresa_nombre);
			$("#editarModal #ruc").val(data[0].empresa_ruc);
			$("#editarModal #descripcion").val(data[0].empresa_detalle);
			$("#editarModal #direccion").val(data[0].empresa_direccion);
			$("#editarModal #email").val(data[0].empresa_email);
			$("#editarModal #telefono").val(data[0].empresa_telefono);
		}
	})
}
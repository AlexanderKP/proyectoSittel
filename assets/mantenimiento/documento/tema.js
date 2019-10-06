$("#enviarTema").click(function(e){
	var frm = $("#form").serialize();
	grabar(frm);
	e.preventDefault();
})

function grabar(n){
	if ($("#nombre").val() == "") {
		swal('Complete todo los campos.');
	}else{
		$.ajax({
       	type:'POST',
       	url: baseurl+'Mdocumentos/guardarTema',
       	data:n,
       	success: function(json){
			swal('Se creo el tema correctamente.');
			$("#nombre").val('');
       	}
       })
	}
}

function eliminar(n)
{
	var status = confirm('¿Seguro de eliminar el Tema?');
	if (status) {
		$.ajax({
			type:'POST',
			url:baseurl+'Mdocumentos/deleteTema/'+n,
			success:function(json)
			{
				window.location.href=baseurl+'Mdocumentos/listar';
			}
		})
	}
}

function editar(n)
{
	$.ajax({
		type:'POST',
		url:baseurl+'Mdocumentos/getTema/'+n,
		success:function(json){
			var data = JSON.parse(json);
			//console.log(data);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombre").val(data[0].tema_detalle);
		}
	})
}
$("#enviarCargo").click(function(e){
	e.preventDefault();
	var frm = $("#form").serialize();
	enviar(frm);
})

function enviar(n){
	if ($("#nombre").val() == "" ||
		$("#empresa option:selected").val() == 0 ||
		$("#descripcion").val() == "" ||
		$("#email").val() == "" ||	
		$("#telefono").val() == "") {
		swal('No dejar campos vacios.');
	}else{
		$.ajax({
			type:'POST',
			url: baseurl+'Mempresa/guardarCargo',
			data: n,
			success:function(data){
				window.onload = baseurl+'Mempresa/registrarcargo';
			}
		})
	}
}

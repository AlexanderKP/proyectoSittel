$("#enviarEmpresa").click(function(){
	var form = $("#form").serialize();
	enviar(form);
})
function enviar(n){
	if ($("#nombre").val() == "" ||
		$("#descripcion").val() == "" ||
		$("#ruc").val() == "" ||
		$("#direccion").val() == "" ||
		$("#email").val() == "" ||
		$("#telefono").val() == "") {
		swal('No dejar campos vacios.');
	}else{
		$.ajax({
			type:'POST',
			url: baseurl+'Mempresa/guardarEmpresa',
			data: n,
			success:function(){
				setTimeout(function () {waitingDialog.hide(); location.reload();}, 2000);
			}
		})
	}
}
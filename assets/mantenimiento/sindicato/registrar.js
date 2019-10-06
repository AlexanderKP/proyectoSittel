$("#enviarSindicato").click(function(){
	var data = $("#form").serialize();
	if ($("#nombre").val() == "" || $("#descripcion").val() == "" ||
		$("#telefono").val() == "" || $("#email").val() == "") {
		BootstrapDialog.alert('No dejar campos vacios.');
	}else{
		$.ajax({
			type:'POST',
			url:baseurl+'Msindicato/guardarSindicato',
			data: data,
			success:function(){
				waitingDialog.show('Guardando datos..');
				setTimeout(function () {waitingDialog.hide(); location.reload();}, 2000);
			}
		})
	}
})
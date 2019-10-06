$(document).ready(function(){
	$.getJSON(baseurl+'Mdocumentos/json_getTemas', [], function (JsonData) {
		var temas = JsonData['temas'];
		var html = '<option value="0">&nbsp</option>';
		$(temas).each(function () {
			html += '<option value="'+this.tema_id+'">'+this.tema_detalle+'</option>';
		});
    	$("#temas").html(html);
    	$("#temas").selectpicker('refresh');
	})
})

$("#enviarSubtema").click(function(e){
	e.preventDefault();
	var frm = $("#form").serialize();
	grabar(frm);
})

function grabar(n){
	if ($("#nombre").val() == "" || $("#tema option:selected").val() == "") {
		swal('Complete todo los campos.');
	}else{
		$.ajax({
       	type:'POST',
       	url: baseurl+'Mdocumentos/guardarSubtema',
       	data:n,
       	success: function(json){
			swal('Se creo el subtema correctamente.');
       	}
       })
	}
}

function eliminar(n)
{
	var status = confirm('¿Seguro de eliminar el sub-tema?');
	if (status) {
		$.ajax({
			type:'POST',
			url:baseurl+'Mdocumentos/deleteSubtema/'+n,
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
		url:baseurl+'Mdocumentos/getSubtema/'+n,
		success:function(json){
			var data = JSON.parse(json);
			//console.log(data);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombre").val(data[0].subtema_detalle);
		
		$.getJSON(baseurl+'Mdocumentos/json_getTemas', [], function (JsonData) {
			var temas = JsonData['temas'];
			var html = '';
			$(temas).each(function () {
				if (this.tema_id == data[0].tema_id) {
					html += '<option selected value="'+this.tema_id+'">'+this.tema_detalle+'</option>';
				}else{
					html += '<option value="'+this.tema_id+'">'+this.tema_detalle+'</option>';
				}
				
			});
	    	$("#editarModal #tema").html(html);
		})
		}
	})
}
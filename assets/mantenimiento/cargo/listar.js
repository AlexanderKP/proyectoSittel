$(document).ready(function(){
	$.getJSON(baseurl+'Mempresa/getCargoUnreg', [], function (JsonData) {
		var i = 0;
		var html = '';
		$("#cargosConfirmar").empty();
		$(JsonData).each(function () {
          i++;
          html += '<tr>';
          html += '<td>'+(i)+'</td>';
          html += '<td>'+this.cargo_descripcion+'</td>';
          html += '<td>'+this.cargo_nombre+'</td>';
          html += '<td><a title="Reenvio de Invitacion" onclick="reenviar('+this.usuario_id+')" style="cursor:pointer;color:#3F51B5"><i class="material-icons">send</i></a></td>';
          html += '</tr>';
        $("#cargosConfirmar").html(html);
      })
	})
})

function reenviar(n){
  $.ajax({
    type:'POST',
    url:baseurl+'Mafiliado/reenviarInvitacion/'+n,
    success:function(json){
      swal("Se reenvio la invitación");
    }
  })
}

function eliminar(n,m)
{
	var status = confirm('¿Seguro de eliminar el Cargo?');
	if (status) {
		$.ajax({
			type:'POST',
			url:baseurl+'Mempresa/deleteCargo',
			data:{usu:n, car:m},
			success:function(json)
			{
				window.location.href=baseurl+'Mempresa/listarcargo';
			}
		})
	}
}

function editar(n)
{
	$.ajax({
		type:'POST',
		url:baseurl+'Mempresa/getCargo/'+n,
		success:function(json){
			var data = JSON.parse(json);
			$("#editarModal #codigo").val(n);
			$("#editarModal #nombre").val(data[0].cargo_descripcion);
			$("#editarModal #cargo").val(data[0].cargo_nombre);		
			$("#editarModal #email").val(data[0].cargo_email);
			$("#editarModal #telefono").val(data[0].cargo_telefono);

			$.getJSON(baseurl+'Mempresa/json_getEmpresas', [], function (JsonData) {
				var empresa = JsonData;
				var html = '';
				$(empresa).each(function () {
					if (this.empresa_id == data[0].empresa_id) {
						html += '<option selected value="'+this.empresa_id+'">'+this.empresa_nombre+'</option>';
					}else{
						html += '<option value="'+this.empresa_id+'">'+this.empresa_nombre+'</option>';
					}
					
				});
		    	$("#editarModal #entidad").html(html);
		    	$("#entidad").selectpicker('refresh');
			})
		}
	})
}

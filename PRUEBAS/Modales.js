$(document).ready(function(){
	$(document).on('click', '#Mcategoria', function(){
		
		var id=$(this).val();
		var c1=$('#v1'+id).text();
		var c2=$('#v2'+id).text();
		var c3=$('#v3'+id).text();
	
		$('#categoria').modal('show');
		$('#id_c').val(id);
		$('#v1_c').val(c1);
		$('#v2_c').val(c2);
		$('#v3_c').val(c3);

		const $ventanaModal = $('#categoria');

		$ventanaModal.on('hidden.bs.modal', function (event) {
	
			const $formulario = $ventanaModal.find('form');               
			$formulario[0].reset();
	
		 });

		 
	  
	});

	$(document).on('click', '#Mproducto_terminado', function(){
		
		var id=$(this).val();
		var c1=$('#v1'+id).text();
		var c2=$('#v2'+id).text();
		var c3=$('#v3'+id).text();
	
		$('#producto_terminado').modal('show');
		$('#id_pt').val(id);
		$('#v1_pt').val(c1);
		$('#Productos').val(c2);
		$('#v3_pt').val(c3);

		const $ventanaModal = $('#producto_terminado');

		$ventanaModal.on('hidden.bs.modal', function (event) {
	
			const $formulario = $ventanaModal.find('form');               
			$formulario[0].reset();
	
		 });
	  
	});

});
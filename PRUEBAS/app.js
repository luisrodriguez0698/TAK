$(document).ready(function(){
    $('#GuardarC').click(function(){

        var datos=$('#formC').serialize();
        $.ajax({
            type:"GET",
            url: "funciones.php?var=2",
            dataType:'json',
            data:datos,
            success:function(res){
                var result = JSON.parse(res);

                //console.log(result);

                if(result==21){
                    Swal.fire({
                        icon: 'warning',
                        title: 'ERROR ID REPETIDO!',
                        showCancelButton: true
                      })
                      $("#estadousuario").html("<span class='estado-no-disponible-ID'> ID no Disponible.</span>");
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Datos guardados correctamente',
                        timer: 1500
                      })
                      
                      $('#categoria').modal('hide');
                      $('#tabla').load('tabla.php');
                }
                
                const $ventanaModal = $('#categoria');

                $ventanaModal.on('hidden.bs.modal', function (event) {
            
                    const $formulario = $ventanaModal.find('form');               
                    $formulario[0].reset();
                 });
                 
            }
        });
 
        return false;
    });


});

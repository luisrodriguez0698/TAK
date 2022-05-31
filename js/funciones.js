
function BorrarDatosModal(Tabla){
    NTabla = Tabla;
    const $ventanaModal = $('#'+NTabla);

    $ventanaModal.on('hidden.bs.modal', function (event) {
    
        const $formulario = $ventanaModal.find('form');               
        $formulario[0].reset();
     });
}



function AgregarDatos(var1,var2,var3,var4,Tabla){
        cadena= "var1=" + var1 +
                "&var2=" + var2 +
                "&var3=" + var3 +
                "&var4=" + var4 +
                "&Tabla=" + Tabla;
        NTabla = Tabla;
        
    $.ajax({
        type:"POST",
        url:"php/AgregarDatos.php",
        data:cadena,
        success:function(r){
            console.log(r);
            if(r==1){
                $('#Tabla').load('componentes/Tabla_'+NTabla+'.php?Tabla='+NTabla);
                Swal.fire({
                    icon: 'success',
                    title: 'Datos guardados correctamente',
                    timer: 1500
                  });
                  $('#'+NTabla).modal('hide');
                  BorrarDatosModal(NTabla);
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'ERROR!',
                    showCancelButton: true
                  });
            }
        }
    });
}

function AgregarForm(datos, Tabla){
    d=datos.split('||');
    NTabla = Tabla;

    $('#Mid_'+NTabla).val(d[0]);
    $('#Mv1_'+NTabla).val(d[1]);
    $('#Mv2_'+NTabla).val(d[2]);
    $('#Mv3_'+NTabla).val(d[3]);

}

function ActualizarDatos(Tabla){

    NTabla = Tabla;

    var1 = $('#Mid_'+NTabla).val();
    var2 = $('#Mv1_'+NTabla).val();
    var3 = $('#Mv2_'+NTabla).val();
    var4 = $('#Mv3_'+NTabla).val();

    cadena= "var1=" + var1 +
            "&var2=" + var2 +
            "&var3=" + var3 +
            "&var4=" + var4 +
            "&Tabla=" + NTabla;

    $.ajax({
        type:"POST",
        url:"php/ActualizarDatos.php",
        data: cadena,
        success:function(r){
            console.log(r);
            if(r==1){
                $('#Tabla').load('componentes/Tabla_'+NTabla+'.php?Tabla='+NTabla);
                Swal.fire({
                    icon: 'success',
                    title: 'Datos actualizados correctamente',
                    timer: 1500
                  });
                  $('#M'+NTabla).modal('hide');
                  BorrarDatosModal(NTabla);
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'ERROR!',
                    showCancelButton: true
                  });
            }
        }
    });
}


function PreguntaSiNo(id, Tabla){ 
    Swal.fire({
        title: 'Desea elminar este datos?',
        text: "se eliminara los datos completamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
          EliminarDatos(id, Tabla);
        }
      })
}

function EliminarDatos(id, Tabla){
    cadena= "id=" + id +
            "&Tabla=" + Tabla;
    NTabla = Tabla; 

    $.ajax({
        type:"POST",
        url:"php/eliminarDatos.php",
        data:cadena,
        success:function(r){
            console.log(r);
            if(r==1){
                $('#Tabla').load('componentes/tabla_'+NTabla+'.php?Tabla='+NTabla);
                Swal.fire({
                    icon: 'success',
                    title: 'Datos eliminado correctamente',
                    timer: 1500
                  })
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'ERROR!',
                    showCancelButton: true
                  })
            }
        }
    })
}


function GNFormula(var1,var2,var3,var4,Tabla){
        cadena= "var1=" + var1 +
                "&var2=" + var2 +
                "&var3=" + var3 +
                "&var4=" + var4 +
                "&Tabla=" + Tabla;
                NTabla = Tabla;

    $.ajax({
        type:"POST",
        url:"php/AgregarDatos.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#Tabla').load('componenetes/Tabla_'+NTabla+'.php?Tabla='+NTabla);
                swal.fire({
                    icon: 'success',
                    title: 'Datos Guardados Correctamente',
                    timer: 1500
                });
                $('#'+NTabla).modal('hide');
                BorrarDatosModal(NTabla);
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'ERROR ID REPETIDO!',
                    showCancelButton: true
                  });
            }
        }
    });
}
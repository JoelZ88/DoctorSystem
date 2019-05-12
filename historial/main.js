$(buscar_datos());


function buscar_datos(consulta){
    $.ajax({
        url: 'buscar.php',
        type: 'POST',
        dataType:'html',
        data:{consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos").html(respuesta);    
    })
    .fail(function(){
        console.log("error");
    })
}

$(document).on('keyup','#busqueda',function(){
    //alert("si funciona");
    var valor = $(this).val();
    if(valor === ""){
        busqueda_datos();
    }
    else{
        buscar_datos(valor);
    }
});
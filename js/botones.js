//index
$("#entrarDoctor").on('click',function(){
    $('.sec1').load('html/entrarDoctor.html');
    //alert("precionaste modificar cuenta");
}); 
$("#entrarPaciente").on('click',function(){
    $('.sec1').load('html/entrarPaciente.html');
    //alert("precionaste modificar cuenta");
}); 

/*-------------------------------------------------------------*/
$("#ModificarDoctor").on('click',function(){
    //$('#sec1').load('../../php/doctor/modificarDoctor.php');
    //alert("precionaste modificar cuenta");
}); 


$("#eliminarDoctor").on('click',function(){
    //$('#sec1').load('../../html/doctor/modificarDoctor.html');
    var r = confirm("Estas seguro que quieres eliminar tu cuenta");
    alert(r);
    if(r == true){
        location.href = "./eliminarDoctor.php";
    }
});
/*PACIENTES*/

$("#eliminarPaciente").on('click',function(){
    //alert("Estas segura de eliminar tu cuenta. Si la eliminas ya no podras recuperarla");
    var r = confirm("Estas seguro que quieres eliminar tu cuenta");
    alert(r);
    if(r == true){
        location.href = "./eliminarPaciente.php";
    }
});




$(document).ready(function(){
    listar();
    
    $('#departamento').change(function(){
       listar();
      
    });
    
    });
    
    
    function listar(){
    
       $.ajax({
            type:"POST",
            url:"funcionesphp/selectcondicionado.php",
            data:"departamento=" + $('#departamento').val(),
            success:function(r){
                $('#municipios').html(r);
            }
        });
    }
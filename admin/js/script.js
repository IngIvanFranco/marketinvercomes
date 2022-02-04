$(document).ready(function(){

    var dataTable = $('#theTable').DataTable({
    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
    url:"./funcionesphp/get_data.php",
    type:"POST"
    }
    });
    
    $('#theTable').on('draw.dt', function(){
    $('#theTable').Tabledit({
    url:'./funcionesphp/edicion.php',
    dataType:'json',
    columns:{
    identifier : [0, 'id'],
    editable:[[1, 'name'], [2, 'description'], [3, 'price'], [4, 'status'], [5, 'descuento']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
    if(data.action == 'delete')
    {
    $('#' + data.activeId).remove();
    $('#theTable').DataTable().ajax.reload();
    }
    }
    });
    });
    
    });
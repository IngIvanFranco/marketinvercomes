$(document).ready(function() {
    var printCounter = 0;
 
    // datatable proveedores
    $('#example').append('<caption style="caption-side: bottom">Software Desarrollado Por Invercomes S.A.S. </caption>');
 
    $('#example').DataTable( {
        pageLength:20,
        dom: 'Bfrtip',
       
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'Listado de productos Invercomes S.A.S.',
                title: 'Proveedores',
                footer: true ,
                text:      'Exportar a Excel'
               
            },
            {
                extend: 'pdf',
                messageTop: 'Listado de productos Invercomes S.A.S.',
                messageBottom: null,
                title: 'Proveedores',
                footer: true,
                text:      'Exportar a Pdf' 
            },
            {
                extend: 'print',
                messageTop: function () {
                    printCounter++;
                    
 
                    if ( printCounter === 1 ) {
                        return 'Listado de productos Invercomes S.A.S.';
                    }
                    else {
                        return 'Listado de productos Invercomes S.A.S. impresion #'+printCounter+' ';
                    }
                },
                messageBottom: null, 
                title: 'Proveedores',
                text:      'Imprimir'
            }
        ]
    } )


} );
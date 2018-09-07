function getFacultades()
{
    let universidades_id=$('#universidades_id').val();
    if(universidades_id!='' && universidades_id!=undefined)
    {
        $.get('/getFacultades/'+universidades_id,function(data){
            $('#facultades_id').html(data);
        });
    }
}

//REGISTRO

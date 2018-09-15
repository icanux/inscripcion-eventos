//---------------RUTAS ACCESSO
//SUPER ADMIN
$('#usuarios').on('click',function(){
	router_link('/usuarios');
	actualizarMenu('usuarios');
});

//-----------FUNCION ENLACENTE
function router_link(ruta){
	$(".loader").fadeIn("slow");;
		$.get(ruta,function(data){
			$('#contenido').html(data).promise().done(function(){
				$(".loader").fadeOut("slow");
			});
		}).catch(function(xhr){
			if(xhr.status=="401"){
				location.reload();
			}
			$.toast({
					heading: 'Advertencia',text: 'Hubo un error al cargar el modulo, por favor comunicarse con el administrador del software.',
					position: 'top-right',loaderBg: '#f33c49',icon: 'warning',hideAfter: 6000,stack: 6
			})
			$(".loader").fadeOut("slow");
		});
		// notification('peligro', 'hay un apeligro','danger','top','right');
}

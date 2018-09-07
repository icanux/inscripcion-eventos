function soloNumeros(e,length){
	var key = window.event ? e.which : e.keyCode;
	if (key < 48 || key > 57) {
	  e.preventDefault();
    }
    
    if(e.target.value.length>=length)
    {
        e.preventDefault();
    }
}

function notification(title, message, type, from, align) {
    let iconNotify='';
    if(type == 'success')
    {
        iconNotify = 'check_circle_outline';
    }
    else if(type == "warning")
    {
        iconNotify="add_alert";
    }
    else if(type == "danger")
    {
        iconNotify='error_outline';
    }
    else if(type=='info')
    {
        iconNotify='info';
    }

    $.notify({
      icon: iconNotify,
      message: '<b>'+ title +'</b> - ' + message

    }, {
      type: type,
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }

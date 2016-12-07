function lista_medicamento(valor){
           
           // console.log(valor)
    $.ajax({
        url:'../controlador/controlador.php',
        type:'POST',
        data:'&valor='+valor       
    }).done(function(resp){
        //console.log(resp);
        var valores = eval(resp);
        html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre medicamento</th> <th>Descripcion</th><th>Modo de aplicacion</th><th>Unidades</th><th>Fecha de vencimiento</th><th>Fecha de ingreso</th><th>Editar</th><th>Eliminar</th></tr></thead><tbody>";
        for(i=0;i<valores.length;i++){
            datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6];
            html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][0]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modaleditar' onclick='editar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td><td><button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][1]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
        }
        html+="</tbody></table>"
        $("#lista").html(html);
    });
}
function registrar(){
	var idme = $('#idm').val()
	var nombre = $('#nom').val()
	var descrip = $('#descrip').val()
	var forma = $('#forma_apli').val()
	var unidades = $('#unidades').val()
	var fecha = $('#fecha_ven').val()

	$.ajax({
		url:'../controlador/controlador.php',
		type:'POST',
		data: 'idm='+idme+'&nom='+nombre+'&descrip='+descrip+'&forma_apli='+forma+'&unidades='+unidades+'&fecha_ven='+fecha
	
	}).done(function(resp) {
		if(resp==='exito'){
			
			
		}
		else{
			//alert(resp);
			$('#exito').show();
			lista_medicamento('');
	
		}
	});
}
function editar(datos){
	console.log(datos);
	var d=datos.split("*");
	console.log(d);
	$('#idm1').val(d[1]);
	$('#nom1').val(d[0]);
	$('#descrip1').val(d[2]);
	$('#forma_apli1').val(d[3]);
	$('#unidades1').val(d[4]);
	$('#fecha_ven1').val(d[5]);
	$('#fecha_registro').val(d[6]);

}
function actualizar(){
	var datosform=$("#formEditar").serialize();
	
	$.ajax({
		url:'../controlador/controlador.php',
		type:'POST',
		data:datosform
	}).done(function(resp){
		if(resp==='exito'){


		$('#exito').show();
		lista_medicamento('');
	}else{
		$('#exitome').show();
		lista_medicamento('');
	}

	})
}
function eliminar(id){
	alert('Seguro que desea eliminar este medicamento');
	$.ajax({
		url:'../controlador/controlador.php',
		type:'POST',
		data:'idm='+id
	}).done(function(resp){
		if(resp === 'exito'){

		lista_medicamento('');
		}else{
			lista_medicamento('');
		}
		
	});
	
}
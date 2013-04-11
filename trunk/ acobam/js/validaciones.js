// JavaScript Document
function vusuario(v,c)
{
 if(v!=' '){
    var e=/(^(\w{3,20})|^)$/;
    if(!e.test(v))
      {
      alert("El usuario debe tener por lo menos tres caracteres");
      c.value='';
      }
    }
}
function vcontra(v1,c1)
{
if(v1!=' ')
  {
  var e1=/(^((\w+|\*|\.|\s){5,20})|^)$/;
   if(!e1.test(v1))
   {
   alert("La contrasenia debe tener por lo menos 5 caracteres");
   c1.value='';
   
   }
 }
}
function vcontra1(v1,c1,v0,c0)
{
if(v1!=' ')
  {
if (v1!=v0)
{alert('Las contrasenias no coinciden'); c1.value='';c0.value='';}

}
 
}
function vnombre(v2,c2)
{
if(v2!=' ')
 {
 var e3=/(^([a-zA-Z]{2,15}){1}(\s{1}[a-zA-Z]{2,15})*|^)$/;  
  if(!e3.test(v2))
  {
   alert(v2+", NO ES VALIDO COMO NOMBRE");
   c2.value='';
  }
  else
  {
  c2.value=c2.value.toUpperCase()
  }
  }
}

function vtel(v3,c3)
{
 if(v3!=' '&& v3!='____-____')
 {
 var e3=/(^([2|7]{1}[0-9]{3}[-]{1}[0-9]{4})|^)$/;
  if(!e3.test(v3))
  {
   alert("Telefono incorrecto, debe respetar el formato 9999-9999");
   c3.value='';
  }
 }
}

function vemail(v4,c4)
{
 if(v4!=' ')
 {
  var e4=/^(\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+|^)$/; 
  if(!e4.test(v4))
  {
   alert("E-mail incorrecto");
   c4.value='';
  }
  }
}

function vdui(valor,campo)
{
if (valor!=' ')
{
var e4=/(^([0-9]{8,8}[-]{1,1}[0-9]{1,1})|^)$/;
if (!e4.test(valor))
{
	alert(valor+"formato de DUI no v�lido");
	campo.value=''; 
	//campo.focus();
	}
}
}
function CheckTime(str) 
{ 
horasalida=str.value; 
if (horasalida=='') { 
return; 
} 
if (horasalida.length>5) { 
alert("Introdujo una cadena mayor a 6 caracteres"); 
return; 
} 
if (horasalida.length!=5) { 
alert("Introducir HH:MM"); 
return; 
} 
a=horasalida.charAt(0); //<=2 
b=horasalida.charAt(1); //<4 
c=horasalida.charAt(2); //: 
d=horasalida.charAt(3); //<=5 


if ((a==2 && b>3) || (a>2)) { 
alert("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23"); 
return; 
} 
if (d>5) { 
alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59"); 
return; 
} 
if (c!=':' || e!=':') { 
alert("Introduzca el caracter ':' para separar la hora, los minutos y los segundos"); 
return; 
} 
} 

function validarvaciosmoto()//validacion de los el formulario mantenimiento de motorista 
{
if(document.form.user.value=='' || document.form.apellido.value=='' || document.form.telefono.value=='' || document.form.direccion.value=='' || document.form.genero.value=='' || document.form.estado_civil.value=='' || document.form.tipo_doc.value==''|| document.form.numero_tipo.value==''|| document.form.licencia.value==''|| document.email.value=='')
 {
   alert("LLENE TODOS LOS CAMPOS OBLIGATORIOS");
 }
 else{
     document.form.submit();
 }
 }
  


 



 

 
  function ejecutar(cod,ir) { 
     document.form1.id_input.value =cod;  
     document.form1.method="POST";
     
     switch(ir)
     {     
     case 1: document.form1.action="mantenimiento_cliente.php"; break;
     case 2: document.form1.action="eliminarcliente.php";  break;
     }
   document.form1.submit();  
  }



 
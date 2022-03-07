// Swal.fire({
// 	title: "Bienvenido",
//     text: "Espero que te guste mi pagina",
//     icon: 'question',
//     confirmButtonText: 'Seleccionar',
//     backdrop: true,
//     allowOutsideClick: true,
//     allowEscapeKey: true,
//     allowEnterKey: true,
//     timer: 5000,
//     timerProgressBar: true,
//     confirmButtonColor: '#0e5cb6',
//     showCancelButton: true,
//     cancelButtonText: 'Cancelar',
//     cancelButtonLabel: 'Cancelar',
//     showCloseButton: true,
//     closeButtonAriaLabel: 'cerrar alerta',
//     /*imageUrl: 'ruta'
//     imageWidth: '200px',
//     imageAlt: 'Camara'*/

// });

var fecha = document.getElementById('fecha');
var hora = document.getElementById('hora');
var sucursal =document.getElementById('sucursal');
var examenes =document.getElementById('examenes');
var idcita =document.getElementById('Id_Cita');
var idusuario =document.getElementById('Id_Usuario');


var error =document.getElementById('error');
error.style.color ='red';





function enviarFormulario() {

 

    var mensajesError = [];

  
    if (fecha.value === null  || fecha.value === '' ){
        mensajesError.push('Ingresa tu fecha')
        error.innerHTML= mensajesError.join(' ')
        return false;  
          
    }
    

    if (hora.value === null  || hora.value === '' ){
        mensajesError.push('Confirma tu hora')
        error.innerHTML= mensajesError.join(' ')
        return false;  
          
    }

    if (sucursal.value === null  || sucursal.value === '' ){
     mensajesError.push('elige sucursal')
     error.innerHTML= mensajesError.join(' ')
     return false;  
       
 }

 if (examenes.value === null  || examenes.value === '' ){
     mensajesError.push('elige tu examen')
     error.innerHTML= mensajesError.join(' ')
     return false;  
       
 }


 
 const formulario = document.querySelector('#formulario');
 formulario.addEventListener('submit', function(e) {
     e.preventDefault();
   
 })


 const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger',
    cancelButtontext: 'cancelar',
    confirmButtonText: 'Agendar',

  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'AGENDAR ',
  text: "Quieres agendar esta cita ?",
  icon: 'question',
  showCancelButton: true,
  confirmButtonText: 'Agendar',
  cancelButtonText: 'Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {

    

 formulario.submit();

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelada',
      'Tu cita fue cancelada :)',
      'error'
    )
  }
})

}








  
  
  
  
















function cancelar(){









    const formulario = document.querySelector('#cancelar');
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

import Swal from 'sweetalert2';

if (window.Laravel && window.Laravel.alert) {
    var mensaje = window.Laravel.alert;
    console.log(mensaje);
    Swal.fire({
        title: mensaje[0],
        text: mensaje[1],
        icon: mensaje[2]

    });
}

const entradas = [
    {
        id: "nombre",
        label: "Nombre",
        regex: /^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{1,255}$/,
        inputRegex: /[^a-zA-ZáéíóúÁÉÍÓÚÑñ]/g,
        error: "El nombre debe contener solo letras de a-z y A-Z Y acentos"
    },
    {
        id: "apellidoMat",
        label: "Apellido Materno",
        regex: /^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{1,255}$/,
        inputRegex: /[^a-zA-ZáéíóúÁÉÍÓÚÑñ]/g,
        error: "El apellido materno debe contener solo letras de a-z y A-Z Y acentos"
    },
    {
        id: "apellidoPat",
        label: "Apellido Paterno",
        regex: /^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{1,255}$/,
        inputRegex: /[^a-zA-ZáéíóúÁÉÍÓÚÑñ]/g,
        error: "El apellido paterno debe contener solo letras de a-z y A-Z Y acentos"
    },
    {
        id: "correo",
        label: "Correo Electronico",
        regex: /^[a-zA-Z0-9._@-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        inputRegex: /[^a-zA-Z0-9._@-]/g,
        error: "El correo debe contener el elemento '@' y '.'"
    },
    {
        id: "celular",
        label: "Numero de Celular",
        regex: /^[0-9]{10}$/,
        inputRegex: /[^0-9]/g,
        error: "Favor de ingresar 10 numeros"
    },
    {
        id: "correoDestino",
        label: "Inserta correo electronico destinatario",
        regex: /^[a-zA-Z0-9._@-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        inputRegex: /[^a-zA-Z0-9._@-]/g,
        error: "El correo debe contener el elemento '@' y '.'"
    }
];

//Limita la cantidad de datos ingresados en campo de Celular
/* const input = document.getElementById('celular');
input.addEventListener('input', function(event) {
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
}); */

document.addEventListener('DOMContentLoaded',function () {
    const form = document.getElementById('formularioDatos');



        // Validación en tiempo real mientras se escribe
    entradas.forEach(element => {
        const inputElement = document.getElementById(element.id);
        const errorElement = document.getElementById('error' + element.id.charAt(0).toUpperCase() + element.id.slice(1));
        if (inputElement) {
            inputElement.addEventListener("input", (e) => {
                let value = e.target.value;
                // Reemplaza caracteres inválidos en tiempo real
                let newValue = value.replace(element.inputRegex, '');

                if (value !== newValue) {
                    /*Si el caracter es invalido se muestra
                    un texto de error despues del campo*/
                    e.target.value = newValue;
                    inputElement.classList.remove('is-valid');
                    inputElement.classList.add('is-invalid');
                    errorElement.style.display = 'block';
                } else {
                    /*El elemento es valido y si ya se habia
                    un caracter invalido antes se oculta el
                    mejensaje de error */
                    inputElement.classList.remove('is-invalid');
                    inputElement.classList.add('is-valid');
                    errorElement.style.display = 'none';
                }
            });
        }
    });


});



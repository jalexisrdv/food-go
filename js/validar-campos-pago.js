const radioBtnPaypal = document.getElementById('opcion-paypal');
const radioBtnTarjeta = document.getElementById('opcion-tarjeta');
const btnRealizarPago = document.getElementById('realizar-pago');

radioBtnPaypal.addEventListener('click', (e) => {
    radioSeleccionado();
});

radioBtnTarjeta.addEventListener('click', (e) => {
    radioSeleccionado();
});

document.addEventListener('DOMContentLoaded', (e) => {
    radioSeleccionado();
});

function radioSeleccionado() {
    if(radioBtnPaypal.checked) {
        radioBtnTarjeta.parentElement.nextElementSibling.classList.remove('checked');
        btnRealizarPago.setAttribute('form', 'form-paypal');
    }else {
        radioBtnTarjeta.parentElement.nextElementSibling.classList.add('checked');
        btnRealizarPago.setAttribute('form', 'form-tarjeta');
    }
}

const campoPaypal = document.getElementById('id-paypal');

const numeroTarjeta = document.getElementById('numero-tarjeta');
const titularTarjeta = document.getElementById('titular-tarjeta');
const fechaVencimiento = document.getElementById('vencimiento-tarjeta');
const cvv = document.getElementById('cvv-cvc-tarjeta');
const carritoPago = document.querySelector('.carrito-pago');
const error = document.getElementById('error');

btnRealizarPago.addEventListener('click', (e) => {
    if(radioBtnPaypal.checked) {
        validarCampoPaypal(e);
    }else {
        validarCamposTarjeta(e);
    }
});

function validarCampoPaypal(e) {
    let campo = campoPaypal.value;
    if(estaCampoTextVacio(campo)) {
        e.preventDefault();
        mostrarError('No puedes dejar el campo vacio');
    }else {
        if(!esFormatoEmail(campo)) {
            e.preventDefault();
            mostrarError('Ingresa un correo valido');
        }else {
            error.classList.remove('activo');
            vaciarLocalStorage();
        }
    }
}

function validarCamposTarjeta(e) {
    const numero = estaCampoTextVacio(numeroTarjeta.value);
    const titular = estaCampoTextVacio(titularTarjeta.value);
    const fecha = estaCampoTextVacio(fechaVencimiento.value);
    const cvvCVC = estaCampoTextVacio(cvv.value);
    if(numero || titular || fecha || cvvCVC) {
        e.preventDefault();
        mostrarError('Todos los campos dében tener información');
    }else {
        const formatoTarjeta = esFormatoTarjeta(numeroTarjeta.value);
        const formatoFecha = esFormatoFecha(fechaVencimiento.value);
        const formatoCVV = esFormatoCVV_CVC(cvv.value);

        if(formatoTarjeta && formatoFecha && formatoCVV) {
            error.classList.remove('activo');
            vaciarLocalStorage();
        }

        if(!formatoTarjeta) {
            e.preventDefault();
            mostrarError('El formato de tarjeta no es valido');
        }

        if(!formatoFecha) {
            e.preventDefault();
            mostrarError('El formato de fecha no es valido');
        }

        if(!formatoCVV) {
            e.preventDefault();
            mostrarError('El formato de codigo de seguridad de tarjeta no es valido');
        }

    }
}

function estaCampoTextVacio(campo) {
    if(campo.length == 0 || /^\s+$/.test(campo)) {
        return true;
    }
    return false;
}

function mostrarError(msj) {
    error.classList.add('activo');
    error.children[0].innerText = msj;
}

function esFormatoFecha(campo) {
    var patron = /[0-9][0-9]\/[0-9][0-9]/;
    if (patron.test(campo)) {
          return true;
    } else {
          return false;
    }
}

function esFormatoTarjeta(campo) {
    var patron = /[0-9]{16}/;
    if (patron.test(campo)) {
          return true;
    } else {
          return false;
    }
}

function esFormatoCVV_CVC(campo) {
    var patron = /[0-9]{3}/;
    if (patron.test(campo)) {
          return true;
    } else {
          return false;
    }
}

function esFormatoEmail(campo) {
    var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if (patron.test(campo)) {
        return true;
    } else {
        return false;
    }
}
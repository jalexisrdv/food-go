//Variables
const carrito = document.getElementById('alimentos-carrito');
const cursos = document.getElementById('lista-alimentos');
const listaAlimentosCarrito = document.getElementById('lista-alimentos-carrito');
const contador = document.querySelector('.carrito-compras a');
const listaCursos = document.querySelector('.alimentos.carrito');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
const carritoCompras = document.querySelector('.carrito-compras');
const finalizarCompra = document.getElementById('formulario')
const alimentos = document.getElementById('alimentos')
const terminarCompra = document.getElementById('terminar-compra');
let contadorAlimentos = 0;

//Eventos
eventListener();

function pulsar(e) {
    let tecla = (document.all) ? e.keyCode : e.which;
    return (tecla!=13);
} 

function eventListener() {
    if(cursos != null) {
        // Dispara cuando se presiona "Agregar Carrito"
        cursos.addEventListener('click', agregarCarrito);
    }

    if(carrito!=null) {
        // Cuando se elimina un curso del carrito
        carrito.addEventListener('click', eliminarCurso);
    }

    if(vaciarCarritoBtn != null) {
        // Al Vaciar el carrito
        vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
    }

    // Al cargar el documento, mostrar LocalStorage
    document.addEventListener('DOMContentLoaded', leerLocalStorage);

    if(terminarCompra != null) {
        document.addEventListener('DOMContentLoaded', desactivarBtnTerminarPago);
        terminarCompra.addEventListener('click', desactivarBtnTerminarPago);
    }
}

function agregarCarrito(e) {
    if (e.target.classList.contains('agregar-carrito')) {
        e.preventDefault();
        leerDatosCurso(e.target.parentElement.parentElement);
    }
    let cursosLocal = obtenerCursosLocalStorage();
    setCookie('alimentos', JSON.stringify(cursosLocal), 1);
    contadorCarrito(cursosLocal);
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
  }

function leerDatosCurso(alimentoCard) {
    const alimento = alimentoCard.querySelector('a');
    const unidades = alimentoCard.querySelector('#unidades');
    if((unidades.value.length && unidades.value) > 0) {
        infoAlimento = {
            id: alimento.getAttribute('data-id'),
            idSubCategoria: alimento.getAttribute('data-id-sub-categoria'),
            subcategoria: alimento.getAttribute('data-sub-categoria'),
            precio: alimentoCard.querySelector('.precio').children[0].innerText,
            unidades: alimentoCard.querySelector('#unidades').value
        }
        console.log(infoAlimento);
        unidades.classList.remove('error-unidades');
        guardarAlimentoLocalStorage(infoAlimento);
    }else {
        unidades.classList.add('error-unidades');
    }
}

function eliminarCurso(e) {
    e.preventDefault();
    if (e.target.classList.contains('borrar-alimento')) {
        console.log(e.target.parentElement.parentElement.parentElement);
        e.target.parentElement.parentElement.parentElement.remove();
    }
    /*Usando dara, javascript me permite buscar y comparar con if
    dentro de los objetos que se encuentran en local */
    const dataId = e.target.getAttribute('data-id');
    const subCategoria = e.target.getAttribute('data-sub-categoria');
    const unidades = e.target.getAttribute('data-unidades');
    eliminarCursoLocalStorage(dataId, subCategoria, unidades);
    let cursosLocal = obtenerCursosLocalStorage();
    setCookie('alimentos', JSON.stringify(cursosLocal), 1);
    actualizarResumenPedido(cursosLocal);
    contadorCarrito(cursosLocal);
}

function actualizarResumenPedido(cursosLocal) {
    let total = 0.0;
    let items = 0;
    cursosLocal.forEach(function(infoAlimento, index) {
        total += (parseFloat(infoAlimento.precio) * parseFloat(infoAlimento.unidades));
        items++;
    });
    document.querySelector('.resumen-pedido p').children[0].innerText = items;
    document.querySelector('.pago-total').children[0].innerText = total;
}

function vaciarCarrito(e) {
    e.preventDefault();
    while (listaCursos.firstChild) {
        listaCursos.removeChild(listaCursos.firstChild);
    }
    vaciarLocalStorage();
    let cursosLocal = obtenerCursosLocalStorage();
    setCookie('alimentos', cursosLocal, 1);
    actualizarResumenPedido(cursosLocal);
    contadorCarrito(cursosLocal);
}

function guardarAlimentoLocalStorage(infoCurso) {
    let cursos;

    cursos = obtenerCursosLocalStorage();

    cursos.push(infoCurso);
    //Serializar con JSON
    localStorage.setItem('cursos', JSON.stringify(cursos));
}

function obtenerCursosLocalStorage() {
    let cursos;
    if (localStorage.getItem('cursos') === null) {
        cursos = [];
    } else {
        //Deserializar con JSON
        cursos = JSON.parse(localStorage.getItem('cursos'));
    }
    return cursos;
}

function leerLocalStorage() {
    let cursos;

    cursos = obtenerCursosLocalStorage();

    contadorCarrito(cursos);
}

function contadorCarrito(alimentos) {
   if(alimentos.length > 0) {
        contador.children[1].classList.add('contador-activo');
        contador.children[1].innerText = alimentos.length;
        contadorAlimentos = alimentos.length;
        terminarCompra.style.opacity = none;
    }else {
        contador.children[1].classList.remove('contador-activo');
        contadorAlimentos = 0;
        terminarCompra.style.opacity = 0.5;
    }
}

function desactivarBtnTerminarPago(e) {
    if(contadorAlimentos <= 0) {
        e.preventDefault();
    }
}

function eliminarCursoLocalStorage(alimentoID, subcategoriaAlimento, alimentoUnidades) {
    let cursos = obtenerCursosLocalStorage();
    let total = 0.0;
    cursos.forEach(function(infoAlimento, index) {
        if(infoAlimento.id === alimentoID && infoAlimento.subcategoria === subcategoriaAlimento && infoAlimento.unidades === alimentoUnidades) {
            cursos.splice(index, 1);
        }
        console.log(infoAlimento);
        total += (parseFloat(infoAlimento.precio) * parseFloat(infoAlimento.unidades));
    });
    
    localStorage.setItem('cursos', JSON.stringify(cursos));
}

function vaciarLocalStorage() {
    localStorage.clear();
}
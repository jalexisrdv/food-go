//Variables
const carrito = document.getElementById('carrito');
const cursos = document.getElementById('lista-alimentos');
const listaAlimentosCarrito = document.getElementById('lista-alimentos-carrito');
const listaCursos = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

//Eventos
eventListener();

function eventListener() {
    // Cuando se elimina un curso del carrito
    carrito.addEventListener('click', eliminarCurso);

    // Al cargar el documento, mostrar LocalStorage
    document.addEventListener('DOMContentLoaded', leerLocalStorage);
}

function insertarCarrito(infoCurso) {
    const row = document.createElement('tr');
    row.innerHTML = `
          <td>  
               <img src="${infoCurso.imagen}">
          </td>
          <td>${infoCurso.titulo}</td>
          <td>${infoCurso.ingredientes.toString()}</td>
          <td>${infoCurso.cantidad}</td>
          <td>${infoCurso.precio}</td>
          <td>
               <a href="#" class="borrar-curso" data-id="${infoCurso.id}">X</a>
          </td>
     `;
    listaCursos.appendChild(row);
    guardarCursoLocalStorage(infoCurso);
}

function insertarAlimentoCarrito(infoCurso) {
    const alimento = document.createElement('tr');
    alimento.innerHTML = `
        <div class="imagen">  
            <img src="${infoCurso.imagen}">
        </div>
        <div class="info-alimento">
            <h3>${infoCurso.titulo}</h3>
            <p class="precio">${infoCurso.precio}</p>
            <form class="opciones">
                <div class="selectBox">
                    <label for="opciones">Agregar o Eliminar Ingredientes:</label>
                    <select id="opciones">
                        <option>-- Seleccione --</option>
                    </select>
                    <div class="overSelect"></div>
                </div>
                <div id="checkboxes">
                    <div class="casillas">
                        ${infoCurso.ingredientes.forEach(()=>{
                            console.log('hola');
                        })}
                    </div>
                </div>
            </form>
        </div>
        <td></td>
        <td>${infoCurso.ingredientes.toString()}</td>
        <td>${infoCurso.cantidad}</td>
        <td>${infoCurso.precio}</td>
        <td>
            <a href="#" class="borrar-curso" data-id="${infoCurso.id}">X</a>
        </td>
     `;
     listaAlimentosCarrito.appendChild(alimento);
    guardarCursoLocalStorage(infoCurso);
}

function eliminarCurso(e) {
    e.preventDefault();
    if (e.target.classList.contains('borrar-curso')) {
        e.target.parentElement.parentElement.remove();
    }
    eliminarCursoLocalStorage(e.target.getAttribute('data-id'));
}

function guardarCursoLocalStorage(infoCurso) {
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

    cursos.forEach(function (infoCurso) {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>  
               <img src="${infoCurso.imagen}">
          </td>
          <td>${infoCurso.titulo}</td>
          <td>${infoCurso.ingredientes.forEach((checkbox)=>{
              if(checkbox != null) {
                const checkBox = document.createElement('input');
                checkBox.setAttribute('type', 'checkbox');
                checkbox.checked = true;
                console.log(checkbox);
              }
        })}</td>
          <td>${infoCurso.cantidad}</td>
          <td>${infoCurso.precio}</td>
          <td>
               <a href="#" class="borrar-curso" data-id="${infoCurso.id}">X</a>
          </td>
     `;
        //listaCursos.appendChild(row);
    });
}

function eliminarCursoLocalStorage(cursoID) {
    let cursos = obtenerCursosLocalStorage();
    cursos.forEach(function(infoCurso, index) {
        if(infoCurso.id === cursoID) {
            cursos.splice(index, 1);
        }
    });
    localStorage.setItem('cursos', JSON.stringify(cursos));
}

function vaciarLocalStorage() {
    localStorage.clear();
}
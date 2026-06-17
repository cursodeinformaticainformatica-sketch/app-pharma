document.addEventListener("DOMContentLoaded", function () {

    cargarDatos("categorias");
    cargarDatos("medicamentos");
    cargarDatos("lotes");
});

function cargarDatos(tabla) {

    let datos = new FormData();
    datos.append("datos", tabla);

    fetch("cargar_datos.php", {
        method: "POST",
        body: datos
    })
    .then(respuesta => respuesta.json())
    .then(data => {

        if (tabla == "categorias") {
            mostrarCategorias(data);
        }

        if (tabla == "medicamentos") {
            mostrarMedicamentos(data);
        }

        if (tabla == "lotes") {
            mostrarLotes(data);
        }

    });
}

function mostrarCategorias(data) {

    let tabla = document.getElementById("tabla-categorias");

    tabla.innerHTML = "";

    data.forEach(function (data) {

        tabla.innerHTML += `
            <tr>
                <td>${data.nombre_categoria}</td>
            </tr>
        `;

    });
}

function mostrarMedicamentos(data) {

    let tabla = document.getElementById("tabla-medicamentos");

    tabla.innerHTML = "";

    data.forEach(function (data) {

        tabla.innerHTML += `
            <tr>
                <td>${data.codigo}</td>
                <td>${data.nombre_comercial}</td>
                <td>${data.forma_farmaceutica}</td>
                <td>${data.concentracion}</td>
                <td>${data.receta ? "Sí" : "No"}</td>
            </tr>
        `;

    });
}

function mostrarLotes(data) {

    let tabla = document.getElementById("tabla-lotes");

    tabla.innerHTML = "";

    data.forEach(function (data) {

        tabla.innerHTML += `
            <tr>
                <td>${data.numero_lote}</td>
                <td>${data.fecha_ingreso}</td>
                <td>${data.fecha_caducidad}</td>
                <td>${data.stock}</td>
                <td>${data.ubicacion}</td>
                <td>${data.precio_compra}</td>
                <td>${data.precio_venta}</td>
                <td>Activo</td>
            </tr>
        `;

    });
}

document.getElementById("cerrarMedicamentos").onclick = function () {
    document.getElementById("modalMedicamentos").close();
};

document.getElementById("cerrarCategoria").onclick = function () {
    document.getElementById("modalCategorias").close();
};

document.getElementById("cerrarLotes").onclick = function () {
    document.getElementById("modalLotes").close();
};

document.getElementById("formMedicamentos")
.addEventListener("submit", function (e) {

    e.preventDefault();

    let datos = new FormData(this);
    let tabla = document.getElementById("tabla-medicamentos");

    tabla.innerHTML += `
        <tr>
            <td>${datos.get("codigo")}</td>
            <td>${datos.get("nombre")}</td>
            <td>${datos.get("forma")}</td>
            <td>${datos.get("conc")}</td>
            <td>${datos.get("receta")}</td>
        </tr>
    `;

    this.reset();
    document.getElementById("modalMedicamentos").close();
});

document.getElementById("formCategorias")
.addEventListener("submit", function (e) {

    e.preventDefault();

    let categoria = document.getElementById("categoria").value;
    let tabla = document.getElementById("tabla-categorias");

    tabla.innerHTML += `
        <tr>
            <td>${categoria}</td>
        </tr>
    `;

    this.reset();
    document.getElementById("modalCategorias").close();
});

document.getElementById("formLotes")
.addEventListener("submit", function (e) {

    e.preventDefault();

    let datos = new FormData(this);
    let tabla = document.getElementById("tabla-lotes");

    tabla.innerHTML += `
        <tr>
            <td>${datos.get("n_lote")}</td>
            <td>${datos.get("ingreso")}</td>
            <td>${datos.get("caducidad")}</td>
            <td>${datos.get("stock")}</td>
            <td>${datos.get("ubicacion")}</td>
            <td>${datos.get("compra")}</td>
            <td>${datos.get("venta")}</td>
            <td>${datos.get("estado")}</td>
        </tr>
    `;

    this.reset();
    document.getElementById("modalLotes").close();
});

document.getElementById("btn-agregar-medicamentos")
.addEventListener("click", function () {
    document.getElementById("modalMedicamentos").showModal();
});

document.getElementById("btn-agregar-categorias")
.addEventListener("click", function () {
    document.getElementById("modalCategorias").showModal();
});

document.getElementById("btn-agregar-lote")
.addEventListener("click", function () {
    document.getElementById("modalLotes").showModal();
});

let filaSeleccionada = null;

document.addEventListener("click", function (e) {

    let fila = e.target.closest("tr");

    if (!fila) return;

    let tbody = fila.parentElement;

    if (tbody.tagName !== "TBODY") return;

    tbody.querySelectorAll("tr").forEach(function (f) {
        f.classList.remove("seleccionada");
    });

    fila.classList.add("seleccionada");

    filaSeleccionada = fila;
});
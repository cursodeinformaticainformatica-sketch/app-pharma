<?php 
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario General</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="topbar">
        <div>
            <p class="breadcrumb" id="text-breadcrumb" style="cursor:pointer;">Almacen > Gestion de inventarios</p>
            <h1 id="text-title" style="cursor:pointer;">Inventario General</h1>
        </div>
    </header>

    <main class="container"> 
        <section class="grid">
            <article class="card span-2">
                <h5>STOCK TOTAL</h5>
                <h2>12,482</h2>
                <p>+5.2% este mes</p>
            </article>
            <article class="card span-2">
                <h5>VENCIMIENTO(30D)</h5>
                <h2>142</h2>
                <p>Accion Requerida</p>
            </article>
            <article class="card span-2">
                <h5>NUEVOS INGRESOS</h5>
                <h2>28</h2>
                <p>Ultimas 24 horas</p>
            </article>
            <article class="card span-2">
                <h5>ESTADO DE PEDIDOS</h5>
                <h2>ACTIVO</h2>
                <p>92% eficiencia logistica</p>
            </article>

            <article class="card span-5">
                <h4>MEDICAMENTOS</h4>
                <div class="medicamentos-actions">
                    <button type="button" id="btn-agregar-medicamentos" class="btn-medicamentos btn-add-medicamentos"><i class="fa-solid fa-plus"></i></button>
                    <button type="button" id="btn-editar-medicamentos" class="btn-medicamentos btn-edit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" id="btn-eliminar-medicamentos" class="btn-medicamentos btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Código Único</th>
                            <th>Nombre Comercial</th>
                            <th>Forma</th>
                            <th>Conc.</th>
                            <th>Receta</th>
                        </tr>
                    </thead>
                    
                    <tbody id="tabla-medicamentos"></tbody>
                </table>
                <dialog id="modalMedicamentos">
                    <div>
                        <form id="formMedicamentos">
                            <label for="codigo">Código Único:</label>
                            <input type="text" id="codigo_unico" name="codigo" required>

                            <label for="nombre">Nombre Comercial:</label>
                            <input type="text" id="nombre_comercial" name="nombre" required>

                            <label for="forma">Forma:</label>
                            <input type="text" id="forma" name="forma" required>

                            <label for="conc">Conc.:</label>
                            <input type="text" id="conc" name="conc" required>

                            <label for="receta">Receta:</label>
                            <input type="text" id="receta" name="receta" required>

                            <button type="submit">Guardar</button>
                            <button type="button" id="cerrarMedicamentos">Cancelar</button>
                        </form>
                    </div>
                </dialog>
            </article>

            <article class="card span-3">
                <h4>CATEGORIAS</h4>
                <div class="categorias-actions">
                    <button type="button" id="btn-agregar-categorias" class="btn-categorias btn-add-categorias"><i class="fa-solid fa-plus"></i></button>
                    <button type="button" id="btn-editar-categorias" class="btn-categorias btn-edit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" id="btn-eliminar-categorias" class="btn-categorias btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre de la Categoría</th>
                        </tr>
                    </thead>
                   
                    <tbody id="tabla-categorias"></tbody>
                </table>
                <dialog id="modalCategorias">
                    <div>
                        <form id="formCategorias">
                            <label for="categoria">Nombre de la Categoría:</label>
                            <input type="text" id="categoria" name="categoria" required>

                            <button type="submit">Guardar</button>
                            <button type="button" id="cerrarCategoria">Cancelar</button>
                        </form>
                    </div>
                </dialog>
            </article>

            <article class="card span-full">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h4>TRAZALIDAD DE LOTES</h4>
                    <div class="lotes-actions">
                        <button type="button" id="btn-agregar-lote" class="btn-lote btn-add">Agregar</button>
                        <button type="button" id="btn-editar-lote" class="btn-lote btn-edit">Editar</button>
                        <button type="button" id="btn-eliminar-lote" class="btn-lote btn-delete">Eliminar</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>N° Lote</th>
                            <th>Ingreso</th>
                            <th>Caducidad</th>
                            <th>Stock</th>
                            <th>Ubicación</th>
                            <th>P. Compra</th>
                            <th>P. Venta</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <dialog id="modalLotes">
                        <div>
                            <form id="formLotes">
                                <label for="n_lote">N° Lote:</label>
                                <input type="number" id="n_lote" name="n_lote" required>

                                <label for="ingreso">Ingreso:</label>
                                <input type="text" id="ingreso"name="ingreso" required>

                                <label for="caducidad">Caducidad:</label>
                                <input type="text" id="caducidad" name="caducidad" required>

                                <label for="stock">Stock:</label>
                                <input type="number" id="stock" name="stock" required>

                                <label for="ubicacion">Ubicación:</label>
                                <input type="text" id="ubicacion" name="ubicacion" required>

                                <label for="compra">P. Compra:</label>
                                <input type="number" min="0" id="precio_compra" name="compra" required>

                                <label for="venta">P. Venta:</label>
                                <input type="number" min="0" id="precio_venta" name="venta" required>

                                <label for="precio">Estado:</label>
                                <select id="estado" name="estado">
                                    <option value="Activo">Activo</option>
                                    <option value="Vencido">Vencido</option>
                                    <option value="Agotado">Agotado</option>
                                </select>

                                <button type="submit">Guardar</button>
                                <button type="button" id="cerrarLotes">Cancelar</button>
                            </form>
                        </div>
                    </dialog>
                    <tbody id="tabla-lotes"></tbody>
                </table>
            </article>
        
        </section>
    </main>

    <script src="js/app.js"></script>
</body>
</html>
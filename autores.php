<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php include(__DIR__."/lib/header.php"); ?>

    <script src="./js/generales.js"></script>
    <script src="./js/libros.js"></script>
    <script src="./js/autores.js"></script>
    <script src="./js/editoriales.js"></script>
   <script src="./js/presentacionLibros.js"></script>
    <script src="./js/presentacionAutores.js"></script>
</head>


<body>
<!--MODAL FORMULARIO-->
<div class="modal fade" id="modalFormAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLongTitle">Autor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">

			<!-- NOMBRE DEL AUTOR -->
            <div class="row">
				<div class="col-md-12">
					<div class="input-group mb-3">
					   <div class="input-group-prepend">
						  <span class="input-group-text" id="basic-addon1">Nombre</span>
					   </div>
					   <input id="nombre" type="text" class="form-control" placeholder="Nombre del autor" aria-label="Nombre" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			<!-- FIN NOMBRE DEL AUTOR -->
			
			<!-- DESPLEGABLE AUTORES 
            <div class="row">
				<div class="col-md-12">
					<div class="input-group mb-3">
					   <div class="input-group-prepend">
						  <span class="input-group-text" id="basic-addon1">Autor</span>
					   </div>
					   <select id="idAutor">
					   </select>
					</div>
				</div>
			</div>
		 FIN DESPLEGABLE AUTORES -->

             <!-- APELLIDOS -->
             <div class="row">
                 <div class="col-md-12">
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="basic-addon1">Apellidos</span>
                         </div>
                         <input id="apellidos" type="text" class="form-control" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="basic-addon1">
                     </div>
                 </div>
             </div>
             <!-- FIN APELLIDOS -->

             <!-- DESPLEGABLE EDITORIALES -->
             <!-- <div class="row">
                 <div class="col-md-12">
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="basic-addon1">Editorial</span>
                         </div>
                         <select id="idEditorial">
                         </select>
                     </div>
                 </div>
             </div> -->
             <!-- FIN DESPLEGABLE EDITORIALES -->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" onclick="guardarLibro()">Guardar</button>
         </div>
      </div>
   </div>
</div>
<!--FIN MODAL FORMULARIO-->


<section class="mt-3">
    <div class="container">
		<!-- PANEL DE ACCIONES -->
        <div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-primary text-white">
					<b>Acciones</b>
					</div>
					<div class="card-body">
						<button id="botonAbrirFormLibro" type="button" class="btn btn-success" onclick="abrirModalFormularioAutor()">Añadir autor</button>
					</div>
				</div>				
			</div>
		</div>
		<!-- FIN PANEL DE ACCIONES -->
		
		<!-- TABLA DE LIBROS -->
        <div class="row mt-4">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Acciones</th>				
						</tr>
					</thead>
					<tbody id="listadoAutores">
						<!-- Rellenar con JS -->
					</tbody>
				</table>
			</div>
		</div>
		<!-- FIN TABLA DE LIBROS -->
    </div>
</section>

<footer class="footer">
</footer>
</body>
</html>
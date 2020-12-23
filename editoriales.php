<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <?php include(__DIR__ . "/lib/header.php"); ?>

   <script src="./js/generales.js"></script>
   <script src="./js/libros.js"></script>
   <script src="./js/autores.js"></script>
   <script src="./js/editoriales.js"></script>
   <script src="./js/presentacionLibros.js"></script>
   <script src="./js/presentacionAutores.js"></script>
   <script src="./js/presentacionEditoriales.js"></script>
</head>


<body>
   <!-- Incluimos el menú de navegación -->
   <?php include("./menu/menu.php"); ?>

   <!--MODAL FORMULARIO-->
   <div class="modal fade" id="modalFormEditorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" id="exampleModalLongTitle">Editorial</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <!-- NOMBRE DEL Editorial -->
               <div class="row">
                  <div class="col-md-12">
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1">Nombre</span>
                        </div>
                        <input id="nombre" type="text" class="form-control" placeholder="Nombre del Editorial" aria-label="Nombre" aria-describedby="basic-addon1">
                     </div>
                  </div>
               </div>
               <!-- FIN NOMBRE DEL Editorial -->
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-success" onclick="guardarEditorial()">Guardar</button>
            </div>
         </div>
      </div>
   </div>
   <!--FIN MODAL FORMULARIO-->

   <!--MODAL LIBROS-->
   <div class="modal fade" id="modalLibros" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header bg-warning">
               <h5 class="modal-title" id="exampleModalLongTitle">Libros</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <!-- APELLIDOS -->
               <div class="row">
                  <div class="col-md-12">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Titulo</th>
                              <th scope="col">ISBN</th>
                           </tr>
                        </thead>
                        <tbody id="listadoLibros">
                           <!-- Rellenar con JS -->
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- FIN APELLIDOS -->
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
      </div>
   </div>
   <!--FIN MODAL LIBROS-->

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
                     <button id="botonAbrirFormLibro" type="button" class="btn btn-success" onclick="abrirModalFormEditorial()">Añadir Editorial</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIN PANEL DE ACCIONES -->

         		<!-- TABLA DE EDITORIALES -->
        <div class="row mt-4">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
                     <th scope="col">Nombre</th>
                     <th scope="col">Acciones</th>	
						</tr>
					</thead>
					<tbody id="listadoEditoriales">
						<!-- Rellenar con JS -->
					</tbody>
				</table>
			</div>
		</div>
		<!-- FIN TABLA DE EDITORIALES -->

   </section>

   <footer class="footer">
      <!-- Incluimos el menú de navegación -->
      <?php include("footer.php"); ?>
   </footer>
</body>

</html>
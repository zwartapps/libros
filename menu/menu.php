<nav id="menu-admin" class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#"><img class="imagenLogoMenuSuperior" src="<?php echo $GLOBALES['urlPrincipal'] ?>/img/logo.jpg" height="80" alt="Inicio"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">

            <li id="menu-conversor-moneda" class="nav-item">
                <a class="nav-link" href="<?php echo $GLOBALES['urlPrincipal'] ?>/libros.php"><i class="fas fa-book fa-3x"></i><br>Libros</a>
            </li>

            <li id="menu-imc" class="nav-item">
                <a class="nav-link" href="<?php echo $GLOBALES['urlPrincipal'] ?>/autores.php"><i class="fas fa-users fa-3x"></i><br>Autores</a>
            </li>

            <li id="menu-check-email" class="nav-item">
                <a class="nav-link" href="<?php echo $GLOBALES['urlPrincipal'] ?>/checkEmail.php"><i class="fas fa-pen-nib fa-3x"></i><br>Editoriales</a>
            </li>

            <!--
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                    <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                </div>
            </li>
            -->
        </ul>

    </div>
</nav>
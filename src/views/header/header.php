<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../../css/css-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="../../css/fontawesome.css">    
    <title>Inicio</title>
</head>

<body >

    <!--Barra de navegación-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <div class="container-fluid">
            <img class="rounded" src="../../assets/escudo3.png" height="75px"></img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="../home/home.php">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Equipos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../asignar-equipos/asignar-equipos.php">Asignar equipo</a>

                            <a class="dropdown-item" href="../equipos/inhabilitar-equipos.php">Inhabilitar Equipos</a>

                            <a class="dropdown-item" href="../equipos/equipos-estados.php">Estado de Equipos</a>

                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Asignaciones</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../editar-asignaciones/editar-asignaciones.php">Editar asignación</a>
                            <a class="dropdown-item" href="../asignaciones/finalizar-asignaciones.php">Finalizar asignación</a>
                            <a class="dropdown-item" href="../historial-asignaciones/historial-asignaciones.php">Historial de asignación</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Mantenciones</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../mantenciones/mantenciones.php">Equipos en mantención</a>
                            <a class="dropdown-item" href="../editar-mantencion/editar-mantencion.php">Editar mantención</a>
                            <a class="dropdown-item" href="../eliminar-mantencion/eliminar-mantencion.php">Eliminar mantención</a>
                            <a class="dropdown-item" href="../finalizar-mantenciones/finalizar-mantencion.php">Finalizar mantención</a>
                        </div>
                    </li>
                    
                </ul>
                <div class="d-flex" action="./mantenciones/mantenciones.php">
                <a href="../login/vista-login.php" id="cerrarSesion">             
                    <button class="btn btn-success rounded-pill py-2 px-4" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                    <path  d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path class="mx-2" fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg><b>Cerrar Sesion</b></button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../../controller/header.js"></script>

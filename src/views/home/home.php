<?php include '../header/header.php' ?>


<!-- Presentacion pagina de inicio -->
<div class="container mt-5">
    <hr>
    <h1 class="text-center">¿Que desea realizar?</h1>
    <hr>
</div>

<div class="container mt-5 mb-5 animate__animated animate__pulse w-75 h-50">
    <div class="row">
        <div class="p-2 tarjeta col-md-4 shadow">
            <div class="card text-white bg-warning mb-3 w-100 h-100">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor"
                        class="bi bi-card-list" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path
                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                    </svg>
                </div>
                <div class="card-body">
                    <p class="text-center text-dark">¿Necesitas verificar asignaciones?</p>
                    <hr>
                    <a href="../historial-asignaciones/historial-asignaciones.php" class="btn btn-dark w-100 rounded-pill"><b>IR A ASIGNACIONES</b></a>
                    <hr>
                </div>
            </div>
        </div>
        <div class="p-2 tarjeta col-md-4 shadow">
            <div class="card text-white text-center bg-warning mb-3 w-100 h-100">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor"
                        class="bi bi-cpu" viewBox="0 0 16 16">
                        <path
                            d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                    </svg>
                </div>
                <div class="card-body">
                    <p class="text-center text-dark">Asignar un equipo disponible</p>
                    <hr>
                    <a href="../asignar-equipos/asignar-equipos.php" class="btn btn-dark w-100 rounded-pill"><b>IR A EQUIPOS</b></a>
                    <hr>
                </div>
            </div>
        </div>
        <div class="p-2 tarjeta col-md-4">
            <div class="card text-white bg-warning mb-3 w-100 h-100">
                <div class="card-header text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor"
                        class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path
                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                        <path fill-rule="evenodd"
                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                    </svg>
                </div>
                <div class="card-body">
                    <p class="text-dark text-center">listado de equipos en mantención</p>
                    <hr>
                    <a href="../mantenciones/mantenciones.php" class="btn btn-dark w-100 rounded-pill"><b>IR A MANTENCIONES</b></a>
                    <hr>
                </div> <!-- -->
            </div>
        </div>
    </div>
</div>


<?php include '../footer/footer.php' ?>
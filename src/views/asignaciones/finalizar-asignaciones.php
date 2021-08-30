<!DOCTYPE html>
<html lang="en">

<head>
    <title>Finalizar Asignaciones</title>
</head>

<body>
    <?php include '../header/header.php' ?>



    <div class="container bg-white mt-3 w-100">
        <div class="col-sm mx-auto w-75 d-flex justify-content-center p-3">
            <h1>Finalizar equipos asignados</h1>
        </div>
        <h4 class="mb-3 mt-2">En este apartado puedes finalizar un equipo asignado,<br>presiona el boton y se pedirá la confirmación</h4>
        <p><b>ESTA ACCIÓN ES IRREVERSIBLE</b></p>
        <div class="col-xl-12 col-lg-12 mb-12 mt-5 table-responsive ">
            <table class="table table-sm table-bordered table-hover table-striped w-100" id="tbFinalizarAsignacion">
                <thead>
                    <tr>
                        <th>ID ASIGNACION</th>
                        <th>Equipo</th>
                        <th>Perfil de equipo</th>
                        <th>Funcionario</th>
                        <th>Inicio de asignacion</th>
                        <th>Fin de asignacion</th>
                        <th>ID_EQUIPO</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="row mt-4 mb-3">
            <div class="col-lg-12 d-flex justify-content-center">
                <button id="finalizarAsignacion" type="button" class="btn btn-danger">Finalizar Asignación</button>
            </div>
        </div>
    </div>

    <!-- template finalizar asignación -->
    <template id="modalFinalizarAsignacion">
        <swal-title >
            ¿Realmente quieres finalizar la asignación?
        </swal-title>

        <swal-button type="confirm" >
            Aceptar
        </swal-button>
        <swal-button type="cancel" >
            Cancelar
        </swal-button>

        <swal-param name="allowEscapeKey" value="false" />
        <swal-param name="customClass" value='{ "popup": "my-popup" }' />
    </template>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../controller/finalizar-asignaciones.js?time=<?php echo time(); ?>"></script>



</body>
<footer><?php include '../footer/footer.php' ?></footer>

</html>


<style>
    h1 {
        text-align: center;
    }

    h4 {
        text-align: center;
    }

    p {
        text-align: center;
    }
</style>
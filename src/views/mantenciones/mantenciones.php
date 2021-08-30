<?php include '../header/header.php' ?>



<div class="container">
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col-6">
            <h1 class="text-center">Equipos en Mantención</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col-6">
            <p class="text-center">En esta sección podrá visualizar los equipos que están en mantención.</p>
        </div>
        <div class="col"></div>
        <div class="col-6">
        </div>
    </div>

    <div class="row mt-5 ">
        <div class="col-xl-12 col-lg-12 mb-12 table-responsive">
            <table id="tbMantenciones" class="table table-sm table-bordered table-hover table-striped w-100">
                <thead class="bg-highlight">
                    <tr>
                        <th>Id_Mantencion</th>
                        <th>Equipo</th>
                        <th>Perfil de Equipo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Descripción</th>
                        <th>Diagnóstico</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-lg-12 d-flex justify-content-center">
            <button id="btnVerDetalleMantencion" type="button" class="btn btn-primary">Ver detalle de mantencion</button>
        </div>
    </div>
</div>

<!--Template ver detalle de la mantencion -->
<template id="modalVerDetalle">
    <swal-title>
        Detalle de la mantención
    </swal-title>

    <swal-html>
        <div class="container col-md-12 my-4">
            <div class="form-group">
                <h4>Descripción de la mantención</h4>
                <textarea name="" id="descripcion" cols="30" rows="5" readonly></textarea>
                    <hr>
                    <h4>Descripción del diagnostico</h4>
                <textarea name="" id="diagnostico" cols="30" rows="5" readonly></textarea>
            </div>
        </div>
        <br>
    </swal-html>

    <swal-button type="confirm">
        Aceptar
    </swal-button>

    <swal-param name="allowEscapeKey" value="false" />
    <swal-param name="customClass" value='{ "popup": "my-popup" }' />
</template>




<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../controller/mantenciones.js?time=<?php echo time(); ?>"></script>


<?php include '../footer/footer.php' ?>
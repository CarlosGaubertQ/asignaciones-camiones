<?php include '../header/header.php' ?>


<div class="container">
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col-6">
            <h1 class="text-center">Asignar un equipo</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col-6">
            <p class="text-center">En esta sección podrá asignar un equipo a un funcionario</p>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-5">
     
    
    
                <div class="col-6">
                    <p class="text-center">Fecha inicio</p>
                    <div class="d-flex justify-content-center">
                        <input type="date" class="text-center" id="fechaInicio" name="fechaInicio" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="col-6">
                    <p class="text-center">Fecha fin</p>
                    <div class="d-flex justify-content-center">
                        <input type="date" class="text-center" id="fechaHasta" name="fechaHasta" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
         
    </div>
    <div class="row ">
        <div class="col-lg-6 mt-5">
            <table id="tbEquipo" class="table table-sm table-bordered table-hover table-striped w-100">
                <thead class="bg-highlight">
                    <tr>
                        <th>ID Equipo</th>
                        <th>Equipo disponibles</th>
                        <th>Perfil de equipo</th>
                    </tr>
                </thead>


            </table>
        </div>
        <div class="col-lg-6 mt-5">
            <table id="tbFuncionarios" class="table table-sm table-bordered table-hover table-striped w-100">
                <thead class="bg-highlight">
                    <tr>
                        <th>ID</th>
                        <th>Rut</th>
                        <th>Funcionario</th>

                    </tr>
                </thead>

            </table>
        </div>
        <div class="col-xl-4 col-lg-12">

        </div>

    </div>
    <div class="row mt-4 mb-3">
        <div class="col-lg-12 d-flex justify-content-center">
            <button id="btnAddAsignacionEquipos" type="button" class="btn btn-primary">Confirmar asignación</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../controller/asignar-equipos.js?php echo time(); ?>"></script>
<?php include '../footer/footer.php' ?>
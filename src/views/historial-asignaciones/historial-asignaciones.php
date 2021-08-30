<?php include '../header/header.php' ?>


<div class="container">
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col-6">
            <h1 class="text-center">Historial Asignaciones</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col-6">
            <p class="text-center">En esta sección podrá ver los equipos que han finalizado su asignación.</p>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-5 ">
    
        <div class="col-lg-12 table-responsive">
            <table id="tbHistorialAsignaciones" class="table table-sm table-bordered table-hover table-striped w-100">
                <thead class="bg-highlight">
                    <tr>
                        <th>Equipo</th>
                        <th>Tipo de equipo</th>
                        <th>Funcionario</th>
                        <th>Inicio de asignación</th>
                        <th>Finalización de asignación</th>
                    </tr>
                </thead>
                
           
            </table>
        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../controller/historial-asignaciones.js?php echo time(); ?>"></script>
<?php include '../footer/footer.php' ?>
<?php include '../header/header.php' ?>


<div class="container">
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col-6">
            <h1 class="text-center">Asignaciones - Editar</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col-6">
            <p class="text-center">En esta sección podrá editar los equipos asignados, para ello selecciona un equipo y presiona sobre el botón Editar.</p>
        </div>
        <div class="col"></div>
    </div>
    
    <div class="row mt-10">
        <div class="col-lg-12 table-responsive">
            <table id="tbEditAsig" class="table table-sm table-bordered table-hover table-striped w-100">
                <thead class="bg-highlight">
                    <tr>
                        <th>ID</th>
                        <th>Equipo</th>
                        <th>Perfil de equipo</th>
                        <th>Funcionario</th>
                        <th>Inicio de Asignación</th>
                        <th>Fin de Asignación</th>
                    </tr>
                </thead>
                <tbody id="EditarAsigTemplate">                                                        

                </tbody>
            </table>
        </div>
    </div>
</div>


<!---Inicio Modal Editar Asignacion--->

<template id="editTemplate">
    <swal-title>
        Editar Asignación
    </swal-title>

    <swal-html>
        <div class="container col-md-12 my-4">
            <div class="form-group">
                <label for="nombre-equipo">Nombre Equipo: </label>
                <input id="nombre-equipo" type="text" class="form-control" placeholder="" readonly>
            </div>

            <div class="form-group">
                <label for="nombre-func">Nombre Funcionario: </label>
                <input id="nombre-func" type="text" class="form-control" placeholder="" readonly>
            </div>
        </div>
    <div class="container col-md-12 my-10">
        <label for="fecha-inicio-asig"> Fecha Inicio Asignación</label>
        <input id="fecha-inicio-asig"type="date"  style="width:155px;height:30px" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
    </div>
    <br>

    <div class="container col-md-12 my-10">
        <label for="fecha-fin-asig"> Fecha Fin Asignación &nbsp;&nbsp;</label>
        <input id="fecha-fin-asig"type="date"  style="width:155px;height:30px">
    </div>
    </swal-html>

    <swal-button type="confirm">
        Guardar
    </swal-button>
    <swal-button type="cancel">
        Cancelar
    </swal-button>

    <swal-param name="allowEscapeKey" value="false" />
    <swal-param
    name="customClass"
    value='{ "popup": "my-popup" }' />
</template>


<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../controller/editar-asignaciones.js?php echo time(); ?>"></script>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button
        {
            padding: 0.1em 0.5em;

        }
    </style> 
<?php include '../footer/footer.php' ?>
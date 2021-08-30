<?php include '../header/header.php'?>



<div class="container">
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col-6">
            <h1 class="text-center">Finalizar Mantención</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col-6">
            <p class="text-center">En esta sección podrá finalizar mantenciónes.</p>
        </div>
        <div class="col"></div>
        <div class="col-6">

        </div>
    </div>
    
    <div class="row mt-5 ">
        <div class="col-xl-12 col-lg-12 mb-12 table-responsive">
            <table id="tbfinalMantencion" class="table table-sm table-bordered table-hover table-striped w-100">
                <thead class="bg-highlight">
                  <tr>
                        <th>Id_Mantencion</th>
                        <th>Id_Equipo</th>
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
    

   

</div>



<template id="FinalTemplate" >
  <swal-title >
    Finalizar mantencion
  </swal-title>
  
  <swal-html >
  <div class="form-floating mb-3 mt-3">
    <textarea  style="height: 100px" class="form-control" id="DiagnosticoArea" placeholder="Diagnostico tecnico"></textarea>
    <label for="DiagnosticoArea">Diagnostico Tecnico</label>
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
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="../../controller/finalizar-mantencion.js?time=<?php echo time(); ?>"></script>
<?php include '../footer/footer.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Estado de equipos</title>
</head>

<body >
<?php include '../header/header.php'?>

        
    
<div class="container">
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col-6">
                <h1 class="text-center">Estado de Equipos</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-3">
            <div class="col"></div>
            <div class="col-6">
                <p class="text-center">Apartado que permite visualizar el estado de los equipos,<br>los que estan disponibles pueden ser enviados a mantencion</p>
                <p id="seleccionar" class="mt-3"></p>
            </div>
            <div class="col"></div>
            
        </div>
        
        <div class="row mt-10">
            
            <div class="col-lg-12 table-responsive">
                <table id="tbequipos" class="table table-sm table-bordered table-hover table-striped w-100">
                    <thead class="bg-highlight">
                        <tr>
                            <th>ID Equipo</th>
                            <th>Equipo</th>
                            <th>Perfil de Equipo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../controller/equipos-estados.js?time=<?php echo time(); ?>"></script>



</body>
<footer><?php include '../footer/footer.php'?></footer>
</html>


<template id="mantencionTemplate" >
  <swal-title >
    Enviar a mantencion
  </swal-title>
  
  <swal-html >
  <div class="form-floating mb-3 mt-3">
    <textarea  style="height: 100px" class="form-control" id="DescripcionArea" placeholder="Descripcion"></textarea>
    <label for="DescripcionArea">Descripcion de la mantencion</label>
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

<style>
    h1{
        text-align: center;
    }
    h4 {
        text-align: center;
    }
    p {
        text-align: center;
    }
</style>
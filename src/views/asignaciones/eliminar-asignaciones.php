
<!DOCTYPE html>
<html lang="en">

<head>
    <title>eliminar asignaciones</title>
</head>

<body >
<?php include '../header/header.php'?>

        
    
    <div class="container-fluid bg-white mt-3 w-75 ">
        <div class="col-sm mx-auto w-50 d-flex justify-content-center">
            <h1>Equipos Asignados-Eliminar</h1>
        </div>  
        <p class="mb-3 mt-2">En este apartado puedes eliminar un equipo asignado,<br>presiona el boto y se pedira la confirmacion</p>
        <p><b>ESTA ACCION ES IRREVERSIBLE</b></p>
        <div class="col-xl-12 col-lg-12 mb-12 mt-5" >
            <table class="table table-sm table-bordered table-hover table-striped w-100" id="tbeliminarasignaciones">
                <thead>
                    <tr>
                        <th>equipo</th>
                        <th>tipo de equipo</th>
                        <th>funcionario</th>
                        <th>inicio de asignacion</th>
                        <th>fin de asignacion</th>
                        <th>accion</th>
                    </tr>

                </thead>
                <tr>
                        <td>equipo</td>
                        <td>tipo de equipo</td>
                        <td>funcionario</td>
                        <td>inicio de asignacion</td>
                        <td>fin de asignacion</td>
                        <td ><button type="button" class="btn btn-outline-danger" id="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg></button>
                            
                        </td>
                </tr>
                <tr>
                        <td>equipo</td>
                        <td>tipo de equipo</td>
                        <td>funcionario2</td>
                        <td>inicio de asignacion</td>
                        <td>fin de asignacion</td>
                        <td ><button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </td>
                </tr>
            </table>
            
        </div>
        
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../controller/eliminar-asignaciones.js?time=<?php echo time(); ?>"></script>



</body>
<footer><?php include '../footer/footer.php'?></footer>
</html>


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
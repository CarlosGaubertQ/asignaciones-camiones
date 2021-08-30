var tablaAsignaciones
var enviarDatos

$(document).ready(function () {
  cargarTablaAsignaciones()

  $("#finalizarAsignacion").on("click", function () {
 
    if (tablaAsignaciones.rows({ selected: true }).data().length === 0) {
      Swal.fire({
        icon: "error",
        title: "Cuidado...",
        text: "Debes seleccionar una asignacion",
      });
    } else {
      enviarDatos = tablaAsignaciones.rows({ selected: true }).data().toArray();
      abrirModal(enviarDatos)
    }

  })

})


function cargarTablaAsignaciones(){
  let datos = { sede: window.localStorage.getItem("sede"), query: 1 }
  datosTablas = [
    {
      title: "ID ASIGNACIÓN",
      id: "ID_ASIGNACION",
      data: "ID_ASIGNACION",
      type: "number",
      visible: false,
    },
    {
      title: "Equipo",
      id: "NOMBRE_EQUIPO",
      data: "NOMBRE_EQUIPO",
      type: "text"
    },
    {
      title: "Perfil Equipo",
      id: "PERFIL_EQUIPO",
      data: "PERFIL_EQUIPO",
      type: "text"
    },
    {
      title: "Funcionario",
      id: "PRIMERNOMBRE_FUNCIONARIO",
      data: "PRIMERNOMBRE_FUNCIONARIO",
      type: "text"
    },
    {
      title: "Fecha de asignación",
      id: "FECHA_INICIO",
      data: "FECHA_INICIO",
      type: "date"
    },
    {
      title: "Fin de asignación",
      id: "FECHA_FINAL",
      data: "FECHA_FINAL",
      type: "date",
    },
    {
      title: "ID EQUIPO",
      id: "ID_EQUIPO",
      data: "ID_EQUIPO",
      type: "number",
      visible: false,
    },
  ]
  
  tablaAsignaciones = $("#tbFinalizarAsignacion").DataTable({
    select: {
      style: "single"
    },
    columns: datosTablas,
    ajax: {
      url: "../../routes/query-finalizar-asignacion.php",
      data: datos,
      type: "POST",
    },
    //processing: true,
    responsive: true,
    pageLength: 3,

    dom: "Bfrtip",

    language: {
      processing: "Cargando Equipos Asignados",
      emptyTable: "No hay asignaciones para mostrar",
      sSearch: "Buscar",
      zeroRecords: "No hay asignaciones para mostrar",
      paginate: {
        previous: "Anterior",
        next: "Siguiente",
      },


      infoEmpty: "",
      info: "",
      infoFiltered: "",
      select: {
        rows: {
          _: "Ud. seleccionó %d asignacion", //msj cuando todavia no seleccionó nada
          0: "Haga clic en una fila para seleccionarla.", //aviso
          1: "1 fila seleccionada", //aviso
        },
      },
    },
  })

}


function abrirModal(datos){
  console.log(datos)
  var id_Asignacion = datos[0].ID_ASIGNACION
  var id_equipo = datos[0].ID_EQUIPO

  Swal.fire({
    template: '#modalFinalizarAsignacion'
  }).then((result) => {
    console.log(result)
    if(result.isConfirmed){

      var datosAEnviar = {
        user: window.localStorage.getItem("user"),
        id: id_Asignacion,
        idEquipo: id_equipo,
        query: 2
      }

      $.ajax({
        url: "../../routes/query-finalizar-asignacion.php",
        data: datosAEnviar, 
        type: "POST",
        dataType: "json",
        success: function(resultado){
          Swal.fire('Asignación eliminada correctamente', '', '')
          tablaAsignaciones.destroy()
          cargarTablaAsignaciones()
        },
        error: function(response){
          Swal.fire("Algo ocurrio ", "", "error");
        }
      })

    }else if(result.isDenied){
      Swal.fire("No se ha podido eliminar esta asignación", "", "info")
    }

  })
}
var tablaMantenciones;
var enviarDatos

$(document).ready(function () {
  cargarTablaAsignaciones()

  $("#btnVerDetalleMantencion").on("click", function () {
 
    if (tablaMantenciones.rows({ selected: true }).data().length === 0) {
      Swal.fire({
        icon: "error",
        title: "Cuidado...",
        text: "Debes seleccionar una mantencion",
      });
    } else {
      enviarDatos = tablaMantenciones.rows({ selected: true }).data().toArray();
      abrirModal(enviarDatos)
    }

  })

})

function abrirModal(datos){
  Swal.fire({
    template: '#modalVerDetalle'
  })
  $("#descripcion").val(datos[0].DESCRIPCION)
  $("#diagnostico").val(datos[0].DIAGNOSTICO)
}


function cargarTablaAsignaciones() {
  let datos = { sede: window.localStorage.getItem("sede"), query: 1 }
  datosTablas = [
    {
      title: "ID Mantención",
      id: "ID_MANTENCION",
      visible: false,
      data: "ID_MANTENCION",
      type: "number"
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
      title: "Fecha Inicio",
      id: "FECHA_INICIO",
      data: "FECHA_INICIO",
      type: "date"
    },
    {
      title: "Fecha Fin",
      id: "FECHA_FIN",
      data: "FECHA_FIN",
      type: "date"
    },
    {
      title: "Descripción",
      id: "DESCRIPCION",
      data: "DESCRIPCION",
      type: "text",
      render: function (data, type, row) {
        return data ? data.length > 40 ?
        data.substr(0, 40) + '...' :
        data: data
      }
    },
    {
      title: "Diagnostico",
      id: "DIAGNOSTICO",
      data: "DIAGNOSTICO",
      type: "text",
      render: function (data, type, row) {
        return data ? data.length > 40 ?
        data.substr(0, 40) + '...' :
        data: data
      }
    }
  ]

  tablaMantenciones = $("#tbMantenciones").DataTable({
    select: {
      style: "single"
    },
    columns: datosTablas,
    ajax: {
      url: "../../routes/query-mantenciones.php",
      data: datos,
      type: "POST",
    },
    //processing: true,
    responsive: true,
    pageLength: 3,

    dom: "Bfrtip",

    language: {
      processing: "Cargando Mantenciones",
      emptyTable: "No existen mantenciones disponibles.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos en base a la busqueda",
      paginate: {
        previous: "Anterior",
        next: "Siguiente",
      },

      infoEmpty: "",
      info: "",
      infoFiltered: "",
      select: {
        rows: {
          _: "Ud. seleccionó %d mantenciones", //msj cuando todavia no seleccionó nada
          0: "Haga clic en una fila para seleccionarla.", //aviso
          1: "1 fila seleccionada", //aviso
        },
      },
    },
  })

}

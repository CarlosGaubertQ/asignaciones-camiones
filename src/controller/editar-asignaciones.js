var tabla;
$(document).ready(function () {
  llenarTabla();
});

function llenarTabla() {
  let datosE = { sede: window.localStorage.getItem("sede"), query: 1 };
  columnSet = [
    {
      title: "ID",
      id: "ID_ASIGNACION",
      data: "ID_ASIGNACION",
      type: "number",
      visible: false,
    },
    {
      title: "Equipo",
      id: "NOMBRE_EQUIPO",
      data: "NOMBRE_EQUIPO",
      type: "text",
    },
    {
      title: "Perfil de equipo",
      id: "PERFIL",
      data: "PERFIL",
      type: "text",
    },
    {
      title: "Funcionario",
      id: "NOMBRE_FUNCIONARIO",
      data: "NOMBRE_FUNCIONARIO",
      type: "text",
    },
    {
      title: "Inicio de Asignación",
      id: "FECHA_INICIO",
      data: "FECHA_INICIO",
      type: "text",
    },
    {
      title: "Fin de Asignación",
      id: "FECHA_FIN",
      data: "FECHA_FIN",
      type: "text",
    },
  ];
  tabla = $('#tbEditAsig').DataTable({
    columns: columnSet,
    ajax: {
      url: "../../routes/query-editar-asignaciones.php",
      data: datosE,
      type: "POST"
    },
    responsive: true,
    pageLength: 6,
    altEditor: true,
    select: {
      style: "single", //single o multi
    },
    buttons: [
      {
        extend: 'selected',
        text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg> Editar',

        action: function (e, dt, node, config) {
          var rowData = dt.rows({ selected: true }).data().toArray();
          console.log(rowData)
          if (rowData.length == 0) {

          } else {
            //cargar modal
            abrirmodal(rowData)
          }
        }
      },
    ],

    lengthChange: false,
    dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    bInfo: false,
    language: {
      emptyTable: "No existen asignaciones disponibles.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos",
      paginate: {
        "previous": "Anterior",
        "next": "Siguiente",
      },
    },
  });

}
function abrirmodal(datos) {
  Swal.fire({
    template: '#editTemplate'
  }).then(result => {
    if (result.isConfirmed) {
      var ini = new Date($("#fecha-inicio-asig").val());
      var fin = new Date($("#fecha-fin-asig").val());

      if (Date.parse(ini) <= Date.parse(fin)) {
        let datosE = {
          sede: window.localStorage.getItem("sede"), query: 2,
          FECHA_INICIO: $("#fecha-inicio-asig").val(),
          FECHA_FIN: $("#fecha-fin-asig").val(),
          ID_ASIGNACION: datos[0].ID_ASIGNACION
        };
        $.ajax({
          url: "../../routes/query-editar-asignaciones.php",
          data: datosE,
          type: "POST",
          dataType: "json",
          success: function (resultado) {
            swal.fire('Editado',
              'La asignación ha sido editada con éxito',
              'success'
            )
            tabla.ajax.reload(null, false);
          },
          error: function (response) {
            Swal.fire("Algo ocurrió ", "", "error");
          },
        });

      } else {
        Swal.fire("La fecha inicial no puede ser superior a la final", "", "error");
      }
    }
  })

  $("#nombre-equipo").val(datos[0].NOMBRE_EQUIPO)
  $("#nombre-func").val(datos[0].NOMBRE_FUNCIONARIO)

  var fecha = datos[0].FECHA_INICIO.split("/")
  $("#fecha-inicio-asig").val(fecha[2] + "-" + fecha[1] + "-" + fecha[0])
  var fecha = datos[0].FECHA_FIN.split("/")
  $("#fecha-fin-asig").val(fecha[2] + "-" + fecha[1] + "-" + fecha[0])

}


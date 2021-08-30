var tabla;
$(document).ready(function () {
  llenarTabla();

});
function llenarTabla() {
  let datos = { sede: window.localStorage.getItem("sede"), query: 0 };

  columnSet = [
    {
      title: "ID",
      id: "ID_EQUIPO",
      visible: false,
      data: "ID_EQUIPO",
      type: "number",
    },
    {
      title: "Equipo",
      id: "NOMBRE_EQUIPO",
      data: "NOMBRE_EQUIPO",
      type: "text",
    },
    {
      title: "Perfil de equipo",
      id: "ID_PERFIL_EQUIPOL",
      data: "ID_PERFIL_EQUIPO",
      type: "number",
    },
    {
      title: "Estado de equipo",
      id: "NOMBRE_ESTADO",
      data: "NOMBRE_ESTADO",
      type: "text",
    },
  ];

  tabla = $('#tbequipos').DataTable({
    columns: columnSet,
    ajax: {
      url: "../../routes/query-inhabilitar-equipos.php",
      data: datos,
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
        text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg> Inhabilitar',
        class: "red",
        action: function (e, dt, node, config) {
          var rowData = dt.rows({ selected: true }).data().toArray();
          console.log(rowData)
          if (rowData.length == 0) {

          } else {
            modalinhabilitar(rowData)
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
      emptyTable: "No existen equipos.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos en base a la búsqueda",
      paginate: {
        "previous": "Anterior",
        "next": "Siguiente",
      },
    },
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Todos</option></select>')
          .appendTo('#seleccionar')
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex(
              $(this).val()
            );

            column
              .search(val ? '^' + val + '$' : '', true, false)
              .draw();
          });

        column.data().unique().sort().each(function (d, j) {
          select.append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
  })
}

function modalinhabilitar(datos) {
  Swal.fire({
    title: '¿Está seguro de Inhabilitar este equipo?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Inhabilitar'
  }).then((result) => {
    if (result.isConfirmed) {
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      var dateTime = date+' '+time;
      let datosE = {
        FECHAFIN_MANTENCION: dateTime,
        NOMBRE_ESTADO: datos[0].NOMBRE_ESTADO,
        query: 1,
        ID_EQUIPO: datos[0].ID_EQUIPO,
      };
      $.ajax({
        url: "../../routes/query-inhabilitar-equipos.php",
        data: datosE,
        type: "POST",
        dataType: "json",
        success: function (response) {
          swal.fire('Confirmado',
            'El equipo ha sido inhabilitado exitosamente',
            'success'
          )
          tabla.ajax.reload(null, false);
        },
        error: function (response) {
          Swal.fire("Algo ocurrió ", "", "error");
        },
      });
    }
  })
};


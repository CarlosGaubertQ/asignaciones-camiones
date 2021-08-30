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
  tabla=$('#tbequipos').DataTable({
    columns: columnSet,
    ajax: {
      url: "../../routes/query-equipos-estados.php",
      data: datos,
      type: "POST"
    },
    responsive: true,
    pageLength: 3,
    altEditor: true,
    select: {
      style: "single", //single o multi
    },
    buttons: [

      {
        extend: 'selected',
        text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg> mantencion',

        class: "red",
        action: function (e, dt, node, config) {
          var rowData = dt.rows({ selected: true }).data().toArray();
          if (rowData[0].NOMBRE_ESTADO == 'Disponible' ){
              modalmantencion(rowData)
          } else if(rowData[0].NOMBRE_ESTADO == 'Asignado' ){
            modalwarning(rowData)
          }else {
            modalwarningm(rowData)
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
      emptyTable: "No existen equipos disponibles.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos en base a la busqueda",
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
  });
}


function modalmantencion(datos) {
  Swal.fire({
    template: '#mantencionTemplate'
  }).then(result => {
    if (result.isConfirmed) {
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      var dateTime = date+' '+time;
      let datosE = {
        query: 1,
        FECHAINICIO_MANTENCION: dateTime,
        FECHAFIN_ASIGNACION: dateTime,
        NOMBRE_ESTADO: datos[0].NOMBRE_ESTADO,
        ID_EQUIPO: datos[0].ID_EQUIPO,
        DESCRIPCION: document.getElementById("DescripcionArea").value
      };
      $.ajax({
        url: "../../routes/query-equipos-estados.php",
        data: datosE,
        type: "POST",
        dataType: "json",
        success: function (response) {
          swal.fire('confirmado',
            'El equipo ha sido enviado a mantencion exitosamente',
            'success'
          )
          tabla.ajax.reload();
        },
        error: function (response) {
          Swal.fire("Algo ocurrió ", "", "error");
        },
      });
  
    }
  })
};
function modalwarning(datos){
  Swal.fire({
    title: 'No puede enviar equipos asignados a mantención',
    icon: 'warning',
  })
}
function modalwarningm(datos){
    Swal.fire({
      title: 'Este equipo ya esta en mantención',
      icon: 'warning',
    })
  }


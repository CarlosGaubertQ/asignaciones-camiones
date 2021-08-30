var tablaMantenciones;
var enviarDatos

$(document).ready(function () {
  cargarTablaMantenciones()


})


function cargarTablaMantenciones() {
  let datos = { sede: window.localStorage.getItem("sede"), query: 1 }
  datosTablas = [
    {
      title: "ID Mantención",
      id: "ID_MANTENCION",
      data: "ID_MANTENCION",
      visible: false,
      type: "number"
    },
    {
        title: "ID Equipo",
        id: "ID_EQUIPO",
        data: "ID_EQUIPO",
        visible: false,
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
      visible: false,
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
      visible: false,
      render: function (data, type, row) {
        return data ? data.length > 40 ?
        data.substr(0, 40) + '...' :
        data: data
      }
    },
  ]


  tablaMantenciones = $("#tbfinalMantencion").DataTable({
    
    columns: datosTablas,
    ajax: {
      url: "../../routes/query-finalizar-mantencion.php",
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
        text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg> Finalizar',

        class: "red",
        action: function (e, dt, node, config) {
            var rowData = dt.rows({ selected: true }).data().toArray();
            modalfinal(rowData)
          
        }
      },

    ],
    lengthChange: false,
    dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    bInfo: false,
    language: {
      emptyTable: "No existen mantenciones disponibles.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos en base a la busqueda",
      paginate: {
        "previous": "Anterior",
        "next": "Siguiente",
      },
    },
  })

}




function modalfinal(datos){
  
  
  
  Swal.fire({
      template: '#FinalTemplate',
    }).then(result => {
      
      if(result.isConfirmed){
        var hoy = new Date();
        fechaModificacion = hoy.getFullYear()+"-"+(hoy.getMonth()+1)+"-"+hoy.getDate();

        let datosM = {
          sede: window.localStorage.getItem("sede"), 
          query: 2,
          DIAGNOSTICOTECNICO_MANTENCION: document.getElementById("DiagnosticoArea").value,
          FECHAFIN_MANTENCION : fechaModificacion,
          ID_EQUIPO: datos[0].ID_EQUIPO,
          ID_MANTENCION : datos[0].ID_MANTENCION,
        }       
        console.log(datosM);
        $.ajax({
          url:"../../routes/query-finalizar-mantencion.php",
          data:datosM,
          type: "POST",
          dataType: "json",
          success: function (resultado) {
            swal.fire('felicidades',
              'La mantencion ha sido finalizada con éxito',
              'success'
            )
            tablaMantenciones.destroy();
            cargarTablaMantenciones()
          },
          error: function (response) {
            Swal.fire("Algo ocurrió ", "", "error");
          },


        })



      }
    })
    




}
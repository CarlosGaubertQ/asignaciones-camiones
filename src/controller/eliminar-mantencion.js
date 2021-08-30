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
    },
    {
      title:"Accion",
      "targets": -1,
      "data": null,
       
      "defaultContent": `<button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>`
    }
  ]


  tablaMantenciones = $("#tbeliminarMantencion").DataTable({
    
    columns: datosTablas,
    ajax: {
      url: "../../routes/query-eliminar-mantencion.php",
      data: datos,
      type: "POST"
    },
    
    responsive: true,
    pageLength: 6,
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

$('#tbeliminarMantencion').on('click','button' , function(){
  var data = tablaMantenciones.row( $(this).parents('tr') ).data();

  
  Swal.fire({
    title: 'Estas seguro?',
    text: "No podra revertir esta acción",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar',

  }).then((result) => {
    if (result.isConfirmed) {
    
      let datosM ={ 
        sede: window.localStorage.getItem("sede"), 
        query: 2,
        ID_MANTENCION : data.ID_MANTENCION,
        ELIMINAR_MANTENCION : 1,
      }
      $.ajax({
        url:"../../routes/query-eliminar-mantencion.php",
        data:datosM,
        type:"POST",
        dataType:"json",
        success: function (resultado) {
          swal.fire(
            'Eliminado',
            'La mantencion ha sido eliminada correctamente.',
            'success'
          )
          tablaMantenciones.destroy()
          cargarTablaMantenciones()
        },
        error: function (response) {
          Swal.fire("Algo ocurrió ", "", "error");
        },
      })
    }
  })
  
  
});


function abrirModal(datos){
  Swal.fire({
      template: '#editTemplate',
    }).then(result => {
      
      if(result.isConfirmed){
        var hoy = new Date();
        fechaModificacion = hoy.getFullYear()+"-"+(hoy.getMonth()+1)+"-"+hoy.getDate();

        let datosM = {
          sede: window.localStorage.getItem("sede"), 
          query: 2,
          DESCRIPCION_MANTENCION: $("#descripcion").val(), 
          DIAGNOSTICOTECNICO_MANTENCION: $("#diagnostico").val(),
          FECHAFIN_MANTENCION : $("#fechafin").val(),
          ID_MANTENCION : datos.ID_MANTENCION,
          MODIFICAR_MANTENCION : fechaModificacion,
        }       
        console.log(datosM);
        $.ajax({
          url:"../../routes/query-editar-mantencion.php",
          data:datosM,
          type: "POST",
          dataType: "json",
          success: function (resultado) {
            swal.fire('Editado',
              'La asignación ha sido editada con éxito',
              'success'
            )
            tablaMantenciones.ajax.reload(null, false);
          },
          error: function (response) {
            Swal.fire("Algo ocurrió ", "", "error");
          },


        })



      }
    })
    
    $("#descripcion").val(datos.DESCRIPCION)
    $("#diagnostico").val(datos.DIAGNOSTICO)
    
    var fecha=datos.FECHA_FIN.split("/")
    $("#fechafin").val("20"+fecha[2]+"-"+fecha[1]+"-"+fecha[0])
}

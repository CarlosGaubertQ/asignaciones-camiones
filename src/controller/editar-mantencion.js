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
      "defaultContent": `<button id="edit" type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path></svg></button>`
    }
  ]


  tablaMantenciones = $("#tbeditarMantencion").DataTable({
    
    columns: datosTablas,
    ajax: {
      url: "../../routes/query-editar-mantencion.php",
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

$('#tbeditarMantencion').on('click','button' , function(){
  var data = tablaMantenciones.row( $(this).parents('tr') ).data();
  abrirModal(data);
  
  
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
        if(datosM.FECHAFIN_MANTENCION == ""){
          Swal.fire("Debe seleccionar una fecha", "", "error");
        }else{
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
        


      }
    })
    
    $("#descripcion").val(datos.DESCRIPCION)
    $("#diagnostico").val(datos.DIAGNOSTICO)
    
    try {
      var fecha=datos.FECHA_FIN.split("/")
      $("#fechafin").val("20"+fecha[2]+"-"+fecha[1]+"-"+fecha[0])
    } catch (error) {
      
    }
    
    




}


function test(){
  Swal.fire({
    didOpen: () => {
      Swal.showLoading()
    }
  })
}



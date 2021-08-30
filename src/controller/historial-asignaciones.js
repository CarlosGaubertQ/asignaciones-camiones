$(document).ready(function () {
  cargarTabla();
});

function cargarTabla() {
  let datos = { sede: window.localStorage.getItem("sede") };
  columnSet = [
    {
      title: "Equipo",
      id: "NOMBRE_EQUIPO",
      data: "NOMBRE_EQUIPO",
      type: "text",
    },
    {
      title: "Tipo de equipo",
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
      title: "Inicio de asignación",
      id: "FECHA_INICIO",
      data: "FECHA_INICIO",
      type: "text",
    },
    {
      title: "Finalización de asignación",
      id: "FECHA_FIN",
      data: "FECHA_FIN",
      type: "text",
    },
  ];

  
  $("#tbHistorialAsignaciones").DataTable({
    columns: columnSet,
    ajax: {
      url: "../../routes/query-historial-asignaciones.php",
      data: datos,
      type: "POST",
    },
  
    responsive: true,
    pageLength: 3,
    altEditor: true,
    select: "single",
    lengthChange: false,
    bInfo: false,
    dom:
      "<'row mb-3'<f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 mt-1 col-md-5'i>< p>>",
    language: {
      emptyTable: "No existen funcionarios disponibles.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos en base a la busqueda",
      paginate: {
        previous: "Anterior",
        next: "Siguiente",
      },
    },
  });

 
}

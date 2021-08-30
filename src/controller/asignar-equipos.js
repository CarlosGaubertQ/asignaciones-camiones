var tablaEquipo;
var tablaFuncarios;
var rowData;
$(document).ready(function () {
  cargarTablaEquipo();
  cargarTablaFuncionario();
 
  $("#btnAddAsignacionEquipos").on("click", function () {
    console.log(tablaEquipo.row({ selected: true }).id())
    var fechaInicio = new Date($("#fechaInicio").val())
    var fechaHasta = new Date($("#fechaHasta").val())

    if (fechaInicio <= fechaHasta) {
      if (tablaEquipo.rows({ selected: true }).data().length === 0) {
        Swal.fire({
          icon: "error",
          title: "Cuidado...",
          text: "Debes seleccionar un equipo",
        });
      } else {
        if (tablaFuncarios.rows({ selected: true }).data().length === 0) {
          Swal.fire({
            icon: "error",
            title: "Cuidado...",
            text: "Debes seleccionar un funcionario",
          });
        } else {
          var id_equipo = tablaEquipo.rows({ selected: true }).data()[0];
          var rut_funcionario = tablaFuncarios.rows({ selected: true }).data()[0];

          Swal.fire({
            title: `¿Desea Asignar este equipo (${id_equipo["NOMBRE_EQUIPO"]}) y funcionario (${rut_funcionario["NOMBRE"]}) a una asignación nueva?`,
            showDenyButton: true,
            confirmButtonText: `Asignar`,
            denyButtonText: `Cancelar`,
            showClass: {
              popup: "animate__animated animate__fadeInDown",
            },
            hideClass: {
              popup: "animate__animated animate__fadeOutUp",
            },
          }).then((result) => {
            if (result.isConfirmed) {
              var datos = {
                user: window.localStorage.getItem("user"),
                id_equipo: id_equipo["ID_EQUIPO"],
                id_programafuncionario: rut_funcionario["ID_PROGRAMAFUNCIONARIO"],
                fechainicio: $("#fechaInicio").val(),
                fechafin: $("#fechaHasta").val(),
                query: 3,
              };

              $.ajax({
                url: "../../routes/query-asignar-equipos.php",
                data: datos,
                type: "POST",
                dataType: "json",
                success: function (resultado) {
                  Swal.fire('Asignacion creada satisfactoriamente!', '', 'success')
                  tablaEquipo.destroy()
                  tablaFuncarios.destroy()
                  cargarTablaEquipo()
                  cargarTablaFuncionario()
                },
                error: function (response) {
                  Swal.fire("Algo ocurrio ", "", "error");
                },
              });
            } else if (result.isDenied) {
              Swal.fire("No se grabo esta asignación", "", "info");
            }
          });
        }
      }
    } else {
      Swal.fire("La fecha de inicio no puede ser superior a la final.", "", "warning");
    }





  });
});

function cargarTablaEquipo() {
  let datos = { sede: window.localStorage.getItem("sede"), query: 1 };

  columnSet = [
    {
      title: "ID",
      id: "ID_EQUIPO",
      data: "ID_EQUIPO",
      visible: false,
      type: "number",
    },
    {
      title: "Equipo",
      id: "ID_EQUIPO",
      data: "NOMBRE_EQUIPO",
      type: "text",
    },
    {
      title: "Perfil de equipo",
      id: "PERFIL",
      data: "PERFIL",
      type: "text",
    },
  ];

  tablaEquipo = $("#tbEquipo").DataTable({
    rowId: 'staffId',
    select: {
      style: "single", //single o multi
    },
    columns: columnSet,
    ajax: {
      url: "../../routes/query-asignar-equipos.php",
      data: datos,
      type: "POST",
    },

    responsive: true,
    pageLength: 3,

    dom: "Bfrtip",

    language: {
      emptyTable: "No existen equipos disponibles.",
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
          _: "Ud. seleccionó %d registros", //msj cuando todavia no seleccionó nada
          0: "Haga clic en una fila para seleccionarla.", //aviso
          1: "Solo 1 fila seleccionada", //aviso
        },
      },
    },
  });
}

function cargarTablaFuncionario() {
  let datos = { sede: window.localStorage.getItem("sede"), query: 2 };
  columnSet = [
    {
      title: "ID",
      id: "ID_PROGRAMAFUNCIONARIO",
      data: "ID_PROGRAMAFUNCIONARIO",
      visible: false,
      type: "number",
    },
    {
      title: "Rut",
      id: "RUT_FUNCIONARIO",
      data: "RUT_FUNCIONARIO",
      type: "text",
    },
    {
      title: "Funcionario",
      id: "NOMBRE",
      data: "NOMBRE",
      type: "text",
    },
  ];
  tablaFuncarios = $("#tbFuncionarios").DataTable({
    columns: columnSet,
    ajax: {
      url: "../../routes/query-asignar-equipos.php",
      data: datos,
      type: "POST",
    },

    responsive: true,
    pageLength: 3,

    dom: "Bfrtip",
    select: {
      style: "single", //single o multi
    },

    dom: "Bfrtip",

    language: {
      emptyTable: "No existen funcionarios disponibles.",
      sSearch: "Buscar",
      zeroRecords: "No se encontraron datos en base a la busqueda",
      paginate: {
        previous: "Anterior",
        next: "Siguiente",
      },
      info: "",
      infoEmpty: "",
      infoFiltered: "",
      select: {
        rows: {
          _: "Ud. seleccionó %d registros", //msj cuando todavia no seleccionó nada
          0: "Haga clic en una fila para seleccionarla.", //aviso
          1: "Solo 1 fila seleccionada", //aviso
        },
      },
    },
  });
}

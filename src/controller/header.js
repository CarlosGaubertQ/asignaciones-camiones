$('#cerrarSesion').click(function(e){
  localStorage.removeItem('user')
  localStorage.removeItem('sede')
})

console.log("testiando")
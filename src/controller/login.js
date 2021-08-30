$('#redirectionHome').click(function(e){

  e.preventDefault()

  var emailRegex = /^[^@]+@[^@]+.[a-zA-Z]{2,}$/

  if (emailRegex.test($('#user').val())) {
    if ($('#user').val().length == 0 || $('#password').val().length == 0) {
      Swal.fire(
        'Error',
        'Los datos no son correctos',
        'error'
      )
    } else {
      localStorage.setItem('user',$('#user').val().split("@")[0])
      localStorage.setItem('sede',$('#sede-login').val())
      window.location.href = '../home/home.php'
      //localStorage.removeItem('user')
    }
  }else{
    Swal.fire(
      'Error',
      'Los datos no son correctos',
      'error'
    )
  }

  
})


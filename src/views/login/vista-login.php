<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style-login.css" />


  <title>Asignaciones Equipos</title>
</head>

<body>
  <section id='register'>
    <div class="row g-0">
      <div class="col-lg-7 d-none d-lg-block">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item img-1 min-vh-100 active">
              <div class="carousel-caption d-none d-md-block">
                <div class="alert alert-dismissible alert-light rounded-3 strong">
                  <b>Gestiona tus proyectos de la mejor manera</b> 
                </div>
              </div>
            </div>
            <div class="carousel-item img-2 min-vh-100">
              <div class="carousel-caption d-none d-md-block">
                <div class="alert alert-dismissible alert-light rounded-3 strong">
                  <b>Desarrollando Soluciones</b>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
        </div>
      </div>
      <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 mb-auto w-100">
          <img src="../../assets/imglogin/isoc.png" class="img-fluid" />
        </div>
        <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
          <h1 class="mb-4 text-center"> <b>Bienvenid@ de Vuelta</b></h1>
          <form class="mb-5" id="formLogin" method="POST">
            <div class="mb-4">
              <label for="inputEmail"  class="form-label font-weight-bold"> <b>Email</b> </label>
              <input type="email" id="user" name="user" class="form-control" id="inputEmail" placeholder="Ingresa tu email">
            </div>
            <div class="mb-4">
              <label for="inputPassword" class="form-label"><b>Contraseña</b></label>
              <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Ingresa tu contraseña"
                id="inputPassword">
              <div class="sede p-2">
              <br>
                <label for="sede-login"><b>Favor de seleccionar la sede: </b></label>               
                <select name="sede-login" id="sede-login">
                  <option value="Concepción">Concepción</option>
                  <option value="Chillan">Chillan</option>
                </select>
              </div>
            </div>
            <button id="redirectionHome" type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
          </form>
        </div>
        <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
          <p class="d-inline-block mb-0">Taller de Desarrollo 2021</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../../controller/login.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding cup</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estiloIndex.css">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

        <img src="img/icno.png" alt="codig cup" width="90px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="RegistroCoach.php">Registrarte</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#ass">Conócenos</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <header> <!--fondo de pantalla-->

    </header>



    <div class="d-flex justify-content-center align-items-center" border-dark style="min-height: 35vh;">
        <div class="card m-1" style="max-width: 740px;">
          <div class="row g-0">
            <div class="col-md-4 ">
              <img src="img/icno.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
              <h3 class="card-title text-center">¿Concursos de programación?</h3>
                <p class="card-text">  El Coding Cup no sólo puso a prueba las habilidades técnicas 
                  de los participantes en el área de programación, sino también su capacidad para 
                  trabajar en equipo, tomar decisiones bajo presión y comunicar eficazmente sus 
                  ideas.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="d-flex justify-content-center align-items-center" id="cuadro" style="min-height: 20vh;">
        <div class="card text-center">
        <h5 class="card-title">Estamos por comenzar una competición</h5>
          <a class="card-text">El registro para participar esta disponible</a>
          <a class="card-text">A competir con nuevos estudiantes y dile ¡Hola! a los nuevos desafios</a>
          <a class="card-text">                                                                             </a>
           
         <div>
            <a href="login.php" class="btn btn-primary">Iniciar sesion</a>
            <a  href="RegistroCoach.php" class="btn btn-primary">Registrarte</a>
         </div>
        </div>
    </div>



    <!--Galeria de imagenes-->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <h1 class="TituloEvento"><span>Eventos</span> realizados</h1>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="img/fondo2.png" class="d-block img-fluid rounded mx-auto d-block" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="img/fondo3.png" class="d-block img-fluid rounded mx-auto d-block" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000" img-fluid>
            <img src="img/fondo1.png" class="d-block rounded mx-auto d-block" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>




      <div class="acc">
        <h1  class="tituloAccerca">Acerca del <span>CODIG CUP<a name="ass"></a></span></h1>
        <p class="text-center" id="AccercaDel" >El Coding Cup ITSUR es un concurso de programación que se lleva a cabo en el Instituto Tecnológico Superior del Sur de Guanajuato (ITSUR). 
        Este concurso comenzó como un evento para el estado de Guanajuato y ha ido creciendo en popularidad. El concurso está dirigido a estudiantes de nivel medio superior y superior </p>
        <br>        
    </div>

    <div class="container-fluid bg-primary p-2" id="barraAbajo">
        <div class="row  mt-1">
            <div class="col-md-2 text-left col-md-12">
                <h1 class="text-white text-center">CODING CUP</h1>
            </div>
            <div class="row mt-1">
                <div class="col-md-12 text-center text-white">
                    <p>El contenido esta resevado por el propietario de la pagina CODIG CUP </p>
                </div>
            </div>
            <!--iconos de red social-->
            <div class="row mt-1 p-2 mb-2">
                <div class="col-md-12 text-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>

                </div>
            </div>
        </div>



</body>

</html>
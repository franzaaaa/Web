<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="view/css/ejercicio1.css" />
</head>

<body>
  <header>
    <div id="c_header">
      <div id="logo">
        <a href="">Panadería Cordo</a>
      </div>
    </div>
    <div id="menu">
      <a href="shop.php">Tienda Online</a>
      <div id="menu2">
        <div class="dropdown">
          <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
            aria-expanded="false">
            Perfil
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
            session_start();
            if(!isset($_SESSION["email"])){
                echo "<li><a class='dropdown-item' href='view/html/login.php'>Perfil</a></li>";
                echo "<li><a class='dropdown-item' href='view/html/register.php'>Registrarse</a></li>";
            }else{
                echo "<li><a class='dropdown-item' href='profile.php'>Perfil</a></li>";
            }
            
            ?>
          </ul>
        </div>
        <a href="">Carrito</a>
      </div>
    </div>
  </header>

  <main>
    
      <div id="carouselExampleCaptions" class="carousel carousel-size" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner carousel-size">
          <div class="carousel-item active carousel-size">
            <img src="view/media/empanadilla.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item carousel-size">
            <img src="view/media/turron.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item carousel-size">
            <img src="view/media/panetone.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



        <h2 id="oferta">EN OFERTA</h2>

       <div id="destacados">
      <div class="producto">
        <h3><a href="ingrediente.php?producto=8">TURRON</a></h3>
        <p>Descubre nuestros nuevos turrones hechos a mano</p>
      </div>
      <div class="producto">
        <h3><a href="ingrediente.php?producto=7">TURRON</a></h3>
        <p>Prueba nuestro delicioso panetone</p>
      </div>
      <div class="producto">
        <h3><a href="ingrediente.php?producto=4">TURRON</a></h3>
        <p>No te quedes sin tu empanada</p>
      </div>
    </div>

    <div id="info">
      <h2>Bienvenidos a Panaderia Cordo</h2>
      <p>
        En panderia Cordo llevamos años trabajando con las mejores materias
        primas para poder ofrecerle el producto de mayor calidad, no se lo
        piense y descubre nuestras elaboraciones
      </p>
    </div>
    

    <div id="formulario">
      <form action="">
        <label>Nombre</label>
        <div class="input"><input type="text" /><br /></div>
        <label>Apellido</label>
        <div class="input"><input type="text" /><br /></div>
        <label>Telefono de contacto</label>
        <div class="input">
          <input type="text" />
        </div>
        <label>Texto</label>
        <div class="input">
          <input type="text" />
        </div>
        <div>
          <p onclick="quitar()">Enviar</p>
        </div>
      </form>
    </div>
  </main>


  <footer id="footer">
    <div id="c_footer">
      <div class="redes">
        <img src="view/media/baguette.png" alt="" />
      </div>
      <div class="contacto">
        <div>
          <p>Contacto</p>
          <p>Empresa</p>
        </div>
      </div>
      <div class="redes">
        <img src="view/media/dialibre.jfif" alt="" />
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
<script>
  function quitar() {
    document.getElementById("footer").style.visibility = "hidden";
  }
</script>

</html>
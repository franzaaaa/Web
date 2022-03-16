<<<<<<< HEAD
<?php
session_start();
?>
=======
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<<<<<<< HEAD
  <title>Panadería Cordo</title>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqshYJCPH7usqvJJhY3VEC6iocz8obcYI&callback=initMap">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
=======
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
  <link rel="stylesheet" href="view/css/ejercicio1.css" />
</head>

<body>
  <header>
    <div id="c_header">
      <div id="logo">
<<<<<<< HEAD
=======
        <a href="">Panadería Cordo</a>
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
      </div>
    </div>
    <div id="menu">
      <a href="shop.php">Tienda Online</a>
      <div id="menu2">
        <div class="dropdown">
<<<<<<< HEAD
          <a style="font-weight: bolder;" class="btn dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
            if (!isset($_SESSION["email"])) {
              echo "<li><a class='dropdown-item' href='../Proy/view/html/login.php'>Perfil</a></li>";
              echo "<li><a class='dropdown-item' href='./register.php'>Registrarse</a></li>";
            } else {
              echo "<li><a class='dropdown-item' href='profile.php'>Perfil</a></li>";
            }

            ?>
          </ul>
        </div>
        <?php
        if (!isset($_SESSION["email"])) {
          echo "<a href='index.php'>Carrito</a>";
        } else {
          echo "<a href='carrito.php'>Carrito</a>";
        }
        ?>
=======
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
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
      </div>
    </div>
  </header>

  <main>
<<<<<<< HEAD
  <div id="carouselExampleCaptions" class="carousel carousel-size" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner carousel-size">
        <div class="carousel-item active carousel-size">
          <img src="view/media/bolleria1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>LOS MEJORES PRODUCTOS</h5>
            <p>AL MEJOR PRECIO</p>
          </div>
        </div>
        <div class="carousel-item carousel-size">
          <img src="view/media/roscon.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Prueba nuestro roscón</h5>
          </div>
        </div>
        <div class="carousel-item carousel-size">
          <img src="view/media/bolleria2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Descubre nuestra gran variedad de productos</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <div id="info">
      <h2>¡Bienvenidos a Panaderia Cordo!</h2>
      <br>
      <p>
        En Panaderia Cordo llevamos años trabajando con las mejores materias
        primas para poder ofrecerle el producto de mayor calidad, no se lo
        piense y descubre nuestras elaboraciones.
      </p>
      <p>
        Descubre semanalmente nuevas mejores ofertas
      </p>
    </div>


    <h2 id="oferta">EN OFERTA</h2>
    <div id="destacados">
      <div class="producto">
        <h3><a href="ingrediente.php?producto=13">EMPANADILLA DE POLLO</a></h3>
      </div>
      <div class="producto">
        <h3><a href="ingrediente.php?producto=20">CRISTINA DE NATA</a></h3>
      </div>
      <div class="producto">
        <h3><a href="ingrediente.php?producto=21">CRISTINA DE CREMA</a></h3>
      </div>
    </div>


    <div id="formulario">
      <h3>Formulario de contacto</h3>
      <form action="">
        <label>Nombre</label>
        <div class="input">
          <input type="text" name="nombre" placeholder="Nombre:" /><br />
        </div>

        <label>Apellido</label>
        <div class="input">
          <input type="text" name="apellido" placeholder="Apellido:" /><br />
        </div>

        <label>Email de contacto</label>
        <div class="input">
          <input type="text" name="email" placeholder="Email:" />
        </div>

        <label>Comentario</label>
        <div class="input">
          <textarea name="" id="" cols="30" rows="6" name="coment"></textarea>
        </div>

        <div class="input">
          <input type="button" name="form" id="form" value="Contactar" />
=======
    
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
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
        </div>
      </form>
    </div>
  </main>


  <footer id="footer">
    <div id="c_footer">
<<<<<<< HEAD

      <div class="contacto">
        <div>
          <h3>Horario</h3>
          <p>Lunes-Sabado: 6:00/15:00 , 17:00/21.00</p>
          <p>Domingo: 6:00/15:00</p>
        </div>
      </div>

      <div class="contacto">
        <div>
          <h3>Dirección</h3>
          <p>Estrada Cangas-Vilaboa, 82</p>
          <p>36957 Domaio, Pontevedra</p>
        </div>
      </div>

      <div id="map">
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function initMap() {
      //Opciones
      const myLatLng = {
        lat: 42.28675,
        lng: -8.6820622
      };
      var options = {
        zoom: 15,
        center: myLatLng,
      };

      //Mapa
      const map = new google.maps.Map(document.getElementById("map"), options)

      //Marker
      var marker=new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello World!",
      });
    }

  </script>

</body>
=======
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
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8

</html>
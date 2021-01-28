<?php
//hämta hostname från PHP servern och sätt den så vi kan använda den senare
//använd file_get_content för att hämta alla produkter som json
//serialisera ner det till ett objekt vi kan använda
$response = file_get_contents("http://localhost:8888/api/produkt.php");
$json_output = json_decode($response,true);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dator kiosken</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Dator kiosken</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Hem
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Produkter</h1>
        <div class="list-group">
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
 
        </div>

        <div class="row">
        <?php for ($i = 0; $i <= count($json_output)-1; $i++) {
          echo "<div class=\"col-lg-4 col-md-6 mb-4\">";
          echo "<div class=\"card h-100\">";
          echo "<a href><img  class=\"card-img-top\" src=\"" . $json_output[$i]['bild']."\"></a>";
          echo "<div class=\"card-body\">";
          echo "<h4 class=\"card-title\">";
          echo "<a href=\"#\">".$json_output[$i]['namn']."</a>";
          echo "</h4>";
          echo "<h5>". $json_output[$i]['pris'] . " kr </h5>";
          echo "<p class=\"card-text\">".$json_output[$i]['beskrivning']."</p>";
          echo "</div>";
          echo "<div class=\"card-footer\">";
          echo "<small class=\"text-muted\"> Antal i lager : ".$json_output[$i]['lagerAntal'] ."</small>";
          echo "</div>";
          echo  "</div>";
          echo  "</div>";
        }?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;Dator Kiosken</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
 
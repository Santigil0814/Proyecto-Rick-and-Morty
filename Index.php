<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/episode',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

$api = json_decode($response,true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rick And Morty</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css" type="text/css" media="all" />
  <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU" alt="" width="30" height="30" class="d-inline-block align-text-top">
      Rick and Morty API
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Capitulos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Personajes</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

  <div class="cuerpo">

    <h1>Capitulos</h1>

    <div class="cards">

  <?php
      foreach ($api['results'] as $key => $value) {
        $name = $value['name'];
        $episode = $value['episode'];
        $air_date = $value['air_date'];
        $url = $value['url'];
    ?>
    
      <div class="card">
        <img src="https://es.web.img3.acsta.net/pictures/18/10/31/17/34/2348073.jpg">
        <div class="card-body">
          
          <h5 class="card-title"><?php echo $name ?></h5>
          <h6 class="card-text"><?php echo $episode ?></h6>
          <h6 class="card-text"><?php echo $air_date ?></h6>
        
        </div>

        <form action="./detalle.php" method="POST">
          <input style="display: none;" name="url" class="input" value="<?php echo $url ?>">
          <center>
          <button class="btn btn-primary">Detalle</button>
          </center>
        </form>

      </div>
    
    <?php
      }
    ?>

  </div>

  

  <footer> © Created by Santiago Gil Ramirez | 2022</footer>

</body>
</html>

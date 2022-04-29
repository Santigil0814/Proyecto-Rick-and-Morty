<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/character',
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="Personajes.css">
  <title>API RICK AND MORTY</title>
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
          <a class="nav-link" href="index.php">Capitulos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Personajes.php">Personajes</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<table class="table">
  <thead>
    <h1 class="tituloPer">Personajes</h1>
    <tr>
      <th scope="col">IMAGEN</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">GENERO</th>
      <th scope="col">ESPECIE</th>
      <th scope="col">FECHA DE CREACION</th>
      <th scope="col">URL</th>
    </tr>
  </thead>
  <tbody>

  <?php

foreach ($api['results'] as $key => $value) {
  $nombre = $value['name'];
  $especie = $value['species'];
  $genero = $value['gender'];
  $imagen = $value['image'];
  $creacion = $value['created'];
  $url = $value['url'];

?>

    <tr>
      <th scope="row"><img src="<?php echo $imagen ?>" width="200px"></th>
      <td><?php echo $nombre ?></td>
      <td><?php echo $especie ?></td>
      <td><?php echo $genero ?></td>
      <td><?php echo $creacion?></td>
      <td><?php echo $url?></td>
    </tr>
  <?php
  }
  ?>

  </tbody>
</table>
</body>
</html>
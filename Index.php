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

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU" alt="" width="30" height="30" class="d-inline-block align-text-top">
      Rick and Morty API
    </a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<div class="cuerpo">

  <h1>Rick and Morty</h1>
 
  <form action="./detalle.php" method="post">

  <div class="cards">

 <?php
    foreach ($api['results'] as $key => $value) {
      $id = $value['id'];
      $name = $value['name'];
      $episode = $value['episode'];
      $air_date = $value['air_date'];
      $created = $value['created'];
      $url = $value['url'];
  ?>
   
    <div class="card">
      <img class="imagen" src="https://es.web.img3.acsta.net/pictures/18/10/31/17/34/2348073.jpg">
      <div class="card-body">
        <h4 class="card-title"><?php echo $name ?></h4>
        <h6 class="card-text"><?php echo $episode ?></h6>
        <h6 class="card-text"><?php echo $air_date ?></h6>

        <input style= "display: none;" name="url" value="<?php echo $url ?>">
        <button type="submit" class="btn btn-primary">Detalle</button>
      </div>
    </div>
  
  <?php
    }
  ?>

  </div>

  </form>

  <footer> © Created by Santiago Gil Ramirez | 2022</footer>

</body>
</html>

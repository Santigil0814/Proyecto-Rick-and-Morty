<?php

  $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => $_POST['url'],
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
  <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU">
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

<?php 
  foreach ( [$api] as $key => $value) {    
?>
<center>
<div class="tarjeta">
  <div>
    <img class="img-fluid" src="<?php echo $value['image']?>">
  </div>
  <div class="derecha">
    <h3>Información:</h3>
    <h5 class="card-title"><?php echo $value['name']?></h5>
    <p class="card-text"><?php echo $value['species']?></p>
    <p class="card-text"><?php echo $value['gender']?></p>
    <p class="card-text"><?php echo $value['status']?></p>
  </div>      
</div>  
</center>    
<?php
  }
?>

</div>
  <center>
    <button  class="btn btn-primary" onClick="window.history.back()">Volver</button>
  </center>
<div class="character_episodes">

<div class="title">
  <h1>Episodios donde aparecio</h1>
</div>

<div class="episodes-cont">
  <?php 
    foreach ($api['episode'] as $key => $value) {
            
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $value,
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

<form  class="episodes" action="../Details_episode/details.php" method="POST">
  <div class="card">
    <img src="https://es.web.img3.acsta.net/pictures/18/10/31/17/34/2348073.jpg" alt="episode image" />
    <div class="card-body">
      <h5 class="card-title"><?php echo $api['name'] ?></h5>
      <h6 class="card-text"><?php echo $api['episode'] ?></h6>
      <h6 class="card-text"><?php echo $api['air_date'] ?></h6>
       
      <input type="text" value="<?php echo $value['url'] ?>" name="url" style="display: none" />
      <button type="submit">Detalle</button>
      <?php echo $api['url'] ?>
    </div>
  </div>
</form>
<?php
  }
?>

</div>

</div>

</body>
</html>
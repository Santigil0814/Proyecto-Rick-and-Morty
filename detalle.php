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
  <title>Detalle Rick And Morty</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="detalle.css" type="text/css" media="all" />
  <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU">
</head>
<body>

<div class="conte">

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU" alt="" width="30" height="30" class="d-inline-block align-text-top">
      Rick and Morty API
    </a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>


<!-- detalle arriba -->

<div class="cont-detail">
  <div>
    <img class="img-fluid" src="https://es.web.img3.acsta.net/pictures/18/10/31/17/34/2348073.jpg">
  </div>
  <div>

    <?php
            
      $name = $api['name'];
      $episode = $api['episode'];
      $air_date = $api['air_date'];

    ?>

    <h3><?php echo $episode ?></h3>
    <h6><?php echo $name?></h6> 
    <h6><?php echo $air_date ?></h6>
  </div>
</div>

<!-- detalle personajes -->

<div class="cards">

<?php

  foreach ($api['characters'] as $key => $value) {

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

<?php
        $imagen =$api['image'];
        $name = $api['name'];
        $url = $api['url'];
    ?>

    

  <div class="card">
    <img src="<?php echo $imagen ?>">
    <div class="">
          
      <h5 class=""><?php echo $name ?></h5>
      <h6 class=""><?php echo $url ?></h6>
        
    </div>
  </div><?php }?>
</div>


<footer> © Created by Santiago Gil Ramirez | 2022</footer>
 
</div>

</body>
</html>
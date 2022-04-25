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


// print_r($response);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle Rick And Morty</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css" type="text/css" media="all" />
  <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROVGAz_bMma7Xc6od4CvojOmucnXvQyVrg5Q&usqp=CAU">
</head>
<body>

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

<div class="container">
  <div class="row">
    <div class="col col-lg-6">
      Column
    </div>
    <div class="col col-lg-6">
      <div >
        <div class="row">
          <p>Rick Sánchez es la definición exacta de "científico loco". Es alcohólico, es un genio, es
          irresponsable y está loco. Rick acaba de mudarse a casa de su hija Beth y allí recuerda que
          tiene un nieto llamado Morty. Sin preguntar a nadie, decide que va a obligarle a que le 
          acompañe a todo tipo de aventuras para que el chico se vuelva inteligente como él y no se 
          convierta en un idiota como Jerry, padre de Morty y yerno de Rick.</p>

          <p>Así, Rick y Morty comienzan a vivir aventuras intergalácticas a pesar de que la familia no
          quiere que lo sigan haciendo. Poco a poco tienen que intentar encontrar un equilibrio entre 
          su vida familiar y sus viajes a través del espacio y por distintas realidades paralelas, 
          algo que no es fácil para el pequeño Morty que es incapaz de tener una vida normal al 
          margen de su abuelo.</p>

          <p>Justin Roiland (Hora de aventuras) es el encargado de dar voz a los dos personajes 
          principales: Rick y Morty. Sarah Chalke (Scrubs) interpreta a Beth Smith, Chris Parnell 
          (Archer) es Jerry y Spencer Grammer (Greek) es Summer Smith, la hermana mayor de Morty. 
          En España, el reparto de doblaje está compuesto por Txema Moscoso, Rodri Martín, Héctor 
          Indriago, Susana Damas y Sara Iglesias.</p>

          <p>Rick y Morty es una animación de ciencia ficción para adultos creada, producida y escrita 
          por Justin Roiland (Hora de aventuras) y Dan Harmon (Community, Monster House) para Adult 
          Swim. Justin Roiland's Solo Vanity Card Productions, Harmonious Claptrap y Williams Street 
          son las empresas productoras junto a Starburns Industries (del año 2013 al 2014) y Rick and
          Morty, LLC. (de 2015 hasta el presente).</p>
        </div>
      </div>
    </div>
  </div>
</div>

<footer> © Created by Santiago Gil Ramirez | 2022</footer>
  
</body>
</html>
<?php include("config.php");?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
      <style>
      .hero {
        height: 300px;

      }
    </style>
  </head>
  <body>
<!-- menüü -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary  border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Avaleht</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Hinnad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontakt</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Otsi..." aria-label="Search" name="search"/>
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>
<!-- /menüü -->

<?php
$paring = 'SELECT * FROM cars WHERE id='.$_GET["car_id"].'';
$valjund = mysqli_query($yhendus, $paring);
$rida = mysqli_fetch_row($valjund);
var_dump($rida);
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Auto nimi</h1>
                <p>Andmed</p>
                <h2>Kalkulaator</h2>
            </div>
            <div class="col-sm-6">
                <img src="https://loremflickr.com/600/350/<?php echo $rida[1]; ?>" alt="auto">
            </div>
        </div>        
    </div>
       

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
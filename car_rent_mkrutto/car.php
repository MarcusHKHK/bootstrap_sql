<?php include("config.php");?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto andmed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
      <style>
      .hero {
        height: 300px;

      }
    </style>
  </head>
  <body class="bg-success-subtle">
<!-- menüü -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary  border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="http://localhost/car_rent_mkrutto/index.php">Autorent</a>
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
?>

    <div class="container">
        <div class="row py-3">
            <div class="col-sm-6 bg-secondary rounded-start">
              <div class="container bg-dark rounded text-white my-4">
                <h1><?php echo $rida[1]; ?></h1>
                <p>Andmed:</p>
                <p>
                Mootor: <?php echo $rida[3]; ?><br>
                Kütus: <?php echo $rida[4]; ?><br>
                </p>
                <h2>Kalkulaator</h2>
                <form action="car.php" method="get">
                  <input type="hidden" name="car_id" value="<?php echo $_GET['car_id']; ?>">
                  
                  Mitu päeva rendite: <input type="number" id="rtime" name="rtime" required>
                  <input type="submit" value="Submit">
                </form>
                Hind: <?php echo $rida[5]; ?>€/päev</p>
                Rendi hind kokku: <?php echo $_GET['rtime']*$rida[5] ?>
              </div>
            </div>
            <div class="col-sm-6 bg-secondary rounded-end">
              <div class="container my-3 centered">
                <img class="rounded" src="https://loremflickr.com/575/325/<?php echo $rida[1]; ?>" alt="auto">
              </div>
            </div>
        </div>        
    </div>
       

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
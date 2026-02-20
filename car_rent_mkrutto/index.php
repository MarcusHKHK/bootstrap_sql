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

<!-- hero -->
 <div class="container py-4">
      <div class="hero bg-body-tertiary p-4">
        <div class="row  d-flex">
          <div class="col-sm-6">
            <h1 class="fw-bold">Rendi<br>auto<br>soodsalt!</h1>
            <p class="text-secondary">Lai valik autosid igaks olukorraks</p>
            <button class="btn btn-dark">Vaata autosid</button>
          </div>
          <div class="col-sm-6">
            <img class="image-fluid" src="https://loremflickr.com/600/250/mustang" alt="autopilt">
          </div>
        </div>
      </div>
    </div>
<!-- /hero -->

<?php
$paring = 'SELECT * FROM cars'; // Original string

if (isset($_GET["search"])) {
  $otsi = $_GET["search"];
  // Added a space before WHERE
  $paring .= ' WHERE mark LIKE "%'.$otsi.'%"'; 
}

// Added a space before LIMIT just to be safe
$paring .= ' LIMIT 12'; 

$valjund = mysqli_query($yhendus, $paring);

?>


        <!-- autode kaardid -->
        <div class="container">
          <!-- Alert kast kui autot ei leitud -->
          <?php
            if ($result=mysqli_query($yhendus,$paring)){
              $rowcount=mysqli_num_rows($result);
              if ($rowcount == 0){
                echo'
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Auto</strong> otsingut ei leitud!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                ';
              }

            }
          ?>
          

          <div class="row">
            <?php
        while($rida = mysqli_fetch_row($valjund)){ 
            ?>
            <!-- kaart --> 
            <div class="col-sm-3">
              <div class="card my-2" style="width: 19rem;">
                <img src="https://loremflickr.com/600/350/<?php echo $rida[1]; ?>" class="card-img-top" alt="auto">
                <div class="card-body">
                  <div class="row">
                    <div class="col"><h5 class="card-title"><?php echo $rida[1]; ?></h5></div>
                    <div class="col text-end"><i class="bi bi-heart"></i></div>
                  </div>

                  <p class="card-text text-secondary"><?php echo $rida[2]; ?></p>
                  <p class="card-text">
                  Mootor: <?php echo $rida[3]; ?><br>
                  Kütus: <?php echo $rida[4]; ?><br>
                  Hind: <?php echo $rida[5]; ?>€/päev</p>
                  <a href="http://localhost/car_rent_mkrutto/car.php" class="btn btn-dark w-100">Rendi</a>
                </div>
              </div>
            </div>
            <!-- /kaart -->
           <?php } ?>

        <!-- Leäekülie nr -->

        <nav>
          <ul class="pagination py-5 justify-content-center">
            <li class="page-item"><a class="page-link link-dark border-secondary" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link link-dark border-secondary" href="#">1</a></li>
            <li class="page-item"><a class="page-link link-dark border-secondary" href="#">2</a></li>
            <li class="page-item"><a class="page-link link-dark border-secondary" href="#">3</a></li>
            <li class="page-item"><a class="page-link link-dark border-secondary" href="#">Next</a></li>
          </ul>
        </nav>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
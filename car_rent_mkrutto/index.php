<?php include("config.php");?>

<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <style>
    .hero{
      height: 300px;

    }
  </style>
  <body>
    <div class="container"></div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container">
          <a class="navbar-brand px-3 fw-bolder" href="#">Autorent</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="offcanvas-body">
              <ul class="navbar-nav flex-grow-1 me-5">
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
                  <form class="d-flex justify-content-end" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </ul>
            </div>
          </div>
        </div>
        <br>
      </nav>

      <div class="container py-4 d-flex">
        <div class="hero">
          <div class="row bg-body-tertiary m-1">
            <div class="col-sm-6">
              <h1 class="fw-bold">Rendi <br>Auto <br>Soodsalt</h1>
              <p>Lai valik usaldusväärseid autosid igaks olukorraks</p>
              <button class="btn btn-dark">Vaata autosi</button>
            </div>
            <div class="col-sm-6">
              <img class="image-fluid py-2" style="height: 100%;" src="https://picsum.photos/id/274/600/250" alt="autopilt">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row py-3">

<?php
//päring 
$paring = 'SELECT * FROM cars LIMIT 8';
$valjund = mysqli_query($yhendus, $paring);

// while($rida = mysqli_fetch_row($valjund)){ 
//   print_r($rida[1]. "<br>"); 
// }


?>

          <?php
while($rida = mysqli_fetch_row($valjund)){ 
          ?>
          <!-- Kaart -->

          <div class="col-sm-3">
            <div class="card" style="width: 19rem;">
              <img src="https://picsum.photos/id/684/600/400" alt="auto">
              <div class="card-body">
                <div class="row">
                  <div class="col"><h5 class="card-title"><?php echo $rida[1];?></h5></div>
                  <div class="col text-end"><i class="bi bi-heart"></i></div>                
                </div>

                <p class="card-text text-secondary"><?php echo $rida[2];?></p>
                <p class="card-text">
                Mootor: <?php echo $rida[3];?> <br>
                Kütus: <?php echo $rida[4];?> <br>
                Hind: <?php echo $rida[5];?>/päev </p>
                <a href="#" class="btn btn-dark w-100">Rendi</a>
              </div>
            </div>
          </div>
          <?php
}
          ?>

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
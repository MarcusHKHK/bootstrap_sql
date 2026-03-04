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
      <a class="navbar-brand fw-bold" href="http://localhost/car_rent_mkrutto/admin/index.php">Autorent Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Autod</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reserveeringud</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kasutajad</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <button class="btn btn-outline-secondary" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>
<!-- /menüü -->

  <?php
  $paring = 'SELECT * FROM cars'; // Original string
  if (isset($_GET["search"])) {
    $otsi = $_GET["search"];
    // Added a space before WHERE
    $paring .= ' WHERE mark LIKE "%'.$otsi.'%"'; 
  }
  // Added a space before LIMIT just to be safe
  $paring .= ' LIMIT 10'; 
  $valjund = mysqli_query($yhendus, $paring);
  ?>
  <!-- Auto list ja lisa nupp -->
  <div class="container py-2">
      <div class="row">
          <div class="col-sm-6">
              <h1>Autod</h1>
              <p>Halda autorendi autode nimekirja.</p>
          </div>
          <div class="col-sm-6">
          </div>
      </div>
  <table class="table align-middle border rounded">
      <thead class="table-light">
          <tr>
              <th>Pilt</th>
              <th>Auto</th>
              <th>Mootor</th>
              <th>Kütus</th>
              <th>Hind</th>
              <th>Kirjeldus</th>
              <th>Staatus</th>
              <th class="text-end">Tegevused</th>
          </tr>
      </thead>
      <?php
      while($rida = mysqli_fetch_row($valjund)){ 
      ?>
      <tbody>
          <tr>
              <td> <img src="https://loremflickr.com/80/50/<?php echo $rida[1]; ?>" class="rounded" alt="auto"></td>
              <td><strong><?php echo $rida[1]." ".$rida[2] ?></strong><br><small class="text-muted"><?php echo $rida[7] ?></small></td>
              <td><?php echo $rida[3]; ?></td>
              <td><?php echo $rida[4]; ?></td>
              <td><?php echo $rida[5]; ?>€/päev</td>
              <td><?php echo $rida[10] ?></td>
              <td><?php echo $rida[11] ?></td>
              <td class="text-end">
                  <div class="btn-group btn-group-sm" role="group">
                      <button type="button" class="btn btn-outline-primary">Muuda</button>
                      <button type="button" class="btn btn-outline-danger">Kustuta</button>
                  </div>
              </td>
          </tr>
      </tbody>
      <?php
      } 
      ?>
  </table>
  <div class="d-flex justify-content-end">
      <a href="http://localhost/car_rent_mkrutto/admin/add_car.php" class="btn btn-dark border">Lisa auto</a>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
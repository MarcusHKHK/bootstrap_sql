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
    <a class="navbar-brand fw-bold" href="http://localhost/car_rent_mkrutto/admin.php">Autorent Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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


    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Lisa auto</h2>
            <a href="http://localhost/car_rent_mkrutto/admin/" class="btn btn-outline-secondary btn-sm">Tagasi</a>
        </div>
        <div class="form-container p-4 shadow-sm">
            <form action="add_car.php" method="get">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Mark</label>
                        <input type="text" class="form-control" id="mark" name="mark" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Mudel</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-muted small">Mootor</label>
                        <input type="text" class="form-control" id="engine" name="engine" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-muted small">Kütus</label>
                        <select class="form-select text-muted" id="fuel" name="fuel">
                            <option selected disabled>Vali</option> 
                            <?php 
                            while($rida = mysqli_fetch_assoc($valjund)){ ?>
                                <option value="<?php echo $rida['fuel']; ?>">
                                    <?php echo $rida['fuel']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-muted small">Hind (€ / päev)</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Aasta</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Käigukast</label>
                        <input type="text" class="form-control" id="transmission" name="transmission" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Kirjeldus</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Status</label>
                        <select class="form-select text-muted" id="status" name="status">
                            <option selected disabled>Vali</option> 
                            <option value="vaba">Vaba</option>
                            <option value="rendidud">Rendidud</option> 
                            <option value="hoolduses">Hoolduses</option> 
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Auto pilt</label>
                        <input class="form-control" type="file">
                        <div class="form-text small">Lubatud formaadid: JPG, PNG, WEBP.</div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-dark px-4">Salvesta</button>
                    <button type="button" class="btn btn-outline-secondary px-4">Tühista</button>
                </div>
                <?php
                // Andmed:
                $mark = $_GET['mark'];
                $model = $_GET['model'];
                $engine = $_GET['engine'];
                $fuel = $_GET['fuel'];
                $price = $_GET['price'];
                $year = $_GET['year'];
                $transmission = $_GET['transmission'];
                $description = $_GET['description'];
                $status = $_GET['status'];
                
                ?>
            </form>
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporditarvete kalkulaator</title>
    <link rel="icon" href="./pildid/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/kalkulaator.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    
    <div class="container mt-5">
      <h2 class="mb-4">Treeneri kalkulaator</h2>
      <form method="post" class="mb-3">
        <div class="mb-3">
          <label for="treener" class="form-label">Vali treeneri tüüp:</label>
          <select class="form-select" id="treener" name="treener" required>
            <option value="" disabled selected>-- Vali treener --</option>
            <option value="professionaalne">Professionaalne Treener (€50/h)</option>
            <option value="tavaline">Tavaline Treener (€30/h)</option>
            <option value="opilas">Õpilas Treener (€15/h)</option>
            <option value="gabriel">Gabriel Hännikäinen (€2/h)</option>
            <option value="maria">Maria (€0.5/h)</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="hours" class="form-label">Mitu tundi:</label>
          <input type="number" class="form-control" id="hours" name="hours" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Arvuta</button>
      </form>

      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $treenerituup = $_POST['treener'];
          $hours = (int)$_POST['hours'];

          $prices = [
            'professionaalne' => 50,
            'tavaline' => 30,
            'opilas' => 15,
            'gabriel' => 2,
            'maria' => 0.5
          ];

          if (isset($prices[$treenerituup]) && $hours > 0) {
            $total = $prices[$treenerituup] * $hours;
            echo "<div class='alert alert-success'>Treeneri kogukulu: <strong>€".$total."</strong></div>";
          } else {
            echo "<div class='alert alert-danger'>Vigane sisestus.</div>";
          }
        }
      ?>
    </div>
    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
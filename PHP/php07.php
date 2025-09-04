<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <?php
        echo "<br>"; 
        function tere() {
          return "Tere päiksekesekene!";
        }
        echo tere();
        echo "<br>";
        echo "<br>";
        function uudised() {
          echo '<form>';
          echo '<div class="form-group">';
          echo '<label for="exampleInputEmail1">Email address</label>';
          echo '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">';
          echo '<small id="emailHelp" class="form-text text-muted">Liitu meie uudiskirjaga.</small>
          </div>';
        }
        
        echo uudised();
      ?>
        <button onclick="<?php echo "Oled liitunud meie uudiskirjaga";?>" type="submit" class="btn btn-primary">Liitu</button>
      </form>
      <br>
      <br>
      <br>
      <?php
            function kasutajanimi() {
              if (isset($_GET['name1'])) {
                $nimi = strtolower($_GET['name1']);
                $nimituhikuta = str_replace(' ','',$nimi);
                  echo $nimituhikuta."@hkhk.edu.ee";
                  $tahed = str_shuffle($nimituhikuta);
                  $numbird = [1,2,3,4,5,6,7,8,9];
                  $numbridshuffled = shuffle($numbird);
                  echo $nimituhikuta;
                }
            }
      ?>
      <form method="get">
        <div class="form-group">
          <label>Nimi</label>
          <input type="text" name="name1" class="form-control" placeholder="Sisesta nimi">
          <small class="form-text text-muted">Loome sulle @hkhk.edu.ee</small>
        </div>
      </form>
      <?php 
        kasutajanimi();
      ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
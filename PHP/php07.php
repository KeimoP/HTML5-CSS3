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
      function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }
            function kasutajanimi() {
              if (isset($_GET['name1'])) {
                $nimi = strtolower($_GET['name1']);
                $nimituhikuta = str_replace(' ','',$nimi);
                  echo $nimituhikuta."@hkhk.edu.ee";
                  $tahed = str_shuffle($nimituhikuta);
                  $numbird = [1,2,3,4,5,6,7,8,9];
                  $numbridshuffled = shuffle($numbird);
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
      <table class="table table-bordered border-primary">
        <tbody>
          <tr class="table-active">
            <td>kasutajanimi:</td>
            <td>
              <?php 
                kasutajanimi();
              ?>
            </td>
          </tr>
          <tr>
            <td>Parool:</td>
            <td><?php echo generateRandomString(7);?></td>
          </tr>
        </tbody>
      </table>
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <input type="number" class="form-control" name="a"><br>
            <label for="floatingInputGrid">Number:</label>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <input type="number" class="form-control" name="b"><br>
            <label for="floatingSelectGrid">Kuni:</label>
          </div>
        </div>
        <input type="submit" value="genereeri" class="btn btn-success">
      </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
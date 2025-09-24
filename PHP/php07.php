<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php
        echo "<br>"; 
        function tere() {
          return "Tere päiksekesekene!";
        }
        echo tere();
        echo "<br><br>";

        function uudised() {
          echo '<form method="post">';
          echo '<div class="form-group">';
          echo '<label for="exampleInputEmail1">Email address</label>';
          echo '<input type="email" class="form-control" name="uudisemail" placeholder="Enter email">';
          echo '<small class="form-text text-muted">Liitu meie uudiskirjaga.</small>';
          echo '</div>';
          echo '<button type="submit" name="liitu" class="btn btn-primary mt-2">Liitu</button>';
          echo '</form>';
        }

        uudised();

        if (isset($_POST['liitu'])) {
          echo "<br>Oled liitunud meie uudiskirjaga!<br><br>";
        }

        function generateRandomString($length = 7) {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[random_int(0, strlen($characters) - 1)];
          }
          return $randomString;
        }

        function kasutajanimi() {
          if (isset($_GET['name1'])) {
            $nimi = strtolower($_GET['name1']);
            $nimituhikuta = str_replace(' ', '', $nimi);
            echo $nimituhikuta . "@hkhk.edu.ee";
          }
        }

        function vahemikud($a1, $a2, $samm = 1) {
          $vastus = [];
          if ($a1 < $a2 && $samm > 0) {
            for ($i = $a1; $i <= $a2; $i += $samm) {
              $vastus[] = $i;
            }
          }
          return $vastus;
        }

        function rectangleS($a1, $a2){
          return $a1 * $a2;
        }

        function ik($ik) {
          $pikkus = strlen($ik);
          if ($pikkus==11) {
            $sugu = intval($ik[0])%2==0 ? "Naine" : "Mees";
            $sünniaasta = substr($ik, 1, 2);
            $kuu = substr($ik, 3, 2);
            $päev = substr($ik, 5, 2);
            $sajand = '';
            if ($ik[0] == '1' || $ik[0] == '2') $sajand = '18';
            if ($ik[0] == '3' || $ik[0] == '4') $sajand = '19';
            if ($ik[0] == '5' || $ik[0] == '6') $sajand = '20';
            $sünniaeg = $päev . '.' . $kuu . '.' . $sajand . $sünniaasta;
            return "$sugu, Sünniaeg: $sünniaeg";
          } else {
            return "Vale pikkusega";
          }
        }

        function headMotted() {
          $alused = array("Mari", "Jüri", "Eke");
          $oeldised = array("armastab", "viskab", "tõmbab");
          $sihitised = array("kive", "raamatuid", "õhku");
          $lause = $alused[array_rand($alused)] . " " . $oeldised[array_rand($oeldised)] . " " . $sihitised[array_rand($sihitised)] . ".";
          echo "<br><strong>Hea mõte:</strong> $lause<br><br>";
        }

        headMotted();
      ?>

      <form method="get">
        <div class="form-group">
          <label>Nimi</label>
          <input type="text" name="name1" class="form-control" placeholder="Sisesta nimi">
          <small class="form-text text-muted">Loome sulle @hkhk.edu.ee</small>
        </div>
        <input type="submit" class="btn btn-secondary mt-2" value="Genereeri kasutajanimi">
      </form>

      <table class="table table-bordered border-primary mt-4">
        <tbody>
          <tr class="table-active">
            <td>kasutajanimi:</td>
            <td><?php kasutajanimi(); ?></td>
          </tr>
          <tr>
            <td>Parool:</td>
            <td><?php echo generateRandomString(7); ?></td>
          </tr>
        </tbody>
      </table>

      <form method="get">
        <div class="row g-2">
          <div class="col-md">
            <label for="a">Alates:</label>
            <input type="number" class="form-control" name="a">
          </div>
          <div class="col-md">
            <label for="b">Kuni:</label>
            <input type="number" class="form-control" name="b">
          </div>
          <div class="col-md">
            <label for="samm">Samm:</label>
            <input type="number" class="form-control" name="samm" value="1">
          </div>
        </div>
        <input type="submit" value="Genereeri vahemik" class="btn btn-success mt-3">
      </form>
      <iframe src="http://www.staggeringbeauty.com/" style="border: 1px inset #ddd" width="1080" height="598"></iframe>
      <?php
        if (isset($_GET['a']) && isset($_GET['b'])) {
          $samm = isset($_GET['samm']) ? intval($_GET['samm']) : 1;
          $vahemik = vahemikud(intval($_GET['a']), intval($_GET['b']), $samm);
          echo "<br><strong>Vahemik: </strong>" . implode(", ", $vahemik) . "<br><br>";
        }
      ?>

      <h2>Ristküliku pindala</h2>
      <form method="get">
        <div class="row">
          <div class="col">Külg 1 <input class="form-control" type="number" name="kylg1" value="10"></div>
          <div class="col">Külg 2 <input class="form-control" type="number" name="kylg2" value="10"></div>
        </div>
        <br>
        <div class="row">
          <input class="btn btn-danger" type="submit" value="Arvuta">
        </div>
      </form>
      <?php
        if (isset($_GET['kylg1']) && isset($_GET['kylg2'])) {
          $a1 = floatval($_GET['kylg1']);
          $a2 = floatval($_GET['kylg2']);
          echo "<br><strong>Pindala: </strong>" . rectangleS($a1, $a2) . "<br><br>";
        }
      ?>
      <br>
      <br>
      <h2>Isikukood</h2>
      <?php
        echo ik("38011064711");
      ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

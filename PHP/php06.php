<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <?php
            $korda = 0;
            $number = 10;
            $var = range(0, 100);
            $arv1_100 = random_int(1,100);
            if ($arv1_100 !== 0) {
                $vaiksemnumber = $arv1_100 / 10;
            }
            foreach (range(1, $arv1_100) as $i) {
                echo "*";
            }
            foreach (range(1, $vaiksemnumber) as $j) {
                echo "*", "<br>";
            }
            echo "<br>";
            echo "<br>";
            foreach (range(1, $arv1_100) as $i) {
                echo "*";
                $korda += 1;
                if ($korda == 5){
                    echo "<br>";
                    $korda = 0;
                }
            }
            echo "<br>";
            echo "<br>";
            foreach (range(1,10) as $l) {
                echo $number, "<br>";
                $number -= 1;
            }
            echo "<br>";
            echo "<br>";
            foreach ($var as &$kolmega) {
                if ($kolmega % 3 == 0) {
                    echo $kolmega,","," "; 
                }
            }
            echo "<br>";
            echo "<br>";
            $tudrukud = ['mari', 'kati', 'marion', 'kerli', 'Maria'];
            $poisid = ['gabriel','mario','üllar','joonas','henrik']; 
            for ($i = 0; $i < count($tudrukud); $i++) {
                echo "<div class='row'>";
                echo "<div class='col-sm-1'>{$tudrukud[$i]}</div>";
                echo "<div class='col-sm-1'>{$poisid[$i]}</div>";
                echo "</div>";
            }
            echo "<br>";
            echo "<br>";
            
            shuffle($tudrukud);
            shuffle($poisid);
            for ($i = 0; $i < count($tudrukud); $i++) {
                echo "<div class='row'>";
                echo "<div class='col-sm-1'>{$tudrukud[$i]}</div>";
                echo "<div class='col-sm-1'>{$poisid[$i]}</div>";
                echo "</div>";
            }
        ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
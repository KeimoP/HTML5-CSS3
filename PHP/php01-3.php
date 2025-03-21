<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP01-3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<?php
					/*
						PHP Harjutus 1,2
						keimo
						Haapsalu Kutsehariduskeskus
						11.03.2025
					*/
					//muutujate loomine
					$nimi = 'Karin Eegreid';
					$sunnipeav = "11.03.2025";
					$tahtkuju = "leo";

					echo "<br><h1>Harjutus 1</h1>";
					echo "\"It's My Life\" - Dr. Alban <br>";
					echo "<h2>";
					echo "(\(\ <br>";
					echo "( -.-) <br>";
					echo "o_(\")(\") <br>";
					echo "</h2>";
					echo "".$nimi.", ".$sunnipeav.", ".$tahtkuju."";
					echo "<br><br>";

					/*
						Harjutus 2
					*/

					echo "<h1>Harjutus 2</h1>";
					$kaks = 7;
					$uks = 2;
					$j = $uks / $kaks;
					$k = $uks * $kaks;
					$li = $uks + $kaks;
					$la = $uks - $kaks;

					$korrutus = sprintf('Korrutus: %d', $k);
					$liitmine = sprintf('Liitmine: %d', $li);
					$lahutamine = sprintf('Lahutamine: %d', $la);
					$jagamine = sprintf('Jagamine: %0.3f', $j);
					echo $liitmine, "<br>";
					echo $lahutamine, "<br>";
					echo $korrutus, "<br>";
					echo $jagamine, "<br><br>";

					$mm = 1000; // muuda seda

					$cm = $mm / 10;
					$m = $cm / 100;

					echo "Millimeetrid: ", $mm, "<br>";
					echo "Sentimeetrid: ", $cm, "<br>";
					echo "Meetrid: ", $m, "<br><br>";
					
					$a = 10;
					$b = 5;
					$c = sqrt($a**2 + $b**2);
					$umbermoot = $a + $b + $c;
					$pindala = ($a * $a) / 2;
					echo sprintf("Kolmnurga ümbermõõt on: %0.2f", $umbermoot), "<br>";
					echo sprintf("Kolmnurga pindala on: %0.2f", $pindala), "<br>";
				?>
			</div>
			<div class="col-sm-6">
				<?php
					echo "<br>"
				?>
				<h1>Harjutus 3</h1>
				<form method="get">
					a <input type="text" name="a"><br>
					b <input type="text" name="b"><br>
					h <input type="text" name="h"><br>
					<input type="submit" value="Saada">
				</form>
				<?php
					/*
						PHP Harjutus 3
						keimo
						Haapsalu Kutsehariduskeskus
						21.03.2025
					*/
					//lisab vormist saadud andmed muutujasse
					if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['h'])) {
						$a = $_GET['a'];
						$b = $_GET['b'];
						$h = $_GET['h'];
						$trapetsipindala = (($a + $b) * $h) /2;
						$rombiumbermoot = 4 * $a;
						echo "Rombiümbermõõt on: ",$rombiumbermoot,"<br>";
						echo "Trapetsipindala on: ",$trapetsipindala, "<br>";
					}
				?>
			</div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
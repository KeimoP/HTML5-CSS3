<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
				<?php
					/*
						PHP Harjutus 12
						keimo
						Haapsalu Kutsehariduskeskus
						17.09.2025
					*/
					//muutujate loomine
                ?>
                <?php
                    $fail = 'tootajad.csv';
                    $minu_csv = fopen($fail, 'r') or die('Faili ei saa avada!');

                    $meeste_palgad = [];
                    $naiste_palgad = [];

                    while (($rida = fgetcsv($minu_csv, 1000, "\t")) !== FALSE) {
                        if (count($rida) == 3) {
                            $nimi = $rida[0];
                            $sugu = strtolower(trim($rida[1]));
                            $palk = (int)trim($rida[2]);

                            if ($sugu == 'm') {
                                $meeste_palgad[] = $palk;
                            } elseif ($sugu == 'n') {
                                $naiste_palgad[] = $palk;
                            }
                        }
                    }

                    fclose($minu_csv);

                    function statistika($palgad) {
                        if (count($palgad) === 0) {
                            return [0, 0];
                        }
                        $keskmine = array_sum($palgad) / count($palgad);
                        $max = max($palgad);
                        return [$keskmine, $max];
                    }                    

                    list($meeste_keskmine, $meeste_max) = statistika($meeste_palgad);
                    list($naiste_keskmine, $naiste_max) = statistika($naiste_palgad);
                    ?>
                    <div class="row">
                        <h2 class="text-center">Palkade võrdlus</h2>
                        <div class="col">
                            <?php
                                echo "<strong>Mehed:</strong><br>";
                                echo "Keskmine palk: " . round($meeste_keskmine) . " €<br>";
                                echo "Kõrgeim palk: " . $meeste_max . " €<br><br>";
                            ?>
                        </div>
                        <div class="col">
                            <?php
                                echo "<strong>Naised:</strong><br>";
                                echo "Keskmine palk: " . round($naiste_keskmine) . " €<br>";
                                echo "Kõrgeim palk: " . $naiste_max . " €<br><br>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            if ($meeste_keskmine > $naiste_keskmine) {
                                echo "Meeste keskmine palk on kõrgem.";
                            } elseif ($meeste_keskmine < $naiste_keskmine) {
                                echo "Naiste keskmine palk on kõrgem.";
                            } else {
                                echo "Meeste ja naiste keskmised palgad on võrdsed.";
                            }
                        ?>
                    </div>
            </div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
				<?php
					/*
						PHP Harjutus 14
						keimo
						Haapsalu Kutsehariduskeskus
						24.09.2025
					*/
                ?>
                <?php
                    $kataloog = 'pildid';
                    $veerud = 3; // <-- SIIT saad muuta veergude arvu
                    $failid = [];

                    // Kogu pildifailid massiivi
                    if ($asukoht = opendir($kataloog)) {
                        while (false !== ($fail = readdir($asukoht))) {
                            if ($fail != "." && $fail != "..") {
                                $failid[] = $fail;
                            }
                        }
                        closedir($asukoht);
                    }

                    if (count($failid) > 0) {
                        echo "<h3>Pisipildid veergudes ($veerud veergu)</h3>";
                        echo "<table border='0' cellspacing='10'><tr>";

                        $loendur = 0;
                        foreach ($failid as $fail) {
                            $pildi_aadress = "$kataloog/$fail";
                            $andmed = getimagesize($pildi_aadress);
                            $laius = $andmed[0];
                            $korgus = $andmed[1];
                            
                            // Suhtarvu arvutus (nagu õppisime)
                            $max_laius = 120;
                            $max_korgus = 90;
                            if ($laius <= $max_laius && $korgus <= $max_korgus) {
                                $ratio = 1;
                            } elseif ($laius > $korgus) {
                                $ratio = $max_laius / $laius;
                            } else {
                                $ratio = $max_korgus / $korgus;
                            }
                            
                            $pisi_laius = round($laius * $ratio);
                            $pisi_korgus = round($korgus * $ratio);

                            echo "<td align='center'>";
                            echo "<a href='$pildi_aadress' target='_blank'>";
                            echo "<img src='$pildi_aadress' width='$pisi_laius' height='$pisi_korgus'><br>";
                            echo "</a>";
                            echo "</td>";

                            $loendur++;

                            // Uue rea algus
                            if ($loendur % $veerud == 0) {
                                echo "</tr><tr>";
                            }
                        }

                        echo "</tr></table>";
                    } else {
                        echo "Pilte ei leitud.";
                    }
                    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
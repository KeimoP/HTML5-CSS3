<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP08</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<?php
					/*
						PHP Harjutus 8
						keimo
						Haapsalu Kutsehariduskeskus
						11.03.2025
					*/

                    date_default_timezone_set('Europe/Tallinn');

                    echo "<h3>1. Kuupäev ja kellaaeg</h3>";
                    echo date("d.m.Y H:i") . "<br><br>";
                    echo "<h3>2. Vanuse arvutamine</h3>";

                    $synd = 2006; 
                    $tana_aasta = date("Y");
                    $vanus = $tana_aasta - $synd;
                    echo "Kasutaja saab/sai sel aastal <strong>$vanus</strong> aastaseks.<br><br>";

                    echo "<h3>3. Kooliaasta lõpuni</h3>";

                    $tana = time();
                    $tana_aasta = date("Y");

                    $sept_1 = strtotime("1 September $tana_aasta");
                    if ($tana < $sept_1) {
                        $lopp = strtotime("31 August $tana_aasta");
                    } else {
                        $lopp = strtotime("31 August " . ($tana_aasta + 1));
                    }

                    $paevad = floor(($lopp - $tana) / (60 * 60 * 24));
                    $kuupaev = date("d.m.Y", $lopp);
                    echo "Kooliaasta lõpuni ($kuupaev) on jäänud <strong>$paevad</strong> päeva!<br><br>";


                    echo "<h3>4. Aastaaeg ja pilt</h3>";
                    $kuu = date("n");

                    if ($kuu >= 3 && $kuu <= 5) {
                        $aeg = "kevad";
                        $pilt = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fapi.delfi.ee%2Fmedia-api-image-cropper%2Fv1%2F489f1960-b984-11eb-b776-8db3f50e07cf.jpg%3Fnoup%26w%3D1200%26h%3D711%26fx%3D0.623232%26fy%3D0.334375&f=1&nofb=1&ipt=48a9a2e3c7e9e66f7c3b6ebd3d59e63a29a9fec183b54ef1d414856f3abe3954";
                    } elseif ($kuu >= 6 && $kuu <= 8) {
                        $aeg = "suvi";
                        $pilt = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fas2.ftcdn.net%2Fv2%2Fjpg%2F04%2F97%2F13%2F03%2F1000_F_497130354_ZmJ2j4J1YZHIRtevTKNR27v6TVIuoaKI.jpg&f=1&nofb=1&ipt=5d5bac95fb4ea87f00f65eaa6d9bc74a9039e985b2ca6a30427d1dce07e54000";
                    } elseif ($kuu >= 9 && $kuu <= 11) {
                        $aeg = "sügis";
                        $pilt = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fgarden-aed.eu%2Fwp-content%2Fuploads%2F2022%2F08%2F2021-sugis-1.jpg&f=1&nofb=1&ipt=89ae4d183fcfd2d26bf3a6abff87138ec9bdf19396cb387b2f3a29542f364883";
                    } else {
                        $aeg = "talv";
                        $pilt = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fs2.best-wallpaper.net%2Fwallpaper%2F2880x1800%2F2208%2FHeavy-snow-snowflakes-trees-sun-rays-shadow-winter_2880x1800.jpg&f=1&nofb=1&ipt=eb4462887aa78917937f205e6e056892bb4ebc5ef4fd39cab8d2057080551517";
                    }

                    echo "Praegu on <strong>$aeg</strong>.<br>";
                    echo "<img src='$pilt' alt='$aeg' width='400'>";
                    ?>
            </div>
        </div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
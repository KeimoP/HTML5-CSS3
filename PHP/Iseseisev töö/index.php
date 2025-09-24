<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iseseisev töö</title>
    <style>
        body {
            text-align: center;
            margin-top: 100px;
            font-family: Arial, sans-serif;
        }
        img {
            width: 200px;
            height: auto;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body>
	<div class="container-fluid">
				<?php
					/*
						PHP Iseseisev töö
						keimo
						Haapsalu Kutsehariduskeskus
						24.09.2025
					*/
                    if (isset($_POST['kuu'])) {
                        $kuu = (int)$_POST['kuu'];
                    
                        if ($kuu >= 3 && $kuu <= 5) {
                            $aeg = "kevad";
                            $pilt = "https://api.delfi.ee/media-api-image-cropper/v1/489f1960-b984-11eb-b776-8db3f50e07cf.jpg?noup&w=1200&h=711&fx=0.623232&fy=0.334375";
                        } elseif ($kuu >= 6 && $kuu <= 8) {
                            $aeg = "suvi";
                            $pilt = "https://as2.ftcdn.net/v2/jpg/04/97/13/03/1000_F_497130354_ZmJ2j4J1YZHIRtevTKNR27v6TVIuoaKI.jpg";
                        } elseif ($kuu >= 9 && $kuu <= 11) {
                            $aeg = "sügis";
                            $pilt = "https://garden-aed.eu/wp-content/uploads/2022/08/2021-sugis-1.jpg";
                        } else {
                            $aeg = "talv";
                            $pilt = "https://marketplace.canva.com/MADLG1wtobA/1/thumbnail_large-1/canva-winter-wonderland-MADLG1wtobA.jpg";
                        }
                    
                        echo "<p>Selle kuu aastaaeg on: <strong>$aeg</strong></p>";
                        echo "<img src='$pilt' alt='$aeg' width='400'>";
                    }
                    ?>

                    <form method="post" action="">
                        <div class="input-group mb-3 rounded">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Mis kuul sa sündisid</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="kuu">
                                <option value="1">Jaanuar</option>
                                <option value="2">Veebruar</option>
                                <option value="3">Märts</option>
                                <option value="4">Aprill</option>
                                <option value="5">Mai</option>
                                <option value="6">Juuni</option>
                                <option value="7">Juuli</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">Oktoober</option>
                                <option value="11">November</option>
                                <option value="12">Detsember</option>
                            </select>
                            <button class="btn btn-primary ml-2" type="submit">Vaata aastaaega</button>
                        </div>
                    </form>
                    <br>
                    <?php
                        if (isset($_POST['kapital']) && isset($_POST['intress']) && isset($_POST['aastad'])) {
                            $kapital = $_POST['kapital'];
                            $intress = $_POST['intress'];
                            $aastad = $_POST['aastad'];

                            $intress = $intress / 100;

                            $lopp = $kapital * pow(1 + $intress, $aastad);
                        }
                        ?>
            <form method="post" style="max-width: 500px;">
                <h4 class="mb-4 text-center">Intressi Kalkulaator</h4>

                <div class="mb-3">
                    <label for="kapital" class="form-label">Algkapital (€):</label>
                    <input type="number" class="form-control" id="kapital" name="kapital" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="intress" class="form-label">Intressimäär (%):</label>
                    <input type="number" class="form-control" id="intress" name="intress" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="aastad" class="form-label">Aastate arv:</label>
                    <input type="number" class="form-control" id="aastad" name="aastad" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Arvuta</button>
                <?php
                if (isset($lopp)) {
                    echo '<h5>Lõppsumma: ' . round($lopp, 2) . ' €</h5>';
                }
                ?>
            </form>
            <br>
            <h3>
                <?php
                    $hour = date("H");
                        if ($hour == 7) {
                            echo "Kell on 7:00 – Päike tõuseb!";
                            echo '<br><img src="./pildid/paike.png" alt="Päike">';
                        } elseif ($hour == 22) {
                            echo "Kell on 22:00 – Kuu paistab!";
                            echo '<br><img src="./pildid/kuu.png" alt="Kuu">';
                        } else {
                            echo "Praegu ei ole ei päikese ega kuu aeg.";
                        }
                ?>
            </h3>
            <br>
            <br>
            <?php
                function ik($ik) {
                    if (strlen($ik) == 11) {
                        $sugu = intval($ik[0]) % 2 == 0 ? "Naine" : "Mees";
                        $yy = substr($ik, 1, 2);
                        $first = intval($ik[0]);
                        $sajand = '';
                        if ($first == 1 || $first == 2) $sajand = '18';
                        if ($first == 3 || $first == 4) $sajand = '19';
                        if ($first == 5 || $first == 6) $sajand = '20';
                        return "$sugu, Sünniaasta: " . $sajand . $yy;
                    } else {
                        return "Vale pikkusega isikukood";
                    }
                }

                $vastus = '';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $vastus = ik(trim($_POST['isikukood'] ?? ''));
                }
                ?>

                <form method="post" style="max-width: 400px;">
                    <input type="text" name="isikukood" class="form-control" placeholder="Sisesta isikukood" required>
                    <button type="submit" class="btn btn-primary mt-2 w-100">Tuvasta</button>
                    <?php if ($vastus): ?>
                        <?= htmlspecialchars($vastus) ?>
                    <?php endif; ?>
                </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP09</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<?php
					/*
						PHP Harjutus 9
						keimo
						Haapsalu Kutsehariduskeskus
						17.09.2025
					*/
                ?>
                <form method="post">
                    <div class="form-group">
                        <label>Eesnimi: <input class="form-control" type="text" name="eesnimi"></label>
                    </div>
                    <div>
                        <label>Perenimi: <input class="form-control" type="text" name="perenimi"></label>
                    </div>
                    <div>
                        <label>Tekst: <input class="form-control" type="text" name="tekst"></label>
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Saada">
                    </div>
                </form>
                <br>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $ees = $_POST['eesnimi'] ?? '';
                    $per = $_POST['perenimi'] ?? '';
                    $tekst = $_POST['tekst'] ?? '';

                    $ees = trim($ees);
                    $per = trim($per);

                    $ees_lower = strtolower($ees);
                    $per_lower = strtolower($per);
                    $ees_form = ucfirst($ees_lower);
                    $per_form = ucfirst($per_lower);

                    echo "<p>Tere, {$ees_form} {$per_form}!</p>";

                    $tekst2 = strtoupper($tekst);
                    $tukeldatud = mb_str_split($tekst2); 
                    $tekst_punktidega = implode('.', $tukeldatud);
                    $tekst_punktidega = rtrim($tekst_punktidega, '.');
                    echo "<p>Tekst punktidega: {$tekst_punktidega}</p>";

                    $ropud = array('noob', 'loll', 'idioot',"pede","neeger","debiil","türa","tohman","autist");
                    $tekst_ropp = $tekst;
                    foreach ($ropud as $s) {
                        $tähed = mb_strlen($s);
                        $star = str_repeat('*', $tähed);
                        $tekst_ropp = str_ireplace($s, $star, $tekst_ropp);
                    }
                    echo "<p>Tekst ilma roppusteta: {$tekst_ropp}</p>";

                    $asendused = array(
                        'ä'=>'a', 'Ä'=>'a',
                        'ö'=>'o', 'Ö'=>'o',
                        'ü'=>'y', 'Ü'=>'y',
                        'õ'=>'o', 'Õ'=>'o'
                    );
                    $ees_norm = strtr($ees, $asendused);
                    $per_norm = strtr($per, $asendused);

                    $email_user = strtolower($ees_norm . '.' . $per_norm);

                    $email_user = str_replace(' ', '', $email_user);

                    $email = $email_user . '@hkhk.edu.ee';
                    echo "<p>Email: {$email}</p>";
                }
                ?>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
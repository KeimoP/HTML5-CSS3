<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
				<?php
					/*
						PHP Harjutus 13
						keimo
						Haapsalu Kutsehariduskeskus
						11.03.2025
					*/
                ?>
					<?php
                        $kataloog = 'pildid';

                        if (!empty($_FILES['minu_fail']['name'])) {
                            $sinu_faili_nimi = $_FILES['minu_fail']['name'];
                            $ajutine_fail = $_FILES['minu_fail']['tmp_name'];
                            $faili_tyyp = $_FILES['minu_fail']['type'];

                            if ($faili_tyyp == 'image/jpeg' || $faili_tyyp == 'image/jpg') {
                                move_uploaded_file($ajutine_fail, $kataloog . '/' . $sinu_faili_nimi);
                                echo 'Fail üles laetud!<br>';
                            } else {
                                echo 'Ainult JPG ja JPEG failid on lubatud!<br>';
                            }
                        }
                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="minu_fail" class="input-group-text" id="inputGroupFile01">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Lae üles!">
                        </form>

                        <hr>

                        <h2>Üleslaetud pildid:</h2>

                        <?php
                        $asukoht = opendir($kataloog);
                        while ($fail = readdir($asukoht)) {
                            if ($fail != '.' && $fail != '..') {
                                echo '<a href="' . $kataloog . '/' . $fail . '" target="_blank">';
                                echo '<img src="' . $kataloog . '/' . $fail . '" style="height:400px; margin:5px;">';
                                echo '</a>';
                            }
                        }
                        closedir($asukoht);
                        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
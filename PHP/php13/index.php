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
    <input type="file" name="minu_fail"><br>
    <input type="submit" value="Lae üles!">
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

<div class="container my-5" id="tooted">
  <div class="row g-4">
    <?php
    if (($handle = fopen('./sports.csv', 'r')) !== false) {
        $header = fgetcsv($handle);
        $i = 1;
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $nimi = $data[0];
            $hind = $data[1];
            $kategooria = $data[2];

            $img = "https://picsum.photos/seed/{$i}/300/200";

            echo '<div class="col-12 col-sm-6 col-md-3">';
            echo '<div class="card h-100">';
            echo '<img src="' . $img . '" class="card-img-top" alt="' . htmlspecialchars($nimi) . '">';
            echo '<div class="card-body d-flex flex-column">';
            echo '<h5 class="card-title id="'.htmlspecialchars($kategooria).'">' . htmlspecialchars($nimi) . '</h5>';
            echo '<p class="card-text">' . htmlspecialchars($hind) . '€</p>';
            echo '<a href="#" class="btn btn-primary mt-auto">Lisa ostukorvi</a>';
            echo '</div></div></div>';

            $i++;
        }
        fclose($handle);
    }
    ?>
  </div>
</div>

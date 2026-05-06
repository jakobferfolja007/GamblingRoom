<?php
session_start();

$igralec1 = $_POST['igralec1'] ?? $_SESSION['igralec1'] ?? 'Igralec 1';
$igralec2 = $_POST['igralec2'] ?? $_SESSION['igralec2'] ?? 'Igralec 2';
$igralec3 = $_POST['igralec3'] ?? $_SESSION['igralec3'] ?? 'Igralec 3';
$st_kock = $_POST['st_kock'] ?? $_SESSION['st_kock'] ?? 1;
$st_iger = $_POST['st_iger'] ?? $_SESSION['st_iger'] ?? 1;

$_SESSION['igralec1'] = $igralec1;
$_SESSION['igralec2'] = $igralec2;
$_SESSION['igralec3'] = $igralec3;
$_SESSION['st_kock'] = $st_kock;
$_SESSION['st_iger'] = $st_iger;

if (isset($_POST['igralec1']) && !isset($_POST['trenutni_met'])) {
    $_SESSION['skupne_vsote'] = [0, 0, 0];
}

if (!isset($_SESSION['skupne_vsote'])) {
    $_SESSION['skupne_vsote'] = [0, 0, 0];
}

$trenutni_met = $_POST['trenutni_met'] ?? 1;

if (isset($_POST['vrzi'])) {
    $trenutni_met++;
}

$igralci = [$igralec1, $igralec2, $igralec3];
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meti kock</title>
    <link rel="stylesheet" href="css/styleM.css">
</head>
<body>

<div class="glavni">
    <h1>Vrži svojo srečo</h1>

    <div class="vrstica">
        <?php
        foreach ($igralci as $index => $ime) {
            echo "<div class='kartica'>";
            echo "<h2>$ime</h2>";

            $vsota_meta = 0;

            echo "<div class='kocke'>";
            for ($i = 0; $i < $st_kock; $i++) {
                $st = rand(1, 6);
                $vsota_meta += $st;
                echo "<img src='img/dice$st.gif' alt='Kocka'>";
            }
            echo "</div>";

            $_SESSION['skupne_vsote'][$index] += $vsota_meta;
            $skupaj = $_SESSION['skupne_vsote'][$index];

            echo "<p>Vsota tega meta: $vsota_meta</p>";
            echo "<p>Skupna vsota vseh metov: $skupaj</p>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="crta"></div>

    <div class="stevec-meta">
        <?php echo $trenutni_met . '/' . $st_iger; ?>
    </div>

    <form method="post" action="meti.php" class="forma-gumb">
        <input type="hidden" name="trenutni_met" value="<?php echo $trenutni_met; ?>">

        <?php if ($st_iger > 1 && $trenutni_met < $st_iger) { ?>
            <button type="submit" name="vrzi" class="gumb">Vrži</button>
        <?php } ?>

        <?php if ($trenutni_met >= $st_iger) { ?>
            <a href="rezultati.php">
                <button type="button" class="gumb">Rezultati</button>
            </a>
        <?php } ?>
    </form>
</div>

</body>
</html>
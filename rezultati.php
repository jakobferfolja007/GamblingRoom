<?php
session_start();


$igralec1 = $_SESSION['igralec1'] ?? 'Igralec 1';
$igralec2 = $_SESSION['igralec2'] ?? 'Igralec 2';
$igralec3 = $_SESSION['igralec3'] ?? 'Igralec 3';

$vsote = $_SESSION['skupne_vsote'] ?? [0, 0, 0];

$rezultati[0]['ime'] = $igralec1;
$rezultati[0]['tocke'] = $vsote[0];

$rezultati[1]['ime'] = $igralec2;
$rezultati[1]['tocke'] = $vsote[1];

$rezultati[2]['ime'] = $igralec3;
$rezultati[2]['tocke'] = $vsote[2];

usort($rezultati, function($a, $b) {
    return $b['tocke'] - $a['tocke'];
});
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultati</title>
    <link rel="stylesheet" href="css/styleR.css">
</head>
<body>

<div class="glavni">
    <h1 onclick="credits()">Rezultati </h1>

    <p>Vrnitev na začetno stran čez: <span id="timer">15</span> sekund</p>

    <div class="vrstica">

        <div>
            <h2>2. mesto</h2>
            <h3><?php echo $rezultati[1]['ime']; ?></h3>
            <p><?php echo $rezultati[1]['tocke']; ?> točk</p>
        </div>

        <div>
            <h2>Zmagovalec</h2>
            <h3><?php echo $rezultati[0]['ime']; ?></h3>
            <p><?php echo $rezultati[0]['tocke']; ?> točk</p>
        </div>

        <div>
            <h2>3. mesto</h2>
            <h3><?php echo $rezultati[2]['ime']; ?></h3>
            <p><?php echo $rezultati[2]['tocke']; ?> točk</p>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var timeLeft = 15;
var timerEl = document.getElementById("timer");

var countdown = setInterval(function () {
    timeLeft--;
    timerEl.textContent = timeLeft;

    if (timeLeft <= 0) {
        clearInterval(countdown);
        window.location.href = "index.php";
    }
}, 1000);

 function credits(){
          Swal.fire({
                title: 'Credits',
                html:`Avtor: Jakob Ferfolja<br>
                    Projekt: Kockanje<br>
                `,
                icon: 'info',
                confirmButtonText:'Zapri',
            
                customClass:{
                    popup:'moj-alert',
                    title:'moj-alert-title',
                    htmlContainer:'moj-alert-text',
                    confirmButton:'moj-alert-gumb'
                }
            });
        
    }
    </script>
</body>
</html>
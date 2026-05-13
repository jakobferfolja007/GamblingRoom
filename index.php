<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kockanje</title>
    <link rel="stylesheet" href="css/styleI.css">
</head>
<body>

<div class="glavni">

    <h1 onclick="credits()">Vrži svojo srečo</h1>

    <form action="meti.php" method="post">

        <div class="vrstica">
            <input type="text" name="igralec1" class="polje" placeholder="igralec 1" required>
            <input type="text" name="igralec2" class="polje" placeholder="igralec 2" required>
            <input type="text" name="igralec3" class="polje" placeholder="igralec 3" required>
        </div>

        <div class="vrstica">

            <!-- spustni seznam za število iger -->
            <label for="st_iger">Število iger:</label>
            <select name="st_iger" id="st_iger" class="polje">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <!-- spustni seznam za število kock -->
            <label for="st_kock">Število kock:</label>
            <select name="st_kock" id="st_kock" class="polje">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

            <button type="submit" class="gumb">Igraj</button>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
</div>

</body>
</html>
<?php
$length_password = intval($_GET['passwordlength']) ?? "";
var_dump($length_password);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>PHP Strong Password Generator</title>
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura </h2>
        </header>
        <main>
            <!-- FORM -->
            <form action="index.php" method="GET">

                <!-- Password Length -->
                <div class="form-group">
                    <label for="passwordlength">Lunghezza password:</label>
                    <input type="text" class="form-control" id="passwordlength" name="passwordlength">

                </div>

                <!-- Buttons -->
                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Invia</button>
                    <button class="btn btn-secondary" type="reset">Annulla</button>

                </div>
            </form>

        </main>
    </div>
</body>

</html>
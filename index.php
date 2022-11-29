<?php
include __DIR__ . "/partials/functions.php";
session_start();

if (!empty($length_password) && $length_password >= 5) {
    header("Location: ./partials/result.php");
    $_SESSION["password"] = password_generator_repeat($length_password, $password_characters, $check_repetition);
    // var_dump($_SESSION);
}


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

<body class="bg-secondary">
    <div class="container bg-dark  rounded-3 p-3 mt-5">
        <header class="text-center  py-4 ">
            <h1 class="text-white">Strong Password Generator</h1>
            <h2 class="text-white-50">Genera una password sicura </h2>
        </header>
        <main class="bg-light rounded-3 p-4">
            <div>

                <?php if (!$length_password && $length_password != 0) { ?>
                    <div class="alert alert-info" role="alert">
                        <p> Nessun parametro valido inserito </p>
                    </div>

                <?php } elseif ($length_password < 5) { ?>
                    <div class="alert alert-danger" role="alert">
                        <p> La password deve avere come minimo 5 caratteri</p>
                    </div>


                <?php } else {
                    $password = password_generator_repeat($length_password, $password_characters, $check_repetition);
                ?>
                    <p>La tua password è
                        <?php echo $password ?>
                    </p>
                <?php }; ?>


            </div>


            <!-- FORM -->
            <form action="index.php" method="GET" class="row">

                <!-- Password Length -->
                <section class="col-12 mb-4">
                    <div class="form-group">
                        <label for="passwordlength">Lunghezza password:</label>
                        <input type="text" class="form-control" id="passwordlength" name="passwordlength">
                    </div>
                </section>

                <!-- Choose type of password-->
                <section class="col-6">
                    <label>Seleziona tipologia caratteri:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="lettere">
                        <label class="form-check-label" for="flexCheckDefault">
                            Lettere
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="numeri">
                        <label class="form-check-label" for="flexCheckChecked">
                            Numberi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="simboli">
                        <label class="form-check-label" for="flexCheckChecked">
                            Simboli
                        </label>
                    </div>
                </section>

                <!-- Decide repetition or not -->
                <section class="col-6">
                    <label>Consenti ripetizioni di uno o più caratteri:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="repetition" id="flexRadioDefault1" value="1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Sì
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="repetition" id="flexRadioDefault2" value="0">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </section>

                <!-- Buttons -->
                <section class="mt-4 col-12">
                    <button class="btn btn-primary" type="submit">Invia</button>
                    <button class="btn btn-secondary" type="reset">Annulla</button>
                </section>
            </form>



        </main>
    </div>
</body>

</html>
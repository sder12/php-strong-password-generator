<?php
$length_password = $_GET['passwordlength'] ?? "";
var_dump($length_password);


//alphabet
$pass_alphabet = array_merge(range('A', 'Z'), range('a', 'z'));
//symbols
$pass_symbols = [];
$symbols = "~`!@#$%^&*()_-+={[}]|\:;<>.?/";
foreach (str_split($symbols) as $symbol) {
    $pass_symbols[] = $symbol;
}
//numbers
$pass_numbers = [];
$pass_num = range(0, 9);
foreach ($pass_num as $num) {
    $number = strval($num);
    $pass_numbers[] = $number;
}

//ALPHABET + NUMBERS + SYMBOLS
$password_characters = array_merge($pass_alphabet, $pass_numbers, $pass_symbols);
// var_dump($password_characters);

function password_generator($passlength, $array)
{
    $new_array = [];
    for ($i = 0; $i < $passlength; $i++) {
        $rnd_number = rand(0, count($array) - 1);
        $new_array[] = $array[$rnd_number];
    }
    $new_array_to_string = implode($new_array);
    return $new_array_to_string;
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

<body>
    <div class="container">
        <header class="text-center">
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura </h2>
        </header>
        <main>
            <div>
                <?php if (!$length_password && $length_password != 0) { ?>
                    <p> Nessun parametro valido inserito </p>
                <?php } elseif ($length_password < 5) { ?>
                    <p> La password deve avere come minimo 5 caratteri</p>
                <?php } else {
                    $password = password_generator($length_password, $password_characters);
                ?>
                    <p>La tua password è
                        <?php echo $password ?>
                    </p>
                <?php }; ?>
            </div>




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
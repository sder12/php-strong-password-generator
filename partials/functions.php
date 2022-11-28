<?php
$length_password = $_GET['passwordlength'] ?? "";
// var_dump($length_password);

//ARRAYS
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




//FUNCTION to generate the random password
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

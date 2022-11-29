<?php
$length_password = $_GET['passwordlength'] ?? "";
$check_alphabet = $_GET['lettere'] ?? "";
$check_symbols = $_GET['simboli'] ?? "";
$check_numbers = $_GET['numeri'] ?? "";
$check_repetition = $_GET['repetition'] ?? "";



//ARRAYS
$pass_alphabet = [];
$pass_symbols = [];
$pass_numbers = [];

// if (!$check_symbols && !$check_numbers && !$check_alphabet) {
//     $check_symbols = true;
//     $check_numbers = true;
//     $check_alphabet = true;
// }
//alphabet
if ($check_alphabet) {
    $pass_alphabet = array_merge(range('A', 'Z'), range('a', 'z'));
};
//symbols
if ($check_symbols) {
    $symbols = "~`!@#$%^&*()_-+={[}]|\:;<>.?/";
    foreach (str_split($symbols) as $symbol) {
        $pass_symbols[] = $symbol;
    }
};
//numbers
if ($check_numbers) {
    $pass_num = range(0, 9);
    foreach ($pass_num as $num) {
        $number = strval($num);
        $pass_numbers[] = $number;
    }
}




//ALPHABET + NUMBERS + SYMBOLS
$password_characters = array_merge($pass_alphabet, $pass_numbers, $pass_symbols);

// var_dump($password_characters);



//FUNCTION to generate the random password
function password_generator_repeat($passlength, $array, $repeat)
{
    $new_array = [];
    if ($repeat === 1) {
        for ($i = 0; $i < $passlength; $i++) {
            $rnd_number = rand(0, count($array) - 1);
            $new_array[] = $array[$rnd_number];
        }
    } else {
        while (count($new_array) < $passlength) {
            $rnd_number = rand(0, count($array) - 1);
            if (!in_array($rnd_number, $new_array)) {
                $new_array[] = $array[$rnd_number];
            }
        }
    }
    $new_array_to_string = implode($new_array);
    return $new_array_to_string;
}

// function password_generator($passlength, $array)
// {
//     $new_array = [];
//     for ($i = 0; $i < $passlength; $i++) {
//         $rnd_number = rand(0, count($array) - 1);
//         $new_array[] = $array[$rnd_number];
//     }
//     $new_array_to_string = implode($new_array);
//     return $new_array_to_string;
// }
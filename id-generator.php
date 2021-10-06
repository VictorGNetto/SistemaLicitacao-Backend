<?php

function n_letters_id($n) {
    $letters = [
        "a", "b", "c", "d", "e",
        "f", "g", "h", "i", "j",
        "k", "l", "m", "n", "o",
        "p", "q", "r", "s", "t",
        "u", "v", "w", "x", "y",
        "z"
    ];

    $id = "";
    for ($i = 0; $i < $n; $i++) { 
        $id = $id . $letters[rand(0, 25)];
    }

    return $id;
}
<?php

$errors = [];

function validateSearch($filter)
{
    global $errors;

    $valid = true;

    // Pflichtfeld prüfen
    if (empty(trim($filter))) {
        $errors['eingabe'] = "Bitte geben Sie einen Suchbegriff ein.";
        $valid = false;
    }

    // Maximal 20 Zeichen
    if (strlen($filter) > 20) {
        $errors['eingabe'] = "Suchbegriff darf maximal 20 Zeichen lang sein.";
        $valid = false;
    }

    return $valid;
}

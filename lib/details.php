<?php

require 'C:\Users\ellak\PhpstormProjects\benutzerDaten\PHP-13 userdata.php';

$users = $data;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // fehlermeldung
    echo "<p class='alert alert-danger'>Es wurde keine ID gefunden!</p>";
    exit;
}
function getById($id){
    global $users;
{
foreach ($users as $user){
    if ($user['id']== $id){
        return $user;
    }
}
}}

$user = getById($id);

?>
<!doctype html>
<html lang="de">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<h1 class="mt-5 mb-3">Benutzerdetails</h1>
<div style="margin-left: 10px">
<a href="index.php" class="text-decoration-none" >zurück</a>
</div>
<table class="table">
    <tr></tr>
    <tr>
        <th scope="col">Vorname</th>
        <th scope="col"><?= $user['firstname'] ?></th>
    </tr>
        <tr>
        <th scope="col">Nachname</th>
        <th scope="col"><?= $user['lastname'] ?></th>
        </tr>
    <tr>
        <th scope="col">Geburtsdatum</th>
        <th scope="col"><?= $user['birthdate'] ?></th>
    </tr>
    <tr>
        <th scope="col">E-Mail</th>
        <th scope="col"><?= $user['email'] ?></th>
    </tr>
    <tr>
        <th scope="col">Telefon</th>
        <th scope="col"><?= $user['phone'] ?></th>
    </tr>
    <tr>
        <th scope="col">Straße</th>
        <th scope="col"><?= $user['street'] ?></th>

    </tr>

</html>
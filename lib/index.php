<!doctype html>
<html lang="de">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Benutzerdaten</title>


</head>
<?php


require 'C:\Users\ellak\PhpstormProjects\benutzerDaten\PHP-13 userdata.php';
require 'C:\Users\ellak\PhpstormProjects\benutzerDaten\lib\func.php';
//arrays aus userdata in data speichern
$users = $data;
//wenn eingabe gibt, speicher es in filter, sonst lass es leer
$filter = isset($_POST['eingabe']) ? $_POST['eingabe'] : '';


function getFilteredData($users, $filter)
{
    $filter = strtolower($filter); //in kleinbuchstaben umwandeln damit vergleich funktioniert
    //ergebnis array
    $filtered = [];

    foreach ($users as $user) {
        $firstname = strtolower($user['firstname']);
        $lastname = strtolower($user['lastname']);
        $email = strtolower($user['email']);

        //wenn name, email teil von filter enthalten, dann setzte filtered auf user
        if (str_contains($firstname, $filter) ||
                str_contains($lastname, $filter) ||
                str_contains($email, $filter)) {
            $filtered[] = $user;
        }
    }
//user zurückgeben
    return $filtered;
}
//prüft ob formular abgesendet wurde
if (isset($_POST['submit'])) {
    //ruft funktion aus func auf
    if (validateSearch($filter)) {
        //users wird mit gefilterten daten ersetzt
        $users = getFilteredData($users, $filter);
        if (empty($users)) {
            echo "<p class='alert alert-danger'>Es wurde kein Eintrag gefunden!</p>";
        }
    }
}


?>

<body>
<div class="container">
    <h1 class="mt-5 mb-3">Benutzerdaten anzeigen</h1>
    <form id="form_grade" action="index.php" method="post">
        <div class="d-flex align-items-end gap-2 mb-3">
            <div class="flex-grow-1">
                <label for="suche" class="form-label">Suche:</label>
                <input type="text"
                       id="eingabe"
                       name="eingabe"

                       maxlength="20"
                       required
                />
            </div>

            <div class="d-flex gap-2">
                <input type="submit" name="submit" class="btn btn-primary" value="Suche"/>
                <a href="index.php" class="btn btn-secondary">Leeren</a>
            </div>
        </div>
        <br>

        <table class="table table-striped table-hover table-bordered align-middle shadow-sm">

            <tr>
                <th scope="col">Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Geburtsdatum</th>
                <th scope="col">Details</th>
            </tr>

<!--nur wenn users nicht leer ist, wird tabelle gemacht -->
            <?php if (!empty($users)): ?>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['firstname'] . " " . $user['lastname']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= date('d.m.Y', strtotime($user['birthdate'])) ?></td>
                        <!--detailseite wo für id die des users eingefügt wird -->
                        <td><a href="details.php?id=<?= $user['id'] ?>">Anzeigen</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </table>
    </form>
</div>
</body>
</html>


<?php

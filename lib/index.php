 <!doctype html>
<html lang="de">
<head>
    <!--Client und Serverseitige Validierung, clientseitige deshalb, weil schon vor abschicken geprüft wird, und dann
      bessere usability-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Benutzerdaten</title>


</head>
<?php


require 'C:\Users\ellak\PhpstormProjects\benutzerDaten\PHP-13 userdata.php';


$users = $data;

?>


<div class="container">
    <h1 class="mt-5 mb-3">Benutzerdaten anzeigen</h1>
    <form id="form_grade" action="index.php" method="post">
        <div class="row align-items-end g-2">
            <div class="col-sm-6">
                <label for="suche">Suche:</label>
                <input type="text"
                       id="eingabe"
                       name="eingabe"

                       maxlength="20"
                       required
                />
            </div>

            <div class="col-auto d-flex gap-2">
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


            <?php
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user['firstname'] . "" . $user['lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                echo "<td>" . date('d.m.Y', strtotime($user['birthdate'])) . "</td>";
                echo "<td><a href='details.php?id=" . $user['id'] . "'>Anzeigen</a></td>";
                echo "</tr>";
            }
            ?>


</div>

</html>
<?php if (isset($errors['name'])): ?>
    <div class="invalid-feedback">
        <?= htmlspecialchars($errors['name']) ?>
    </div>
<?php endif; ?>
</form>
</div>

</body>
<?php

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
$name = '';
?>
<body>

<div class="container">
    <h1 class="mt-3 mb-3">Benutzerdaten anzeigen</h1>
    <form id="form_grade" action="index.php" method="post">
        <div class="row">
            <div class="col-sm-6">
                <label for="suche">Suche:</label>
                <input type="text"
                       id="eingabe"
                       name="eingabe"
                       class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($name) ?>"
                       maxlength="20"
                       required
            </div>

            <div class="d-flex gap-2 mt-2">
                <input type="submit" name="submit" class="btn btn-primary" value="Suche">
                <a href="index.php" class="btn btn-secondary">Leeren</a>
            </div>
<br>

            <table class="table table-striped table-hover table-bordered align-middle shadow-sm">

                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Geburtsdatum</th>
                    <th scope="col">Details</th>
                </tr>

        </div>

        <?php if (isset($errors['name'])): ?>
            <div class="invalid-feedback">
                <?= htmlspecialchars($errors['name']) ?>
            </div>
        <?php endif; ?>
    </form>
</div>

</body>
<?php

<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // fehlermeldung
    echo "<p class='alert alert-danger'>Es wurde keine ID gefunden!</p>";
    exit;
}
function getById($id)
{

}



?>
<!doctype html>
<html lang="de">
<head>
<link href="/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<h1 class="mt-5 mb-3">Benutzerdetails</h1>
</html>
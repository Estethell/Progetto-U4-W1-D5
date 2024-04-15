<?php 
include __DIR__ . '/includes/db.php';


$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();


include __DIR__ . '/includes/initial.php'; 
include __DIR__ . '/includes/navbar.php';


?>

<h1 class="text-center my-5">Modifica libro</h1>

<form class="m-auto w-50 mt-5" action="http://localhost:8080/Progetto%20U4-W1-D5/edit-logic.php"
    method="POST" novalidate>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="mb-3">
        <label for="titolo" class="form-label">Titolo del libro</label>
        <input type="text" class="form-control" id="titolo" name="titolo" value="<?= $row['titolo'] ?>">
    </div>
    <div class="mb-3">
        <label for="autore" class="form-label">Autore del libro</label>
        <input type="text" class="form-control" id="autore" name="autore" value="<?= $row['autore'] ?>">
    </div>
    <div class="mb-3">
        <label for="anno_pubblicazione" class="form-label">Anno di uscita</label>
        <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" value="<?= $row['anno_pubblicazione'] ?>">
    </div>
    <div class="mb-3">
        <label for="genere" class="form-label">Genere del libro</label>
        <input type="text" class="form-control" id="genere" name="genere" value="<?= $row['genere'] ?>">
    </div>
    <button type="submit" class="btn btn-success">Applica Modifiche</button>
</form>


<?php include __DIR__ . '/includes/end.php';
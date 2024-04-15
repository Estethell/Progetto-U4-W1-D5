<?php
include __DIR__ . '/includes/db.php';

$id = $_POST['id'];
$titolo = $_POST['titolo'];
$autore = $_POST['autore'];
$anno_produzione = $_POST['anno_produzione'];
$genere = $_POST['genere'];


$stmt = $pdo->prepare("UPDATE libri SET titolo = :titolo, autore = :autore, anno_produzione = :anno_produzione, genere = :genere WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'titolo' => $titolo,
    'autore' => $autore,
    'anno_produzione' => $anno_produzione,
    'genere' => $genere,
]);

header("Location: http://localhost:8080/Progetto%20U4-W1-D5/index.php");
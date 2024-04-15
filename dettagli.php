<?php
include __DIR__ . '/includes/db.php';


$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/initial.php';
include __DIR__ . '/includes/navbar.php';
?>
<div class="d-flex flex-column justify-content-center">
    <div class="text-center">
        <img  class="m-5" src="https://images.pexels.com/photos/159866/books-book-pages-read-literature-159866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="libri" 
        style="width: 500px">
    </div>
      <div class="card-body text-center">
        <h1 class="card-title"><?="$row[titolo]"?></h1>
        <h3 class="card-text"><?=$row['autore']?> <spam class="d-block"><?=$row['anno_pubblicazione']?></spam>  
        <spam class="d-block"><?=$row['genere']?></spam></p>
        <a href="http://localhost:8080/Progetto%20U4-W1-D5/modifica.php<?= $row['id'] ?>" class="btn btn-success">Edit</a>
        <a href="http://localhost:8080/Progetto%20U4-W1-D5/elimina.php<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
    
    </div>
</div>
    
    
    <?php

include __DIR__ . '/includes/end.php';
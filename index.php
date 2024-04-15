<?php 
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$page = $_GET["page"] ?? 1; 
$per_page = $_GET["per_page"] ?? 10; 
$per_page = $per_page > 10 ? 10 : $per_page; 
$offset = ($page-1) * $per_page;


$stmt = $pdo->prepare("SELECT * FROM libri WHERE CONCAT(titolo, autore) LIKE :search LIMIT :per_page OFFSET :offset");
$stmt->execute([
   "search" => "%$search%",
   "offset" => $offset,
   "per_page" => $per_page,
]);

$books = $stmt->fetchAll(); 

$stmt = $pdo->prepare("SELECT COUNT(*) AS num_of_books FROM libri WHERE CONCAT(titolo, autore) LIKE :search"); 
$stmt->execute([
    'search' => "%$search%",
]);

$num_of_books = $stmt->fetch()['num_of_books'];
$tot_pages = ceil($num_of_books / $per_page);


include __DIR__ . '/includes/initial.php';
include __DIR__ . '/includes/navbar.php';


?>

 
    <div class="alert alert-warning mt-5" role="alert">
    <h1 class="text-center">Benvenuto su PhPBooks!</h1>
</div>

    <form class="row gap-3 my-3 mt-5">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca un libro">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>



<!-- INIZIO FOREACH PER LE CARD  -->

    <div class="row justify-content-center"><?php
        foreach ($books as $row) { ?>

<div class="card col-5 col-md-3 col-lg-2 m-3">
    <img src="https://images.pexels.com/photos/159866/books-book-pages-read-literature-159866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="libri">
  <div class="card-body text-center">
    <h5 class="card-title"><?=  "$row[titolo]" ?></h5>
    <p class="card-text"><?=  "$row[autore]" ?></p>
    <div class="d-flex flex-column">
        <a href="http://localhost:8080/Progetto%20U4-W1-D5/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-warning m-1 rounded-5">Dettagli</a>
        <a href="http://localhost:8080/Progetto%20U4-W1-D5/modifica.php?id=<?= $row['id'] ?>" class="btn btn-success m-1 rounded-5">Modifica</a>
        <a href="http://localhost:8080/Progetto%20U4-W1-D5/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger m-1 rounded-5">Elimina</a>
    </div>
  </div>
</div>
   <?php
 } ?>
    </div>
<!-- FINE FOREACH CARD -->

    <nav>
    <ul class="pagination justify-content-center">
            <li class="page-item<?= $page == 1 ? ' disabled' : '' ?>">
                <a
                    class="page-link"
                    href="http://localhost:8080/Progetto%20U4-W1-D5/index.php/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>"
                >Previous</a>
            </li><?php

                for ($i=1; $i <= $tot_pages; $i++) { ?>
                    <li class="page-item<?= $page == $i ? ' active': '' ?>">
                        <a
                            class="page-link"
                            href="http://localhost:8080/Progetto%20U4-W1-D5/index.php/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"
                        ><?= $i ?></a>
                    </li><?php
                } ?>
            
            <li class="page-item<?= $page == $tot_pages ? ' disabled' : '' ?>">
                <a
                    class="page-link"
                    href="http://localhost:8080/Progetto%20U4-W1-D5/index.php/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>"
                >Next</a>
            </li>
        </ul>
    </nav>
</div><?php

include __DIR__ . '/includes/end.php';

<?php
// se ci sono stati inviati dei dati
// allora validarli e fare tutto il resto (tra cui salvare i dati nel database)
// se NON sono validi rimaniamo in questa pagina e ripresentiamo il form all'utente
// se sono validi ridirezionamo l'utente su una pagina diversa con un messaggio di successo


// connessione al database
$host = "localhost";
$db = "gestione_libreria";
$user = "root";
$pass = "";


$dsn = "mysql:host=$host;dbname=$db";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,

];

// comando che connette al databse
$pdo = new PDO($dsn, $user, $pass, $options);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    

    $errors = [];

     // validare i dati

    if (strlen($titolo) > 30) {
        $errors['titolo'][] = 'Titolo non valido';
    }

    if (strlen($autore) > 30) {
        $errors['autore'][] = 'Autore non trovato';
    } 
    
    if (strlen($anno_pubblicazione) > 4) {
        $errors['anno_pubblicazione'][] = 'Anno non valido';
    }

    if (strlen($genere) > 30) {
      $errors['genere'][] = 'Genere non valido';
  } 

    // echo '<pre>' . print_r($errors, true) . '</pre>';
    
  if ($errors == []) {

    $stmt = $pdo -> prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES (:titolo, :autore, :anno_pubblicazione, :genere)");
$stmt->execute([
    "titolo" =>  $titolo,
    "autore" =>  $autore,
    "anno_pubblicazione" => $anno_pubblicazione,
    "genere" => $genere,
]);



};




} 
include __DIR__ . '/includes/navbar.php';?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>Inserisci il tuo libro</title>
    <style>
      #box {
        display: flex;
        justify-content: center;
        margin-top: 100px;
        padding: 10px;
      }
      body {
        background-color: aquamarine;
      }
      form {
        background-color: aquamarine;
      }
    </style>
  </head>
  <body>
    <h1 class="text center d-flex justify-content-center mt-5 ">Inserisci il tuo libro preferito qui</h1>
    <div id="box">
      <form style="width: 500px" action="" method="post">   
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo del libro</label>
          <input type="text" class="form-control" name="titolo" id="titolo" />
        </div>
        <div class="mb-3">
          <label for="autore" class="form-label">Autore del libro</label>
          <input type="text" class="form-control" name="autore" id="autore" />
        </div>
        <div class="mb-3">
          <label for="anno_pubblicazione" class="form-label">Anno di uscita</label>
          <input type="number" class="form-control" name="anno_pubblicazione" id="anno_pubblicazione" />
        </div>
        <div class="mb-3">
          <label for="genere" class="form-label">Genere del libro</label>
          <input type="text" class="form-control" name="genere" id="genere" />
        </div>
 

        <button type="submit" class="btn btn-primary">Submit</button>



      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
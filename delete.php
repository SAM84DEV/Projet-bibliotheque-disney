<?php
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheques', 'root', '');
    $bdd = 'SELECT * FROM books';
    $statement = $pdo->prepare($bdd);
    $statement->execute();
    $books = $statement->fetchAll();
 
    if (isset($_GET["deleteid"])) {

        $idbooks = $_GET['deleteid'];

        $bdd = 'DELETE from books WHERE idbooks = :idbooks' ;
        $statement = $pdo->prepare($bdd);
        $statement->execute([':idbooks' => $idbooks]);
        echo "votre livre a bien été supprimé";
        header('Location: index.php');
    }
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/delete.css">
        <title>BIBLIOTHEQUE</title>
    </head>
    <body>
        <?php
        include 'NAV/nav.php';
        ?>
        </br>

        <div class="container">
            <select class="form-select" aria-label="Default select example">
            <option selected>Consulter la liste des livres</option>
            <?php foreach($books as $book) { ?>
            <option value="<?php echo $book['idbooks'] ?>"><?php echo $book['title'] ?></option>
            <?php } ?>
            </select>
        </div>
        </br></br>

        <div class="button">
            <a href="delete.php?deleteid=<?php echo $book['idbooks']; ?>"  class="btn btn-primary">Supprimer votre livre</a>
        </div>
    </body>
</html>
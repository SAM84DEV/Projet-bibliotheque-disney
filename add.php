<?php

try {
    if (isset($_POST["submit"])) {
        $title=  $_POST['title'];
        $description = $_POST['description'];
        $image= $_POST['image'];
        $idbooks = $_POST['idbooks'];

        $pdo = new PDO('mysql:host=localhost;dbname=bibliotheques', 'root', '');
       
        $bdd = 'INSERT into books (idbooks, title, description, image) VALUES (:idbooks, :title, :description, :image)' ;
        $statement = $pdo->prepare($bdd);
        $statement->execute(['idbooks' => $idbooks, ':title' => $title, ':description' => $description, ':image' => $image]);
        header('Location: index.php');
 }
} 
catch (PDOException $e) 
{
    echo "error: " .$e->getMessage();
}  
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/style.css">
        <title>AJOUT BIBLIOTHEQUE DISNEY</title>
    </head>
    <body>
        <?php
        include 'NAV/nav.php';
        ?>
        </br>
        <form action='add.php' method='post'>
                
        <div class="card-body">
            <h5 class="card-title">
                <label for="idbooks"><strong>Livre numéro n° : </strong></label></br>
                <input type="text" id="idbooks" name="idbooks" placeholder="identification">
                </br></br>
                <label for="title"><strong>Titre : </strong></label></br>
                <input type="text" id="title" name="title" placeholder="title">
                </br></br>
                <label for="image"><strong>Lien de l'image :</strong></label></br>
                <input placeholder="image" type="text" id="image" name="image"> 
                </br></br>
                <label for="description"><strong>Description :</strong></label></br>
                <input placeholder="description" type="text" id="description" name="description">
            </h5>
        <form>
        </br>
        <button type="submit" name="submit" class="btn btn-dark">Ajouter votre livre</button>
        </div>
        </form>
    </body>
</html>


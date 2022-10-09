<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheques', 'root', '');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    $bdd = "SELECT * FROM books WHERE idbooks = '$id'";
    $statement = $pdo->prepare($bdd);
    $statement->execute();
    $book = $statement->fetch();
}
?>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=bibliotheques', 'root', '');
if (isset($_POST["submit"])) {
    $title=  $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $bdd = 'UPDATE books SET title = :title, description = :description, image = :image WHERE idbooks = :id';
    $statement = $pdo->prepare($bdd);
    $statement->execute([':title' => $title, ':description' => $description, ':image' => $image, ':id' =>$id]);
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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/update.css">
        <title>Modifier</title>
    </head>
    <body>
        <?php
        include 'NAV/nav.php';
        ?>             
        </br>

        <form action='update.php?id=<?php echo $id ?>' method='post'>
            <div class="form-group">
                <div>
                    <label for="idbooks">Mon livre n° :</label>
                    <input type="text" placeholder="<?php echo $id ?>" id="idbooks" name="idbooks" class="form-control" value="<?php echo $books['idbooks']; ?>">
                </div></br>
                <div>
                    <label for="title">Titre :</label>
                    <input type="text" placeholder="<?php echo $book['title'] ?>" id="title" name="title" class="form-control" value="<?php echo $books['title']; ?>">
                </div></br>
                <div>
                    <label for="description">Description :</label>
                    <input type="text" placeholder="<?php echo $book['description'] ?>" id="description" name="description" class="form-control"  value="<?php echo $books['description']; ?>">
                </div></br>
                <div>
                    <label for="image">Lien de l'image :</label>
                    <input type="text" placeholder="<?php echo $book['image'] ?>" id="image" name="image" class="form-control" value="<?php echo $books['image']; ?>">
                </div></br>
            </div>
                <input type="submit"  value="Modifier votre site" name="submit">
         </form>
    </body>
</html>



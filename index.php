<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="CSS/index.css">
      <title>BIBLIOTHEQUE</title>
  </head>
  <body>
    <?php
    include 'NAV/nav.php';
    ?>
    </br>

    <?php
      $pdo = new PDO('mysql:host=localhost;dbname=bibliotheques', 'root', '');
      $bdd = 'SELECT * FROM books';
      $statement = $pdo->prepare($bdd);
      $statement->execute();
      $books = $statement->fetchAll();
    ?>

    <form action= 'index.php' method="post">
    <?php foreach($books as $book) { ?>
    <div class="card mb-3" style="max-width: 740px;">
      <div class="row g-0">
        <div class="col-md-4"><label for='image'>
          <img src="<?php echo $book['image'] ?>" class="img-fluid rounded-start" alt="">
          </label>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><label for='title'><?php echo $book['title'] ?></label></h5>
            <p class="card-text"><label for='description'><?php echo $book['description'] ?></label></p>
            <p class="card-text"><small class="text-muted">Livre numéro <?php echo $book['idbooks'] ?></small></p>
            <a href="update.php?id=<?php echo $book['idbooks']; ?>">Modifier</a>  
          </div>
        </div>
      </div>
    </div>
    <?php } ?>       
    </form>
  </body>
</html>
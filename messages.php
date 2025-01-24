<?php
session_start();

include_once ('connexion-bdd.php');

$requ = $bdd->prepare('SELECT DATE_FORMAT(creation_date, "Créé le %d/%m/%Y") AS date_aff, content, id_user, id_article FROM article WHERE id_user=:id ORDER by creation_date DESC');
$requ->bindParam('id',$_SESSION['id_user'],PDO::PARAM_INT);
$requ->execute();

if(isset($_POST['bsuppr'])){
  $artSuppr = $bdd->prepare('DELETE FROM article WHERE id_article= :suppr;');
  $artSuppr->bindParam(':suppr',$_POST['bsuppr'],PDO::PARAM_INT);
  $artSuppr->execute();
  header("location: messages.php");
exit();
}

if (isset($_POST['modifier'])) {
  $idArticle = $_POST['id_article'];
  $nouveauContenu = $_POST['nouveau_contenu'];

  $update = $bdd->prepare('UPDATE article SET content = :contenu WHERE id_article = :id');
  $update->bindParam(':contenu', $nouveauContenu, PDO::PARAM_STR);
  $update->bindParam(':id', $idArticle, PDO::PARAM_INT);
  $update->execute();

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<header class= "container-fluid">
    <div class= "container">
    <div class= "row">
        <div class= "col-8 text-center ">
            <h1>Polochon & Couette</h1>
        </div>
        <div class= "col-4 text-center ">
            <h3>le 16 janvier 2025</h3>
        </div>
    </div>
    <div>
    <hr class="hr hr-blurry border  " />
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <h2 class="navbar-brand">FAITES NOUS PART DE VOS SOUVENIRS</h2>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
     

       
          <ul class="navbar-nav w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link active d-flex justify-content-end" aria-current="page" href="accueil.php">Accueil</a>
            </li>
            <?php if (isset($_SESSION['id_user'])) { ?>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link" href="#">Mes messages</a>
            </li>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link" href="deconnexion.php">Se déconnecter</a>
            </li>
            <?php } else { ?>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link " href="connexion.php">Se connecter</a>
            </li>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link " href="inscription.php">S'inscrire</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container text-center">

    
      <section class="row">

      <h2>Tous mes messages</h2>
<?php
 while ($row = $requ->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="col">
          <article>
          <p><?=$row['date_aff'] ?></p>
            <p><?=$row['content'] ?></p>
            <div>
              <p><?=$_SESSION['fname'] ?></p>
              <p><?=$_SESSION['name'] ?></p>
            </div>
          </article>
          <form method="post"  action="">
          <button type="submit" name="bmod" value="<?=$row['id_article'] ?>" class="btn btn-outline-primary">Modifier</button>


          <button type="submit" name="bsuppr" value="<?=$row['id_article'] ?>" class="btn btn-outline-secondary">Supprimer</button>
    </div>
          <?php if (isset($_POST['bmod']) && $_POST['bmod'] == $row['id_article']) { ?>
                <div class="col">
                <article>
                    <form method="post" action="">
                        <input type="hidden" name="id_article" value="<?= $row['id_article'] ?>">
                        <textarea rows = 10  cols=50 name="nouveau_contenu" required><?= htmlspecialchars($row['content']) ?></textarea>
                        <button type="submit" name="modifier" class="btn btn-outline-success">Enregistrer les modifications</button>
                    </form>
                    </article>
                </div>
                
                <?php } ?>
                <?php } ?>

      </section>

    </main>
    
</header>


  




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
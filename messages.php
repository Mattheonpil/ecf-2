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

if (isset($_POST['creer'])) {
  $newArticle = $_POST['new_article'];

  // Préparation de la requête d'insertion
  $insert = $bdd->prepare('INSERT INTO article (content, id_user, creation_date) VALUES (:contenu, :id_user, NOW())');
  $insert->bindParam(':contenu', $newArticle, PDO::PARAM_STR);
  $insert->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
  $insert->execute();

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

<header class= "container-fluid backgrund-sp">
    <div class="container">
    <div class= "row pt-3">
        <div class= "col-8 text-center">
            <h1 class="fw-bold fst-italic text-white">Polochon & <span class="d-none"><br></span> Couette</h1>
        </div>
        <div class= "col-4 text-center">
            <h4 class="pt-1 fst-italic text-white">le 16 janvier 2025</h4>
        </div>
    </div>
    
     <div id="trait"></div>

     <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <span class="navbar fs-6 text-color1 text-center">FAITES NOUS PART DE <span class=" d-sm-none"><br></span> VOS SOUVENIRS</span>
        <button
          class="navbar-toggler button-myborder"
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
              <a class="nav-link active d-flex justify-content-end text-white" aria-current="page" href="accueil.php">Accueil</a>
            </li>
            <?php if (isset($_SESSION['id_user'])) { ?>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link couleur-menu" href="messages.php">Mes messages</a>
            </li>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link text-white" href="deconnexion.php">Se déconnecter</a>
            </li>
            <?php } else { ?>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link text-white" href="connexion.php">Se connecter</a>
            </li>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link text-white" href="inscription.php">S'inscrire</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    </header>

<main class=" text-center">  
 
   <div>
      

      <button type="button" class="btn mybtn mybtn:hover mt-4 w-50 text-center" data-bs-toggle="modal" data-bs-target="#createArticleModal">
    Créer un nouvel article
</button>
</div>
<div class=" container justify-content-center">

<div class="row">

<?php while ($row = $requ->fetch(PDO::FETCH_ASSOC)) { ?>

 
      <article class="col-md-6 col-xl-4">
         <div class=" d-flex justify-content-center pt-5 ">
            <div id="card0">
                <div id="card" class="shadow">
                    <div id="card2" class="rounded-1 overflow-auto">
                            <p class="p-1 text-start"><?=$row['date_aff'] ?></p>
                            <p class= "article-content"><?=$row['content'] ?></p>
                            <div class="d-flex justify-content-center p-2">
                            <p class=" pe-2 part">De la part de </p>
                                <p class=" pe-2 part signature"><?=$_SESSION['fname'] ?></p>
                                <p class="signature"><?=$_SESSION['name'] ?></p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
                          <div class=" mt-3 d-flex justify-content-center ">
                            <button type="button" 
                                    class="btn mybtn mybtn:hover me-2 "  
                                    data-bs-toggle="modal" 
                                    data-bs-target="#staticBackdrop"
                                    data-id="<?=$row['id_article']?>" 
                                    data-content="<?=htmlspecialchars($row['content'])?>">Modifier</button>

                            <form method="post" action="">
                            <button type="submit" name="bsuppr" value="<?=$row['id_article'] ?>" class="btn mybtn mybtn:hover ms-2 btn-outline-secondary">Supprimer</button>
                            </form>
                         </div>
       </article>
                <?php } ?>
</div>
<!-- Modal créer-->
<div class="modal fade" id="createArticleModal" tabindex="-1" aria-labelledby="createArticleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createArticleModalLabel">Créer un nouvel article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <textarea rows="5" cols="50" name="new_article" required></textarea>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" name="creer" class="btn mybtn mybtn:hover">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





      
           

        <!-- Modal modifier -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier l'article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form method="post" action="">
                    <input type="hidden" name="id_article" id="modal_id_article" value="">
                    <textarea rows="10" cols="60" name="nouveau_contenu" id="modal_nouveau_contenu" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" name="modifier" class="btn mybtn mybtn:hover">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div></div>

   
    </main>

        <script>
            const exampleModal = document.getElementById('staticBackdrop');
            exampleModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const content = button.getAttribute('data-content');

                const modalIdInput = staticBackdrop.querySelector('#modal_id_article');
                const modalContentTextarea = staticBackdrop.querySelector('#modal_nouveau_contenu');

                modalIdInput.value = id;
                modalContentTextarea.value = content;
            });
        </script>
    </div>



  




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
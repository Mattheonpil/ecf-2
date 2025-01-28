<?php
session_start();

// if (!isset($_SESSION['id_user'])) {
//     header("Location: connexion.php"); // Rediriger vers la page de connexion si non connecté
//     exit();
// }

// Afficher le contenu de la page d'accueil
// echo "Bienvenue sur la page d'accueil !";
?>
<?php
include_once ('connexion-bdd.php');

// query car pas de variable à l'intérieur de la requête, sinon, prepare et execute

$req = $bdd->query('SELECT  DATE_FORMAT(creation_date, "Créé le %d/%m/%Y") AS date_aff, 
                            content, firstname, name 
                    FROM article a , user u
                    WHERE a.id_user = u.id_user 
                    ORDER by creation_date DESC;');

// var_dump($req);
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
              <a class="nav-link active d-flex justify-content-end" aria-current="page" href="#">Accueil</a>
            </li>
            <?php if (isset($_SESSION['id_user'])) { ?>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link" href="messages.php">Mes messages</a>
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

      <section class="row align-item-center justify-content-center justify-content-evenly ">


      <?php
        while($article = $req->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="col-4">
          <article>
            <p><?= $article['date_aff'] ?></p>
            <p><?= $article['content'] ?></p>
            <div>
              <p>De la part de </p>
              <p><?= $article['firstname'] . $article['name']?></p>
            </div>
          </article>
</div>

<?php
        }
    ?>
        <div class="col-4">
          <article>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, quibusdam? Vel est ullam officia voluptatem amet enim nesciunt ducimus quam sunt laborum harum reprehenderit cumque expedita voluptate eligendi deleniti quae mollitia doloribus dolores delectus, veritatis quas consectetur? Non nulla, alias totam nam, eum mollitia unde ullam cupiditate impedit itaque esse!</p>
            <div>
              <p></p>
              <p></p>
            </div>
          </article>
          </div>


      </section>

    </main>




    </div>
</header>


  




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

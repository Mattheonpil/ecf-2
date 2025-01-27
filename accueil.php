<?php
session_start();
?>
<?php

include_once ('connexion-bdd.php');

$req = $bdd->query('SELECT  DATE_FORMAT(creation_date, "Créé le %d/%m/%Y") AS date_aff, 
                            content, firstname, name 
                    FROM article a , user u
                    WHERE a.id_user = u.id_user 
                    ORDER by creation_date DESC;');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or | Accueil</title>
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
        <span class="navbar fs-6 text-color1 text-center">FAITES NOUS PART DE <span class="d-md-none"><br></span> VOS SOUVENIRS</span>
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
            <li class="nav-item  d-flex justify-content-end ">
              <a class="nav-link couleur-menu" aria-current="page" href="#">Accueil</a>
            </li>
            <?php if (isset($_SESSION['id_user'])) { ?>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link text-white" href="messages.php">Mes messages</a>
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

    <main class="container text-center">

      <section class="row align-item-center justify-content-center justify-content-evenly ">


      <?php
        while($article = $req->fetch(PDO::FETCH_ASSOC)){
    ?>
        
          <article class="col-md-6 col-xl-4" >
          <div class="container d-flex justify-content-center pt-4 ">
            <div id="card0">
                <div id="card" class="shadow">
                    <div id="card2" class="rounded-1 overflow-auto">
                      <p class="p-1 text-start"><?= $article['date_aff'] ?></p>
                      <p id="article-content"><?= $article['content'] ?></p>
                          <div class="d-flex justify-content-center p-2">
                                    <p class=" pe-2 part">De la part de </p>
                                    <p class="signature"><?= $article['firstname'] ." ". $article['name']?></p>
                          </div>
                    </div>
                </div>
            </div>
        </div>


            
          </article>
   

 <?php
        }
    ?>
       


      </section>

    </main>




   



  




 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
 </body>
 </html>
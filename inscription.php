<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or | Inscription</title>
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
        <span class="navbar fs-6 text-color1 text-center">FAITES NOUS PART DE <span class=" d-sm-none"><br></span>VOS SOUVENIRS</span>
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
              <a class="nav-link couleur-menu" href="inscription.php">S'inscrire</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    </header>

    <main class="container text-center">

   
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Completez les champs pour vous inscrire :</h2>
            <form action="register.php" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="firstName" required>    
                    <label for="firstName" class="form-label">Prénom</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Nom de famille" required>
                    <label for="lastName" class="form-label">Nom de Famille</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Mot de Passe</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn mybtn mybtn:hover btn-lg" type="submit">Valider</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Déjà un compte ?     <a href="connexion.php" class="link-primary text-decoration-none">Connectez vous ici</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

      

    </main>




    



  




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
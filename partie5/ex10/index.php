<?php
// Déclarations des variables
$departments = [
    02 => 'Aisne',
    59 => 'Nord',
    60 => 'Oise',
    62 => 'Pas-de-calais',
    80 => 'Somme',
];

// Instructions
$message ='';
foreach ($departments as $number => $department){
    $message = $message . "$department est le département n° $number. ";
};
unset($department);
// Déclarations des fonctions

?>


<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>Laura's nails</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h1>Laura's nails</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBurger" aria-controls="navbarBurger" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarBurger">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./prestations.html">Prestations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#placeDate">Lieux et horaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rendezVous">Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#avis">Avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item nav-button">
                            <a class="nav-link" href="./inscription.html">Inscription</a>
                        </li>
                        <li class="nav-item nav-button">
                            <a class="nav-link" href="./connexion.html">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR end -->
    </header>
    <!-- HEADER end -->


    <!-- Form -->
    <div class="mt-2">
        <form action="#" method="get" class="d-flex flex-column align-items-center" id="loginForm">
            <fieldset class="loginFieldset">Partie 4</fieldset>
            <label for="text" class="mt-1"> 
                EX 10 : Avec le tableau de l'exercice 5, 
                afficher toutes les valeurs de ce tableau ainsi que les clés associés.  
                Cela pourra être, par exemple, de la forme : 
                Le département + nom du département + a le numéro + numéro du département
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" 
                value=" <?=$message;?>"
                readonly>
        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
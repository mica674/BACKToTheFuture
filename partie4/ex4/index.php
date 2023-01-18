<!-- PARTIE PHP -->
<?php
// Déclarations des variables
$nb1 = random_int(1, 100);
$nb2 = random_int(1, 100);
// Déclarations des fonctions
function greatest($num1, $num2)
{
    if ($num1 < $num2) {
        $message = 'Le premier nombre est plus petit.';
    } else if ($num1 > $num2) {
        $message = 'Le premier nombre est plus grand.';
    } else {
        $message = 'Les deux nombres sont identiques';
    }
    return $message;
}
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
            <label for="text" class="mt-1"> EX 4 : Faire une fonction qui prend en paramètre deux nombres. La fonction doit retourner :
                <ul>
                    <li>Le premier nombre est plus grand si le premier nombre est plus grand que le deuxième</li>
                    <li>Le premier nombre est plus petit si le premier nombre est plus petit que le deuxième</li>
                    <li>Les deux nombres sont identiques si les deux nombres sont égaux</li>
                </ul>
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" 
            value="
                <?= greatest($nb1, $nb2) . " (n1 = $nb1 ; n2 = $nb2)"; 
                ?>" 
            readonly>
        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>

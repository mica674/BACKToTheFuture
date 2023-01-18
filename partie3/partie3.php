<!-- PARTIE PHP -->
<?php
// Déclarations des variables
// EXERCICE 1
$loop1 = 0;
$loop1Result = '';

// EXERCICE 2
$loop2First = 0;
$loop2Second = random_int(1, 100);

// EXERCICE 3
$loop3First = 100;
$loop3Second = random_int(1, 100);


// EXERCICE 4
$loop4 = 1;

// EXERCICE 5


// EXERCICE 6


// EXERCICE 7


// EXERCICE 8



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
            <fieldset class="loginFieldset">Partie 3</fieldset>
            <label for="text" class="mt-1"> EX 1 : Créer une variable et l'initialiser à 0.
                Tant que cette variable n'atteint pas 10, il faut :
                - l'afficher
                - l'incrementer
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php while ($loop1 < 10) {
                                                                                                    echo "$loop1 ; ";
                                                                                                    $loop1++;
                                                                                                } ?>" readonly>
            <label for="text" class="mt-1"> EX 2 : Créer deux variables. Initialiser la première à 0 et la deuxième avec un nombre compris en 1 et 100.
                Tant que la première variable n'est pas supérieure à 20 :
                - multiplier la première variable avec la deuxième
                - afficher le résultat
                - incrementer la première variable
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php while ($loop2First <= 20) {
                                                                                                    $loop2Result = $loop2First * $loop2Second;
                                                                                                    echo "$loop2Result ; ";
                                                                                                    $loop2First++;
                                                                                                }
                                                                                                ?>" readonly>
            <label for="text" class="mt-1"> EX 3 : Créer deux variables. Initialiser la première à 100 et la deuxième avec un nombre compris en 1 et 100.
                Tant que la première variable n'est pas inférieure ou égale à 10 :
                - multiplier la première variable avec la deuxième
                - afficher le résultat
                - décrémenter la première variable
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php while ($loop3First >= 10) {
                                                                                                    $loop3Result = $loop3First * $loop3Second;
                                                                                                    echo "$loop3Result ; ";
                                                                                                    $loop3First -= 5;
                                                                                                }
                                                                                                ?>" readonly>
            <label for="text" class="mt-1"> EX 4 : Créer une variable et l'initialiser à 1.
                Tant que cette variable n'atteint pas 10, il faut :
                - l'afficher
                - l'incrementer de la moitié de sa valeur
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php while ($loop4 < 10) {
                                                                                                    echo "$loop4 ; ";
                                                                                                    $loop4 += $loop4 / 2;
                                                                                                }
                                                                                                ?>" readonly>
            <label for="text" class="mt-1"> EX 5 : En allant de 1 à 15 avec un pas de 1, afficher le message On y arrive presque.
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php for ($loop5 = 0; $loop5 <= 15; $loop5++) {
                                                                                                    echo 'On y arrive presque.';
                                                                                                } ?>" readonly>
            <label for="text" class="mt-1"> EX 6 : En allant de 20 à 0 avec un pas de 1, afficher le message C'est presque bon.
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php for ($loop6 = 20; $loop6 >= 0; $loop6--) {
                                                                                                    echo 'C\'est presque bon.';
                                                                                                } ?>" readonly>
            <label for="text" class="mt-1"> EX 7 : En allant de 1 à 100 avec un pas de 15, afficher le message On tient le bon bout.
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php for ($loop7 = 1; $loop7 <= 100; $loop7 += 15) {
                                                                                                    echo 'On tient le bon bout.';
                                                                                                } ?>" readonly>
            <label for="text" class="mt-1"> EX 8 : En allant de 200 à 0 avec un pas de 12, afficher le message Enfin !!!!.
            </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="<?php for ($loop8 = 200; $loop8 >= 0; $loop8 -= 12) {
                                                                                                    echo 'Enfin !!!!';
                                                                                                } ?>" readonly>
        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
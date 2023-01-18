<!-- PARTIE PHP -->
<?php
// Déclarations des variables
// Exercice 1
$name = 'Nom, Prénom et Age';
// Exercice 2
$lastname = 'Van Damme';
$firstname = 'Jean-Claude';
$age = 61;
// Exercice 3
$km = 1;
// Exercice 4
$string = "string";
$int = 0;
$float = 1.2;
$boolean = true;
// Exercice 5
$int2 = (int) null;
// settype($int2,"integer");
// Exercice 6
$name2 = $firstname . ' ' . $lastname;
// Exercice 7

// Exercice 8
$V1 = 3 + 4;
$V2 = 5 * 20;
$V3 = 45 / 5;
?>



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
            <fieldset class="loginFieldset"><?= $name; ?></fieldset>
            <label for="text" class="mt-1"> <?= substr($name, 0, 3); ?> : </label>
            <input type="text" name="<?= substr($name, 0, 3); ?>" id="<?= substr($name, 0, 3); ?>" class="inputForm" placeholder=" <?= substr($name, 0, 3); ?>" value="<?= $lastname ?>" readonly>
            <label for="text" class="mt-1"> <?= substr($name, 5, 7); ?> : </label>
            <input type="text" name="<?= substr($name, 5, 7); ?>" id="<?= substr($name, 5, 7); ?>" class="inputForm" placeholder=" <?= substr($name, 5, 7); ?>" value="<?= $firstname ?>" readonly>
            <label for="text" class="mt-1"> <?= substr($name, -3); ?> : </label>
            <input type="text" name="<?= substr($name, -3); ?>" id="<?= substr($name, -3); ?>" class="inputForm" placeholder=" <?= substr($name, -3); ?>" value="<?= $age ?>" readonly>
            <label for="text" class="mt-1"> km 1 : </label>
            <input type="number" name="km" id="km1" class="inputForm" placeholder=" km" value="<?= $km ?>" readonly>
            <?php $km = 3 ?>
            <label for="text" class="mt-1"> km 3 : </label>
            <input type="number" name="km" id="km3" class="inputForm" placeholder=" km" value="<?= $km ?>" readonly>
            <?php $km = 125 ?>
            <label for="text" class="mt-1"> km 125 : </label>
            <input type="text" name="km" id="km125" class="inputForm" placeholder=" km" value="<?= $km ?>" readonly>
            <label for="text" class="mt-1"> Exercice 4 : </label>
            <input type="text" name="ex4" id="ex4" class="inputForm" placeholder="" value="<?= $string . " " . $int . " " . $float . " " . $boolean ?>" readonly>
            <label for="text" class="mt-1"> Exercice 5 : </label>
            <input type="text" name="ex5" id="ex5" class="inputForm" placeholder="" value="<?php echo intval($int2);
                                                                                            $int2 = 12;
                                                                                            echo ' ' . $int2 ?>" readonly>
            <label for="text" class="mt-1"> Exercice 6 : </label>
            <input type="text" name="ex6" id="ex6" class="inputForm" placeholder="" value="<?="Bonjour $name2, comment vas-tu ?"?>" readonly>
            <label for="text" class="mt-1"> Exercice 7 : </label>
            <input type="text" name="ex7" id="ex7" class="inputForm" placeholder="" value="<?="Bonjour $lastname $firstname, tu as $age ans"?>" readonly>
            <label for="text" class="mt-1"> Exercice 8 : </label>
            <input type="text" name="ex8" id="ex8" class="inputForm" placeholder="" value="<?= $V1 . '+' . $V2 . '+' . $V3 ?>" readonly>
        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
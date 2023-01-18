<!-- PARTIE PHP -->
<?php
// Déclarations des variables
// EXERCICE 1
$age = random_int(7, 77);
$age_result = 'mineur';
if ($age > 18) {
    $age_result = 'majeur';
}

// EXERCICE 2
$isEasy = (bool) random_int(0, 1) == 1;
$isEasy_result = 'facile !!';
if ($isEasy == false) {
    $isEasy_result = 'difficile !!!';
}

// <?php echo ($isEasy == true)?'C\'est facile':'C\'est difficle'; ?&gt

// EXERCICE 3
$gender = random_int(0, 1);
if ($gender == 0) {
    $gender = 'une femme';
    $age_result = $age_result . 'e';
} else {
    $gender = 'un homme';
}
$ex3Result = "Vous êtes $gender et vous êtes $age_result";

// EXERCICE 4
$magnitude = random_int(1, 9);
$magnitudeResult = '';
switch ($magnitude) {
    case 1:
        $magnitudeResult = 'Micro-séisme impossible à ressentir.';
        break;
    case 2:
        $magnitudeResult = 'Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.';
        break;
    case 3:
        $magnitudeResult = 'Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.';
        break;
    case 4:
        $magnitudeResult = 'Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.';
        break;
    case 5:
        $magnitudeResult = 'Séisme capable d\'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.';
        break;
    case 6:
        $magnitudeResult = 'Fort séisme capable d\'engendrer des destructions majeures sur une large distance (180 km) autour de l\'épicentre.';
        break;
    case 7:
        $magnitudeResult = 'Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.';
        break;
    case 8:
        $magnitudeResult = 'Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.';
        break;
    default:
        $magnitudeResult = 'Séisme capable de tout détruire sur une très vaste zone.';
}

// EXERCICE 5
$genderDev = 'Homme';
if ($genderDev != 'Homme') {
    $genderDevResult = 'C\'est une développeuse !!!';
} else {
    $genderDevResult = 'C\'est un développeur !!!';
}

// EXERCICE 6
$ageMajority = '';
if ($age >= 18) {
    $ageMajority = 'Tu es majeur';
} else {
    $ageMajority = 'Tu n\'es pas majeur';
}

// EXERCICE 7
$isOK = random_int(0,1);
$isOKResult = '';
if ($isOK == false) {
    $isOKResult = 'c\'est pas bon !!!';
} else {
    $isOKResult = 'c\'est ok !!';
}

// EXERCICE 8
$isOKbis = 1-$isOK;
if ($isOKbis == true) {
    $isOKResultbis = 'c\'est ok !!';
} else {
    $isOKResultbis = 'c\'est pas bon !!!';
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
            <fieldset class="loginFieldset">Partie 2</fieldset>
            <label for="text" class="mt-1"> Créer une variable age et l'initialiser avec une valeur.
                Si l'âge est supérieur ou égale à 18, afficher Vous êtes majeur. Dans le cas contraire, afficher Vous êtes mineur : </label>
            <input type="text" name="age" id="age" class="inputForm" placeholder="age" value="Vous êtes <?= "$age_result ($age)" ?>" readonly>
            <label for="text" class="mt-1"> Créer une variable isEasy de type booléan et l'initialiser avec une valeur.
                Afficher C'est facile !! si c'est vrai. Dans le cas contraire afficher C'est difficile !!! : </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" value="C'est <?= $isEasy_result ?>" readonly>
            <label for="text" class="mt-1"> Créer deux variables age et gender. La variable gender peut prendre comme valeur :
                <ul>
                    <li>Homme</li>
                    <li>Femme</li>
                </ul>
                En fonction de l'âge et du genre afficher la phrase correspondante :
                <ul>
                    <li>Vous êtes un homme et vous êtes majeur</li>
                    <li>Vous êtes un homme et vous êtes mineur</li>
                    <li>Vous êtes une femme et vous êtes majeure</li>
                    <li>Vous êtes une femme et vous êtes mineure</li>
                </ul>
            </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" value="<?= "$ex3Result ($gender de $age ans)" ?>" readonly>
            <label for="text" class="mt-1"> L'échelle de Richter est un outil de mesure qui permet de définir la magnitude de moment d'un tremblement de terre. Cette échelle va de 1 à 9.
                Créer une variable magnitude. Selon la valeur de magnitude, afficher la phrase correspondante :
                <table>
                    <tr>
                        <th class="enteteTable">Magnitude</th>
                        <th>Phrase</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Micro-séisme impossible à ressentir.</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Séisme capable d\'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Fort séisme capable d\'engendrer des destructions majeures sur une large distance (180 km) autour de l\'épicentre.</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Séisme capable de tout détruire sur une très vaste zone.</td>
                    </tr>
                </table>
                Gérer tous les cas.
                Utilser autre chose que des if else.
            </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" value="<?= "($magnitude) $magnitudeResult" ?>" readonly>
            <label for="text" class="mt-1"> Traduire ce code avec des if et des else : 
                &lt;?php
                echo ($gender != 'Homme') ? 'C\'est une développeuse !!!' : 'C\'est un développeur !!!';
                ?&gt : 
            </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" value="<?= $genderDevResult ?>" readonly>
            <label for="text" class="mt-1"> Traduire ce code avec des if et des else : 
                &lt;?php
                echo ($age >= 18) ? 'Tu es majeur' : 'Tu n\'es pas majeur';
                ?&gt : 
            </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" 
            value="<?= "$ageMajority ($age ans)"?>" readonly>
            <label for="text" class="mt-1"> Traduire ce code avec des if et des else : 
                &lt;?php
                echo ($isOk == false) ? 'c\'est pas bon !!!' : 'c\'est ok !!';
                ?&gt : 
            </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" 
            value="<?= "$isOKResult ($isOK)"?>" readonly>
            <label for="text" class="mt-1"> Traduire ce code avec des if et des else : 
                &lt;?php
                echo ($isOk) ? 'c'est ok !!' : 'c'est pas bon !!!';
                ?&gt : 
            </label>
            <input type="text" name="easy" id="easy" class="inputForm" placeholder="easy" 
            value="<?= "$isOKResultbis ($isOKbis)"?>" readonly>
        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
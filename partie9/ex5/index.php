<!-- PARTIE PHP -->
<?php
// Déclarations des variables
    $date = mktime(0,0,0,5,16,16);
    $dateCalc = time() - $date;
    $dateDay = $dateCalc/86400;
    $dateYear = $dateDay/365.25;

    echo  'Timestamp du jour : ' . time();
    echo ' Timestamp du 16 mai 2016 : ' . $date;
    echo ' Nombres de jours entre ces dates : ' . $dateDay;
    echo ' En année ca fait : ' . $dateYear;

// Avec DateTime
// $datePast = new DateTime('2016-08-02');
// $dateNow = new DateTime();
// $interval = $datePast->diff($dateNow);

// var_dump($datePast, $dateNow, $interval);
// echo $interval -> format('d-m-Y');

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
    <link rel="stylesheet" href="./public/assets/css/mediaQueries.css">
    <title>Laura's nails</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../">
                    <h1>Laura's nails</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../ex1/index.php">Exercice 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex2/index.php">Exercice 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex3/index.php">Exercice 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex4/index.php">Exercice 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex5/index.php">Exercice 5</a>
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
            <fieldset class="loginFieldset">Partie 9</fieldset>
            <label for="hidden" class="mt-1">
                EX 5 : Afficher le nombre de jour 
                    qui sépare la date du jour avec le 16 mai 2016.
            </label>
            <input type="text" name="hidden" id="hidden" class="inputForm" value="" hidden readonly>
            <label for="dateCurrent" class="mt-1"></label>
            <input type="text" name="dateCurrent" class="inputForm" id="dateCurrent" value="<?=$date ?? ''?>">

        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
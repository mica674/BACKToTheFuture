<!-- PARTIE PHP -->
<?php

// Déclarations des variables
if (empty($_COOKIE['loginUser']) || empty($_COOKIE['passwordUser'])) {
    $errorCookie = 'Pas de cookie';
}
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
                            <a class="nav-link" href="../ex1/user.php">Exercice 1</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="../ex6/index.php">Exercice 6</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex7/index.php">Exercice 7</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex8/index.php">Exercice 8</a>
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
        <form action="../ex4/user.php" method="post" class="d-flex flex-column align-items-center" id="loginForm">
            <fieldset class="loginFieldset">Partie 8</fieldset>
            <label for="hidden" class="mt-1">
                EX 3 : Faire un formulaire qui permet de récupérer le login et 
                    le mot de passe de l'utilisateur. 
                    A la validation du formulaire, stocker les informations dans un cookie.
            </label>
            <input type="text" name="hidden" id="hidden" class="inputForm" value="" hidden readonly>
            <label for="loginUser" class="mt-1"> Login : </label>
            <input type="text" name="loginUser" class="inputForm" id="loginUser" placeholder="User Agent" value="<?=$_COOKIE['loginUser'] ?? 'Cyprien@gmail.com'?>">
            <small><?=$errorCookie ?? ''?></small>
            <label for="passwordUser" class="mt-1"> Password : </label>
            <input type="password" name="passwordUser" class="inputForm" id="passwordUser" placeholder="Adresse IP" value="OuIoUi">
            <small><?=$errorCookie ?? ''?></small>
            <button type="submit"> Let's go bro</button>
        </form>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
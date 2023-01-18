<!-- PARTIE PHP -->
<?php
// Déclarations des variables

// Instructions
// Controle de l'existence des données transmise (existe? et traitement du contenu)
var_dump($_FILES);
if (($_SERVER['REQUEST_METHOD'] == 'POST')
    && isset($_FILES['userFile']['name'], $_FILES['userFile']['type'], $_FILES['userFile']['size'])) 
    {
        // Attribution des données à des variables
        $gender = $_POST['gender'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $fileName = $_FILES['userFile']['name']; //Nom du fichier envoyé
        $fileType = $_FILES['userFile']['type']; //Type du fichier envoyé
        // $extension =  substr(strrchr($fileName,'.'),1); //Extraction des caractères suivant le point dans $fileName
        $extension = pathinfo($fileName, PATHINFO_EXTENSION); //Autre méthode plus simple ^^
        
        if ($_FILES['userFile']['error'] == 2) { //Si error=2, fichier trop gros 
            $fileSize = 'Taille du fichier exécessif !';
        }
        else {
            $fileSize = $_FILES['userFile']['size'] . 'Bytes';
        }

        if ($gender == 'M') {
            $gender = 'Monsieur';
        } else {
            $gender = 'Madame';
        }    
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../ex1&3/index.php">Exercice 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex2&4/index.php">Exercice 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex1&3/index.php">Exercice 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ex2&4/index.php">Exercice 4</a>
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
        <?php
            if (($_SERVER['REQUEST_METHOD'] != 'POST')
            // && isset($_FILES['userFile']['name'], $_FILES['userFile']['type'], $_FILES['userFile']['size']) 
            ){
        ?>
        <form enctype="multipart/form-data" action="index.php" method="post" class="d-flex flex-column align-items-center">
            <fieldset class="loginFieldset">Partie 7</fieldset>
            <label for="text" class="mt-1"> 
                EX 6 : Avec le formulaire de l\'exercice 5, Si des données sont passées en POST ou en GET, le formulaire ne doit pas être affiché. 
                Par contre les données transmises doivent l\'être. Dans le cas contraire, c\'est l\'inverse.  

                N\'utiliser qu\'une seule page.
            </label>

            <label for="text" class="mt-1"> Genre</label>
            <select name="gender" id="gender">
                <option value="M" selected>M</option>
                <option value="Mme">Mme</option>
            </select>
            <label for="text" class="mt-1"> Nom</label>
            <input type="text" name="lastname" id="lastname" class="inputForm" placeholder=" Nom" value="Patagueul">
            <label for="text" class="mt-1"> Prénom</label>
            <input type="text" name="firstname" id="firstname" class="inputForm" placeholder=" Prénom" value="James">
            <label for="file">Choisir un fichier</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="300000">
            <input type="file" id="file" name="userFile">
            <button type="submit">Valider</button>
        </form>
            
        <?php } else {?>
        <p>Vos informations sont : <br>
            <ul>
                <li>Genre : <?=$gender?></li>
                <li>Nom : <?=$lastname?></li>
                <li>Prénom : <?=$firstname?></li>
                <li>Nom du fichier : <?=$fileName?></li>
                <li>Type du fichier : <?=$fileType?></li>
                <li>Taille du fichier : <?=$fileSize?></li>
                <li>Type d'extension : <?=$extension?></li>
            </ul>
        </p>
        <?php }?>

    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
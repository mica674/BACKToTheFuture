<!-- PHP -->
<?php

// Création d'un tableau de données pour les niveaux d'études
$webLanguages = ['HTML/CSS', 'PHP', 'Javascript', 'Python', 'Autres'];

// CONSTANTES
    // Décodage du json birthCountryList
    $birthCountryBeforeDecode = file_GET_contents('./public/assets/json/birthCountryList.json');
    $birthCountryList = json_decode($birthCountryBeforeDecode, true);
    define('BIRTH_LANGUAGES', $birthCountryList['countries']);
    // Création d'un tableau de données pour les niveaux d'études
    define('STUDY_LEVEL', ['none' => 'Sans','bac' => 'BAC','bac2' => 'BAC+2','bac3' => 'BAC+3','sup' => 'Suoérieur']);
    // Création d'un tableau de données pour les web langages
    define('WEB_LANGUAGES', ['HTML/CSS', 'PHP', 'Javascript', 'Python', 'Autres']);
    // REGEX
        // Lastname
        define('REGEXP_LASTNAME', "^[a-zA-ZÀ-ÿ' \-]{2,64}$");
        // Linkedin
        define('REGEXP_LINKEDIN', "^https:\/\/www.linkedin.com\/in\/([a-z]+)-([a-z]+)-([a-z0-9]+)\/$");
        // Zipcode
        define('REGEXP_ZIPCODE', "^(0[1-9]|[1-8]\d|9[0-8])\d{3}$");
        // Birthday
        define('REGEXP_BIRTHDAY', "^((19\d{2}|20[01]\d|202[1-3])\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01]))$");
        

// Récupérer les données du formulaire passées en POST
$password = $_POST['password'] ?? '';
$confirmedPassword = $_POST['confirmedPassword'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$profilePicture = $_POST['profilePicture'] ?? '';
$knownLanguages = $_POST['languages'] ?? '';

// var_dump($password, $confirmedPassword, $lastname, $birthday, $birthCountry, $zipcode, $studyLevel, $profilePicture, $urlLinkedin, $knownLanguages);



// Vérification des données
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Si les données sont bien envoyées en POST


    // EMAIL
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)); // Double nettoyage de l'email récupéré 

    if (empty($email)) { //Si $email est vide
        $error["email"] = 'L\'email n\'est pas renseigné'; //Message d'erreur EMAIL
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //Sinon si $email ne correspond pas à un format d'adresse email
        $error["email"] = 'L\'email ne correspond pas au format requis pour un email'; //Message d'erreur EMAIL format
    } 


    // LASTNAME
    // Nettoyage de tout les caractères ASCII 1 à 32
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // Suppression des caractères précisés entre guillemets ""
    // $lastname = trim(strip_tags($lastname), "\?\,\>\&#61;\&#62;\&#63;\&#33;\&#160;\&#173;\&#160;\ \&#173;\&#8206;\&#8207;");
    
    if (empty($lastname)) { //Si $lastname est vide
        $error["lastname"] = 'Le nom n\'est pas renseigné'; //Message d'erreur lastname
    } elseif (!filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_LASTNAME.'/')))) { //Sinon si $lastname ne correspond pas à un format lastname
        $error["lastname"] = 'Le nom ne correspond pas au format requis pour un nom'; //Message d'erreur lastname format
    }
    

    // URL
    // Nettoyage de tout les caractères ASCII 1 à 32
    $url = trim(filter_input(INPUT_POST, 'urlLinkedin', FILTER_SANITIZE_URL));
    
    if (empty($url)) { //Si $url est vide
        $error["url"] = 'L\'url n\'est pas renseigné'; //Message d'erreur url
    } elseif (!filter_var($url, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_LINKEDIN.'/')))) { //Sinon si $url ne correspond pas à un format url
        $error["url"] = 'L\'url ne correspond pas au format requis pour un url linkedin'; //Message d'erreur url format
    }
    

    // ZIPCODE
    // Nettoyage de tout les caractères ASCII 1 à 32
    $zipcode = trim(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT));
    
    if (empty($zipcode)) { //Si $zipcode est vide
        $error["zipcode"] = 'L\'zipcode n\'est pas renseigné'; //Message d'erreur zipcode
    } elseif (!filter_var($zipcode, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_ZIPCODE.'/')))) { //Sinon si $url ne correspond pas à un format url
        $error["zipcode"] = 'Le code postal ne correspond pas au format requis pour un code postal francais'; //Message d'erreur url format
    }


    // BIRTH COUNTRY
    // Nettoyage de tout les caractères ASCII 1 à 32
    $birthCountry = trim(filter_input(INPUT_POST, 'birthCountry', FILTER_SANITIZE_SPECIAL_CHARS));
    
    if (empty($birthCountry)) { //Si $birthCountry est vide
        $error["birthCountry"] = 'Le pays de naissance n\'est pas renseigné'; //Message d'erreur pays de naissance vide
    } elseif (!(in_array($birthCountry, BIRTH_LANGUAGES))) { //Sinon si $birthCountry ne correspond pas à un des pays du json
        $error["birthCountry"] = 'Le pays sélectionné ne correspond pas à un pays de la liste'; //Message d'erreur pays de naissance correspond pas au json
    }
    

    // STUDY LEVEL
    // Nettoyage de tout les caractères ASCII 1 à 32
    $studyLevel = trim(filter_input(INPUT_POST, 'studyLevel', FILTER_SANITIZE_SPECIAL_CHARS));
    
    if (empty($studyLevel)) { //Si $studyLevel est vide
        $error["studyLevel"] = 'Le niveau d\'étude n\'est pas renseigné'; //Message d'erreur niveau d'étude vide
    } elseif (!(key_exists($studyLevel, STUDY_LEVEL))) {
        $error["studyLevel"] = 'Le niveau d\'étude sélectionné ne correspond pas à un niveau d\étude de la liste'; //Message d'erreur niveau d'étude correspond pas à un niveau d'étude de la liste
    }

        // CORRECTION
        // $studyLevel = intval(filter_input(INPUT_POST, 'studyLevel', FILTER_SANITIZE_NUMBER_INT));

        // if($studyLevel<0 || $studyLevel>4){ // Il a mis de 0 à 4 dans ses value
        //     $error['studyLevel'] = 'Valeur non valide';
        // }

    // BIRTHDAY
    // Nettoyage de tout les caractères ASCII 1 à 32
    $birthday = trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT));
    
    if (empty($birthday)) { //Si $birthday est vide
        $error["birthday"] = 'La date de naissance n\'est pas renseignée'; //Message d'erreur date de naissance pas renseigné
    } elseif (!filter_var($birthday, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_BIRTHDAY.'/')))) { //Sinon si $url ne correspond pas à un format url
        var_dump($birthday);
        $error["birthday"] = 'La date de naissance n\'est pas valide'; //Message d'erreur url format
    }


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
    <title>Formulaire</title>
</head>

<body>

    <form action="./index.php" method="post" class="d-flex flex-column align-items-center" id="registrationForm" novalidate>
        <fieldset class="loginFieldset">Formulaire</fieldset>

        <!-- EMAIL -->
        <label for="email" class="mt-1">E-mail <span class="registrationRequired">*</span></label>
        <input type="email" name="email" id="email" class="inputForm" placeholder="E-mail" required autocomplete="email" value="<?= $email ?? '' ?>">
        <small <?=($error['email']?? false)?'class="text-danger"':''?>><?=$error['email'] ?? ''?></small>
        <!-- PASSWORD -->
        <label for="password" class="mt-1">Mot de passe <span class="registrationRequired">*</span></label>
        <input type="password" name="password" id="password" class="inputForm inputPassword" placeholder="Mot de passe" required autocomplete="password" value="<?= $password ?? '' ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{6,15}$">
        <!-- CONFIRMED PASSWORD -->
        <label for="confirmedPassword" class="mt-1">Confirmation du mot de passe <span class="registrationRequired">*</span></label>
        <input type="password" name="confirmedPassword" id="confirmedPassword" class="inputForm inputPassword" placeholder="Confirmation du mot de passe" required value="<?= $confirmedPassword ?? '' ?>" autocomplete="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{6,15}$">
        <!-- LASTNAME -->
        <label for=" lastname" class="mt-1">Nom <span class="registrationRequired">*</span></label>
        <input type="text" name="lastname" id="lastname" class="inputForm" placeholder="Nom" required autocomplete="family-name" value="<?= $lastname ?? '' ?>" pattern="<?=REGEXP_LASTNAME?>">
        <small <?=($error['lastname']?? false)?'class="text-danger"':''?>><?=$error['lastname'] ?? ''?></small>
        <!-- BIRTHDAY -->
        <label for="birthday" class="mt-1">Date de naissance <span class="registrationRequired">*</span></label>
        <input type="date" name="birthday" id="birthday" class="inputForm" placeholder="Date de naissance" required autocomplete="bday" value="<?= $birthday ?? '' ?>" min="1900-01-01" max="2000-01-01">
        <small <?=($error['birthday']?? false)?'class="text-danger"':''?>><?=$error['birthday'] ?? ''?></small>
        <!-- COUNTRY OF BIRTH -->
        <label for="birthCountry" class="form-label mt-1">Pays de naissance <span class="registrationRequired">*</span></label>
        <select class="form-select" name="birthCountry" id="birthCountry">
            <?php
            foreach ($birthCountryList["countries"] as $country) {
                $selectCountry = 'France';
                if (isset($birthCountry)) {
                    $selectCountry = $birthCountry;
                }
            ?>
                <option <?= ($country == $selectCountry) ? 'selected' : ''; ?>><?= $country ?></option>
            <?php
            }
            ?>
        </select>
        <small <?=($error['birthCountry']?? false)?'class="text-danger"':''?>><?=$error['birthCountry'] ?? ''?></small>
        <!-- ZIPCODE -->
        <label for="zipcode" class="mt-1" maxlegnth="1">Code postal <span class="registrationRequired">*</span></label>
        <input type="text" name="zipcode" id="zipcode" class="inputForm" placeholder="Code postal" required autocomplete="postal-code" value="<?= $zipcode ?? '' ?>" pattern="^[0-9]{5}$" maxlength="5">
        <!-- STUDY LEVEL -->
        <div class="ms-5">
            <legend class="ms-4 mt-4">Niveau d'étude <span class="registrationRequired">*</span></legend>
            <?php 
            foreach (STUDY_LEVEL as $level => $levelFr) {
            ?>
            <div class="form-check ms-5">
                <input class="form-check-input formRadio" type="radio" name="studyLevel" id="studyLevel<?=$level?>" value="<?=$level?>" <?=($studyLevel == $level)?'checked':''?>>
                <label class="form-check-label" for="studyLevelNone"><?=$levelFr?></label>
            </div>
            <?php
            }
            ?>
            <small <?=(($error['studyLevel']??false)?'class="text-danger"':'')?>><?=$error['studyLevel'] ?? ''?></small>
        </div>
        <!-- PROFILE PICTURE -->
        <div class="form-group">
            <label for="profilePicture" class="form-label mt-4">Photo de profil</label>
            <input class="form-control" type="file" id="profilePicture" name="profilePicture" accept="image/jgg">
        </div>
        <!-- URL LINKED -->
        <label for="urlLinkedin" class="mt-1">URL compte linked</label>
        <input type="url" name="urlLinkedin" id="urlLinkedin" class="inputForm" placeholder="https://example.fr" pattern="<?=REGEXP_LINKEDIN?>">
        <!-- KNOWN LANGUAGES -->
        <fieldset class="form-group">
            <legend class="mt-4">Quel langages web connaissez-vous ?</legend>
            <?php
            foreach (WEB_LANGUAGES as $value) { ?>
                <div class="form-check ms-5">
                    <input class="form-check-input" name="languages[]" type="checkbox" value="<?= ($value == 'HTML/CSS') ? 'HTML' : $value ?>" id="knownLanguage<?= ($value == 'HTML/CSS') ? 'HTML' : $value ?>" <?= ($value == 'HTML/CSS') ? 'HTML' : $value ?>>
                    <label class="form-check-label" for="knownLanguage<?= ($value == 'HTML/CSS') ? 'HTML' : $value ?>"><?= $value ?></label>
                </div>
            <?php } ?>
        </fieldset>
        <!-- XP DEV/INFO -->
        <div class="form-group">
            <label for="xpDev" class="form-label mt-4">Racontez une expérience avec la programmation et/ou l'informatique que vous auriez pu avoir</label>
            <textarea class="form-control" id="xpDev" rows="3"></textarea>
        </div>
        <small class="registrationSmall me-5">* Champs obligatoires pour s'inscrire</small>
        <div class="registrationBtns mt-2 d-flex justify-content-center">
            <button class="registrationBtn" id="registrerBtn" <?=($studyLevel??false)?'':'disabled'?>>S'inscrire</button>
        </div>
    </form>


    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
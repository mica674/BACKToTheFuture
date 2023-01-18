<!-- PARTIE PHP -->

<?php

// Récupérer les variables passées en _GET du formulaire
// Si les 2 en-tete HTTP ne sont pas vides

    //Affecter le mois sélectionné à la variable $monthSelected
    $monthSelected = (!empty($_GET['monthSelected']) && $_GET['monthSelected'] >=1 && $_GET['monthSelected'] <= 12) ? $_GET['monthSelected'] : date('m');
    //Affecter l'année sélectionnée à la variable $yearSelected
    $yearSelected = (!empty($_GET['yearSelected']) && $_GET['yearSelected'] >=1 && $_GET['yearSelected'] <= 3000) ? $_GET['yearSelected'] : date('Y');



if (!empty($_GET['changeMonth'])) {
    if ($_GET['changeMonth'] == 'last') {
        if ($monthSelected != 1) {
            $monthSelected --;
        } else {
            $monthSelected = 12;
            $yearSelected --;
        }     
    } else if ($_GET['changeMonth'] == 'next') {
        if ($monthSelected != 12) {
            $monthSelected ++;
        } else {
            $monthSelected = 1;
            $yearSelected ++;
        }     
    
    }
}

// Création de formats de date avec la class IntlDateFormatter
// Format du mois complet en francais
$monthFormatStringFr = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'LLLL'
);

// Format du mois complet en francais et de l'année
$monthYearFormatStringFr = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'LLLL yyyy'
);

// Format du jour de la semaine complet en francais
$dayOfWeekFormatStringFr = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'EEEE'
);

// Sélection d'une information précise correspondant au mois et à l'année sélectionnés
// Récupérer le nombre de jour dans le mois
$nbDaysInMonth = date('t', mktime(0, 0, 0, $monthSelected, 1, $yearSelected));
// Récupère le premier jour du mois
$firstDayOfMonthInt = date('N', mktime(0, 0, 0, $monthSelected, 1, $yearSelected));
// Récupère le dernier jour du mois
$lastDayOfMonthInt = date('N', mktime(0, 0, 0, $monthSelected + 1, 0, $yearSelected));

// Décodage de l'API
$holidaysBeforeDecode = file_GET_contents('./public/assets/json/holidaysMetropole.json');
$holidays = json_decode($holidaysBeforeDecode, true);


// LUNDI DE PAQUES / JEUDI DE L'ASCENSION / LUNDI DE PENTECOTE
    // Calcul du lundi de Pâques d'après l'année sélectionnée
    $easterDate = mktime(0,0,0,3,22+easter_days($yearSelected),$yearSelected);
    // Récupérer le mois et le jour sous le format '01'
    $easterDateDay = date('d', $easterDate);
    $easterDateMonth = date('m', $easterDate);
    // Ajouter 40 jours pour avoir le jeudi de l'ascension (86400s dans une journée)
    $ascensionDate = $easterDate + 38*86400;
    // Récupérer le mois et le jour sous le format '01'
    $ascensionDateDay = date('d', $ascensionDate);
    $ascensionDateMonth = date('m', $ascensionDate);
    // Ajouter 49 jours pour avoir le lundi de pentecote (86400s dans une journée)
    $pentecostDate = $easterDate + 49*86400;
    // Récupérer le mois et le jour sous le format '01'
    $pentecostDateDay = date('d', $pentecostDate);
    $pentecostDateMonth = date('m', $pentecostDate);

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
    <!-- <link rel="stylesheet" href="./public/assets/css/mediaQueries.css"> -->
    <title>Calendar in french</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../">
                    <h1>Calendar in French</h1>
                </a>
            </div>
        </nav>
        <!-- NAVBAR end -->
    </header>
    <!-- HEADER end -->


    <!-- Form -->
    <div class="mt-2">
        <form method="_GET" class="d-flex flex-column align-items-center" id="loginForm">
            <fieldset class="loginFieldset"></fieldset>

            <!-- Sélecteurs Mois/Année/Bouton -->
            <div class="d-flex mb-3">
                <!-- <label for="monthsSelected">Mois</label> -->
                <!-- Liste déroulante des mois du calendrier -->
                <select name="monthSelected" class="form-select" id="monthsSelected">
                    <?php
                    for ($month = 1; $month <= 12; $month++) {
                    ?>
                        <!-- Si le mois sélectionné correspond au mois 
                en cours de création dans la boucle for, on rajoute l'attribut 'selected' -->
                        <option value="<?= $month ?>" <?php if ($monthSelected == $month) { ?> selected<?php } ?>>
                            <?php echo datefmt_format($monthFormatStringFr, mktime(0, 0, 0, $month, 1, $yearSelected)) ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>

                <!-- <label for="yearSelected">Année</label> -->
                <!-- Liste déroulante des années du calendrier -->
                <select name="yearSelected" class="form-select mx-3" id="yearSelected">
                    <?php
                    for ($year = 1970; $year <= 2038; $year++) {
                    ?>
                        <!-- Si le mois sélectionné correspond au mois 
                en cours de création dans la boucle for, on rajoute l'attribut 'selected' -->
                        <option <?php if ($yearSelected == $year) { ?>selected<?php } ?>><?= $year ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <button name="voir" type="submit" class="btn btn-primary" value="test">Voir</button>
            </div>
            <!-- Affichage du mois et de l'année sélectionnés, du mois précédent et du mois suivant -->
            <div class="d-flex mb-3">
                <button type="submit" class="displayMonthYearAround opacite5" readonly
                   name="changeMonth" value="last"><?php echo datefmt_format($monthYearFormatStringFr, mktime(0, 0, 0, $monthSelected-1, 1, $yearSelected))?></button>
                       
                <div class="displayMonthYearSelected">
                    <?php echo datefmt_format($monthYearFormatStringFr, mktime(0, 0, 0, $monthSelected, 1, $yearSelected)) ?>
                </div>
                <button type="submit" class="displayMonthYearAround opacite5" readonly
                   name="changeMonth" value="next"><?php echo datefmt_format($monthYearFormatStringFr, mktime(0, 0, 0, $monthSelected+1, 1, $yearSelected))?></button>                </div>
        </form>



    </div>
    <div class="days d-flex flex-wrap justify-content-center">
        <?php

        // Si les données $monthSelected et $yearSelected existent
        if (isset($monthSelected, $yearSelected)) {
            // Boucler pour créer le calendrier
            // La taille du calendrier dépend du nombre de jour dans le mois sélectionné, 
            // du jour de la semaine par lequel commence le mois,
            // et du nombre de jour restant jusqu'au prochain dimanche après le dernier jour du mois 
            for ($day = 1; $day < $firstDayOfMonthInt + $nbDaysInMonth + 7 - $lastDayOfMonthInt; $day++) {
                // Si le jour en cours est un samedi ou un dimanche
                if (date('N', mktime(0, 0, 0, $monthSelected, $day - $firstDayOfMonthInt + 1, $yearSelected)) == 6
                    || date('N', mktime(0, 0, 0, $monthSelected, $day - $firstDayOfMonthInt + 1, $yearSelected)) == 7
                ) {
                    $weekEnd = true;
                } else {
                    $weekEnd = false;
                }
                
                // Si le jour en cours est le jour actuel
                if (date('Y-m-d', mktime(0, 0, 0, $monthSelected, $day - $firstDayOfMonthInt + 1, $yearSelected)) == date('Y-m-d', time())) {
                    $todayIsToday = true;
                } else {
                    $todayIsToday = false;
                }
                
                // Mettre dans le format internation la date en cours dans la boucle
                $dateTransformInternationalNorm = date('Y-m-d', mktime(0,0,0,$monthSelected,($day - $firstDayOfMonthInt + 1),$yearSelected));
                
                // Si la date en cours correspond au lundi de Pâques ou jeudi de l'ascension ou au lundi de pentecote
                if (date('m',strtotime($dateTransformInternationalNorm) == $easterDateMonth) && date('d',strtotime($dateTransformInternationalNorm)) == $easterDateDay) {
                    $displayHoliday = 'Lundi de Pâques';
                } else if (date('m',strtotime($dateTransformInternationalNorm) == $ascensionDateMonth) && date('d',strtotime($dateTransformInternationalNorm)) == $ascensionDateDay) {
                    $displayHoliday = 'Jeudi de l\'ascension';
                } else if(date('m',strtotime($dateTransformInternationalNorm) == $pentecostDateMonth) && date('d',strtotime($dateTransformInternationalNorm)) == $pentecostDateDay){
                    $displayHoliday = 'Lundi de Pentecôte';
                }

                // Si l'année sélectionnée est disponible dans l'API/json
                if ($yearSelected >= 2003 && $yearSelected <= 2028) {
                    if (array_key_exists($dateTransformInternationalNorm, $holidays)) {
                        $holidaysOrNot = true;
                    } else {
                        $holidaysOrNot = false;
                    }
                }
                else {
                    // Si le jours en cours correspond à un jour férié mettre $holidaysOrNotOut à 'true'
                    if ((date('m', strtotime($dateTransformInternationalNorm)) == 1) && date('d', strtotime($dateTransformInternationalNorm)) == 1
                        || (date('m',strtotime($dateTransformInternationalNorm)) == $easterDateMonth) && date('d',strtotime($dateTransformInternationalNorm)) == $easterDateDay
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 5) && date('d',strtotime($dateTransformInternationalNorm)) == 1
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 5) && date('d',strtotime($dateTransformInternationalNorm)) == 8
                        || (date('m',strtotime($dateTransformInternationalNorm)) == $ascensionDateMonth) && date('d',strtotime($dateTransformInternationalNorm)) == $ascensionDateDay
                        || (date('m',strtotime($dateTransformInternationalNorm)) == $pentecostDateMonth) && date('d',strtotime($dateTransformInternationalNorm)) == $pentecostDateDay
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 7) && date('d',strtotime($dateTransformInternationalNorm)) == 14
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 8) && date('d',strtotime($dateTransformInternationalNorm)) == 15
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 11) && date('d',strtotime($dateTransformInternationalNorm)) == 1
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 11) && date('d',strtotime($dateTransformInternationalNorm)) == 11
                        || (date('m',strtotime($dateTransformInternationalNorm)) == 12) && date('d',strtotime($dateTransformInternationalNorm)) == 25
                    ){
                        $holidaysOrNotOut = true;
                    } else {
                        $holidaysOrNotOut = false;
                    }}
                
                if ($day < $firstDayOfMonthInt) {
        ?>
                <!-- Affichage des jours du mois d'avant -->
                    <div class="card opacite5 <?= $weekEnd ? 'text-danger bg-dark' : 'bg-disabled';?>">
                        <div class="card-header">
                            <?php echo datefmt_format($dayOfWeekFormatStringFr, mktime(0, 0, 0, $monthSelected, $day - $firstDayOfMonthInt + 1, $yearSelected)) . ' ' . date('j', mktime(0, 0, 0, $monthSelected, 1 - $firstDayOfMonthInt + $day, $yearSelected)) ?></div>
                        <div class="card-body">
                            <h4 class="card-title"><?= isset($holidaysOrNot) ? ($holidaysOrNot ? $holidays[$dateTransformInternationalNorm] : '') : ($holidaysOrNotOut ? $holidays['2023-'.date('m',strtotime($dateTransformInternationalNorm)).'-'.date('d',strtotime($dateTransformInternationalNorm))] ?? $displayHoliday : ''); ?></h4>
                            <p class="card-text">Jour du mois d'avant</p>
                        </div>
                    </div>
                <?php
                } else if ($day < $firstDayOfMonthInt + $nbDaysInMonth) {
                ?>

                <!-- Affichage des jours du mois en cours -->
                <div class="card <?= $todayIsToday ? 'bg-success text-white' : ($weekEnd ? 'text-danger bg-dark' : 'text-dark bg-light');?>">
                    <div class="card-header">
                        <?php echo datefmt_format($dayOfWeekFormatStringFr, mktime(0, 0, 0, $monthSelected, $day - $firstDayOfMonthInt + 1, $yearSelected)) . ' ' . ($day - $firstDayOfMonthInt + 1); ?>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title <?= $todayIsToday ? 'text-warning' : 'text-dark' ?>"><?= isset($holidaysOrNot) ? ($holidaysOrNot ? $holidays[$dateTransformInternationalNorm] : '') : ($holidaysOrNotOut ? $holidays['2023-'.date('m',strtotime($dateTransformInternationalNorm)).'-'.date('d',strtotime($dateTransformInternationalNorm))] ?? $displayHoliday : ''); ?></h4>
                        <p class="card-text <?= $todayIsToday ? 'text-warning' : 'text-dark' ?>">Jour du mois en cours</p>
                    </div>
                </div>
                <?php
                } else {
                ?>

                <!-- Affichage des jours du mois d'après -->
                <div class="card opacite5 <?= $weekEnd ? 'text-danger bg-dark' : 'bg-disabled';?>">
                    <div class="card-header">
                        <?php echo datefmt_format($dayOfWeekFormatStringFr, mktime(0, 0, 0, $monthSelected, $day - $firstDayOfMonthInt + 1, $yearSelected)) . ' ' . ($day - $firstDayOfMonthInt - $nbDaysInMonth + 1); ?>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?= isset($holidaysOrNot) ? ($holidaysOrNot ? $holidays[$dateTransformInternationalNorm] : '') : ($holidaysOrNotOut ? $holidays['2023-'.date('m',strtotime($dateTransformInternationalNorm)).'-'.date('d',strtotime($dateTransformInternationalNorm))] ?? $displayHoliday : ''); ?></h4>
                        <p class="card-text">Jour du mois d'après</p>
                    </div>
                </div>
                <?php
                }
            }
        }
        ?>
    </div>
    <!-- Form end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./public/assets/js/script.js"></script>

</body>

</html>
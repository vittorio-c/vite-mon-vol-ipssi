<?php
use App\Services\Session;
$session = Session::getInstance();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= SITE_NAME ?></title>
</head>

<body>
    <section>
        <p>
            Connecté en tant que : <?= $session->loggedInUser->username ?>
        </p>
        <p><a href="/logout">Déconnectez-moi</a></p>
    </section>
    <section>
        <h1>Nos circuits</h1>
        <?php foreach ($tours as $tour): ?>
            <article>
                <h2>
                    <strong><?= $tour->name ?></strong>
                </h2>
                <p><?= $tour->description ?></p>
                <p>
                    Départ depuis: <?= $tour->destinations->departure ?><br>
                    Arrivée à : <?= $tour->destinations->arrival ?>
                </p>
                <p>
                    Etapes :
                <ul>
                    <?php foreach ($tour->destinations->halts as $halt): ?>
                        <li><?= $halt ?></li>
                    <?php endforeach; ?>
                </ul>
                </p>
            </article>

        <?php endforeach; ?>
    </section>

</body>

</html>

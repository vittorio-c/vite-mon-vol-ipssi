<?php
//session_start(['cookie_lifetime' => 86400]);
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
    <h1>Inscription</h1>
    <form action="/try-subscribe"  method="post">
        <label>
            Email
            <input type="email" name="email">
        </label>
        <label>
            Nom
            <input type="text" name="username">
        </label>
        <label>
            Mot de passe
            <input type="password" name="password">
        </label>
        <button type="submit">Inscription</button>
    </form>
    <?php if (!empty($session->subscribeError)) echo '<p>'.$session->subscribeError.'</p>'; ?>
    <p>Déjà un compte ? <a href="/login">Connectez-vous !</a></p>
</body>

</html>

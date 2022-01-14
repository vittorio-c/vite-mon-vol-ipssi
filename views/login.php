<?php
//session_start(['cookie_lifetime' => 86400]);
use App\Services\Session;
$session = Session::getInstance();
$session->destroy();
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
    <h1>Login</h1>
    <form action="/try-login"  method="post">
        <label>
            <input type="text" name="email">
        </label>
        <label>
            <input type="text" name="password">
        </label>
        <button type="submit">Connectez-moi</button>
    </form>
    <?php if (!empty($session->loginError)) echo '<p>'.$session->loginError.'</p>'; ?>
</body>

</html>

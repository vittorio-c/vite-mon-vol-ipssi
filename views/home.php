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
    <h1>Home</h1>
</body>

</html>

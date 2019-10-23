<?php
session_start();
session_unset();
unset($_COOKIE["username"]);
unset($_COOKIE["password"]);
header("Location: connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
</head>
<body>
    
</body>
</html>
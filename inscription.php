<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>

<body>
<div class="container-fluid">
    <div class="row ">
    <h1>Getflix</h1>
    </div>
        <div class="row">
            <div class="col-sm-4 "></div>
                <div class="col-sm-4 text-center ">
                        <h2>S'inscrire</h2>
                        <form action="inscription.php" method="POST">
                                <p><input type="email" placeholder="e-mail" name="email"></p>
                                <p><input type="text" placeholder="Pseudo" name="username"></p>
                                <p><input type="password" placeholder="password" name="password1"></p>
                                <p><input type="password" placeholder="confirm" name="password2"></p>
                                <p><label > <input type="checkbox"> se souvenir de moi</label></p>
                                <p><input type="submit" value="Inscription"></p> 
                            </form>
                            <p>Vous avez déjâ un compte? <a href="">Connectez-vous</a></p>
                </div>

        
</div>
</body>

</html>
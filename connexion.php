<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
<nav class="navbar navbar-dark bg-transparent">
  <a class="navbar-brand" href="#">
    GetFlix
  </a>
</nav>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
<div id="main">
    <h3>Se connecter</h3>
        <form method="POST" action="login.php" >
        <input class="input" type ="name" name="pseudo" placeholder="Pseudo"><br>
        <input class="input" type ="password" name="password" placeholder="Mot de passe"><br>
        <input type="checkbox" name="remember"> <label>Se souvenir de moi</label> <br>
        <a href="reset.php">Mot de passe oublié? </a><br>
        <input id="connect" type="submit" name="submit" value="Connexion">
        </form>
    <p>Pas encore de compte ? <a href="inscription.php">Inscrivez vous</a> </p>
</div>
    </div>
    <div class="col-sm">
      
    </div>
  </div>
</div>
  





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
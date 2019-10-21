<?php
//On vérifie que ce qu'on doit ajouter est set et pas vide avant d'accéder à la 
if (isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['email']) && $_POST['username']!="" && $_POST['password1']!="" && $_POST['email']!="" ) {
  try{

    //On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch (Exception $e) {

    //En cas d'erreur on affiche un message et on arrete tout
    die('Erreur : ' . $e->getMessage());
  }
  if($_POST['password1']==$_POST['password2'] && valid_email($_POST['email']) ) {
    $req = $bdd->prepare('INSERT INTO users(username,password,email,status) VALUES(:username,:password,:email,1)') or die(print_r($bdd->errorInfo()));

    $req->execute(array(
      'username'=>htmlspecialchars($_POST['username']),
      'password'=>htmlspecialchars($_POST['password1']),
      'email'=>htmlspecialchars($_POST['email'])
    ));

    header("Location: connexion.php");

  }
  else {
    echo "Les deux mdp sont différent";
  }


}
function valid_email($str) {
return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Inscription</title>
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
    <h3>S'inscrire</h3>
    <form action="inscription.php" method="POST">
            <input class="input" type="email" placeholder="E-mail" name="email"><br>
            <input class="input" type="text" placeholder="Pseudo" name="username"><br>
            <input class="input" type="password" placeholder="Mot de passe" name="password1" id="password" onkeyup="check()"><br>
            <input class="input" type="password" placeholder="Confirmez votre mot de passe" name="password2" id="confirm_password" onkeyup="check()"><br>
            <span id='message'></span>
            <input type="checkbox" name="remember"> <label>Se souvenir de moi</label> <br>
            <input id="connect" type="submit" name="submit" value="Inscription">
        </form>
    <p>Déja un compte ? <a href="connexion.php">Connectez vous</a> </p>
</div>
    </div>
    <div class="col-sm">

    </div>
  </div>
      
</div>
  



<script type="text/javascript">
    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
      }
    }
    </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>
</html>


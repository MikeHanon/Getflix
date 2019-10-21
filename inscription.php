<?php
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
    echo "mdp incorect";
  }


}
function valid_email($str) {
return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Inscription</title>
</head>

<body>
    <h1>Getflix</h1>
    <h2>S'inscrire</h2>
    <form action="inscription.php" method="POST">
            <p><input type="email" placeholder="e-mail" name="email"></p>
            <p><input type="text" placeholder="Pseudo" name="username"></p>
            <p><input type="password" placeholder="password" name="password1"></p>
            <p><input type="password" placeholder="confirm" name="password2"></p>
            <p><input type="submit"></p>
        </form>
</body>

</html>

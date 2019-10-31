<?php

session_start();
  try {
  $bdd = new PDO('mysql:host=localhost; dbname=Getflix', 'root', '');
  }
  catch (Exception $e){
  die('Erreur : ' . $e->getMessage());
  }
  
if(isset($_POST['recup_submit']) && isset($_POST['recup_mail']) && $_POST['recup_mail']!="") { //check if fields are empty
      $etape1=false;
  $recup_mail = htmlspecialchars($_POST['recup_mail']); //check if mail have the good characteres
      if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {   //mail validation
         $mailexist = $bdd->prepare('SELECT email FROM users WHERE email = ?'); //verfy mail exits in our bdd
         $mailexist->execute(array($recup_mail));
         if($mailexist) {
          echo "mail existant en bdd";
            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = "";
          //creation code aleatoire
            for($i=0; $i < 8; $i++) { 
              $recup_code .= mt_rand(0,9);
            }
            $recup_insert = $bdd->prepare('INSERT INTO recuperation(email,code) VALUES (?, ?)');
            $recup_insert->execute(array($recup_mail,$recup_code));
            $mail_recup_exist = $bdd->prepare('SELECT * FROM recuperation WHERE email = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $header ='From:"isabel.aguera.c@gmail.com';
            $message = 'Here your recovery code:'.$recup_code;
            mail($recup_mail,"Password recovery - SeriesAddict",$message,$header);
            $etape1=true;
            //2eme etape
            print_r($mail_recup_exist);
            // if($mail_recup_exist['code'] == $_POST['verif_code']) {
            // echo "code entrée est le meme que dans bdd";
            // //envoie du mail

            // } 
   
         } else {
            $error = "Email not registred";
         }
      } 
   else {
    $error = "Email not valide";
 } 
}
else {
  $error = "Enter your email";
  echo $error;
}
//
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {

   if(!empty($_POST['verif_code'])) {

      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $bdd->prepare('SELECT * FROM recuperation WHERE email = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         
      } else {

         $error = "Code not valide";
      }

   } else {

      $error = "Enter validate code";
   }

}//
//
if(isset($_POST['change_submit'])) {

   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {

      $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE email = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $bdd->prepare('UPDATE users SET password = ? WHERE email = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $bdd->prepare('DELETE FROM recuperation WHERE email = ?');
              $del_req->execute(array($_SESSION['recup_mail']));
               header('Location:http://localhost/Getflix/conexion.php');
            } else {
               $error = "Your passwords do not match";
            }

         } else {

            $error = "Please complete all fields";

         }

      } else {

         $error = "Please validate your email with the verification code";

      }

   } else {

      $error = "Please complete all fields";

   }
}
//
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Forgot password</title>
</head>
<body>
<nav class="navbar navbar-light bg-transparent">
  <a class="navbar-brand" href="connexion.php">
    <div class="logo"><img src="css/media/logo.gif" width="100%" alt="logo"></div>
  </a>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md">
    </div>
    <div class="col-md col-sm-12 col-xs-12">
<div id="main">
  <h3>Forgot password</h3>
      <?php if($etape1==true) {
       
       echo "  <form method='POST' action='reset.php'>
       <input type='text' placeholder='Code de vérification' name='verif_code'/><br/>
       <input type='submit' value='Valider' name='verif_submit'/>
     </form>";        
      }?>

          <?php if (isset($_POST['verif_submit'])){ ?>
      New password for:  <?= $_SESSION['recup_mail'] ?>
  <form method="post">
    <input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/><br/>
    <input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/><br/>
    <input type="submit" value="Valider" name="change_submit"/>
  </form>
                <?php if (isset($_POST['change_submit'])) { 
                header('location:connexion.php')
                ?>
   <?php }} else{ ?>
    <form action="reset.php" method="POST">
    <input class="input" type="email" placeholder="  E-mail" name="recup_mail"><br>
      <span id='message'></span><br>
    <input id="connect" type="submit" name="recup_submit" value="Envoyez un mail">
  </form>
      <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>
      <p>Already an account ? <a href="connexion.php">Sign in</a> </p>
  </div>
    </div>
    <div class="col-md">
    </div>
  </div>
</div>
   <?php }?>        
<script type="text/javascript">
    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = '<span>matching</span>';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '<span>not matching</span>';
      }
    }
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
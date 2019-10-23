<?php

session_start();

  try{

    //Connection to MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch (Exception $e) {

    //If an issue occurs, show a message and stop
    die('Erreur : ' . $e->getMessage());
  }

  //Check if we need to change the username, and if it's ok to do so
  if(isset($_POST['name']) && trim($_POST['name']) != "" ) {

    $req = $bdd->prepare('UPDATE users SET username = :name WHERE username = :username') or die(print_r($bdd->errorInfo()));

    $req->execute(array(
      'name'=>htmlspecialchars(trim($_POST['name'])),
      'username'=>htmlspecialchars($_SESSION['username'])
    ));

    $req->closeCursor();

    $_SESSION['username'] = htmlspecialchars(trim($_POST['name']));
  }

  //Check if we need to change the password, and if it's ok to do so
  if (isset($_POST['password']) && isset($_POST['password1']) && !empty($_POST['password']) && !empty($_POST['password1']) && $_POST['password'] == $_POST['password1'] ) {

    $req = $bdd->prepare('UPDATE users SET password = :password WHERE username = :username') or die(print_r($bdd->errorInfo()));

    $req->execute(array(
      'password'=>htmlspecialchars(trim($_POST['password'])),
      'username'=>htmlspecialchars($_SESSION['username'])
    ));

    $req->closeCursor();
  }

  //Check if we need to change the email, and if it's ok to do so
  if (isset($_POST['email']) && valid_email($_POST['email']) ) {

    $req = $bdd->prepare('UPDATE users SET email = :email WHERE username = :username') or die(print_r($bdd->errorInfo()));

    $req->execute(array(
      'email'=>htmlspecialchars($_POST['email']),
      'username'=>htmlspecialchars($_SESSION['username'])
    ));

    $req->closeCursor();
  }

  //Check if we need to change the profile picture
  if (isset($_POST['img']) && $_POST['img'] != "Choose..." ){

    $req = $bdd->prepare('UPDATE users SET img = :img WHERE username = :username') or die(print_r($bdd->errorInfo()));

    $req->execute(array(
      'img'=>$_POST['img'],
      'username'=>htmlspecialchars($_SESSION['username'])
    ));

    $req->closeCursor();
  }

  $ok = false;
  $req = $bdd->query('SELECT username FROM users') or die(print_r($bdd->errorInfo()));
  while ($donnees = $req->fetch()) {
    if($donnees['username'] == $_SESSION['username']){
      $ok = true;
    }
  }

  if(isset($_SESSION['username']) && $ok == true){

  //Show user's datas
  $name = "pas reçu"; $password = "pas reçu"; $email = "pas reçu"; $img = "profile1.png";
  $req = $bdd->prepare('SELECT username,password,email,img FROM users WHERE username = :username') or die(print_r($bdd->errorInfo()));

  $req->bindValue('username',htmlspecialchars($_SESSION['username']),PDO::PARAM_STR);
  $req->execute();

  while ($donnees = $req->fetch()) {
    $name = $donnees['username'];
    $password = $donnees['password'];
    $email = $donnees['email'];
    $img = $donnees['img'];
  }
  $req->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>Your account settings</title>
   <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
 </head>
 <body>

   <?php include 'NavBar.php'; ?>

   <div class="container mt-5 mb-5">
     <div class="row">
       <div class="col-md-4">
         <img src=<?php echo "\"css/media/" .$img . "\"" ?> alt="profile picture"><br>

         <form action="settings.php" method="post">
          <div class="form-row align-items-center">
            <div class="col-auto my-1">
              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
              <select name="img" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="profile1.png">green</option>
                <option value="profile2.png">orange</option>
                <option value="profile3.png">cyan</option>
                <option value="profile4.png">beige</option>
                <option value="profile5.png">blue</option>
              </select>
            </div>
            <div class="col-auto my-1">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>

       </div>
       <div class="col-md-1">

       </div>
       <div class="accordion text-center col-md-7" id="accordionExample">
        <div class="card ">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Your name : <?php echo $name; ?>
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <form class="" action="settings.php" method="post">
                <label>New name :</label><br>
                <input type="text" name="name" value="" id="name" onkeyup="checkSubmit('name','name1')"><br><br>
                <input type="submit" name="submit" value=" Submit " id="name1" disabled="disabled">
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Your password : <?php echo $password ?>
              </button>
            </h2>
          </div>

          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <form class="" action="settings.php" method="post">
                <label>Your new password :</label><br>
                <input type="password" name="password" value="" id="password" onkeyup="check()"><br>
                <label>Type your new password a second time :</label><br>
                <input type="password" name="password1" value="" id="confirm_password" onkeyup="check()"><br>
                <span id='message'></span><br>
                <input type="submit" name="submit" value=" Submit " id="submit" disabled="disabled">
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Your email : <?php echo $email; ?>
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <form class="" action="settings.php" method="post">
                <label>Your new email :</label><br>
                <input type="email" name="email" value="" onkeyup="checkSubmit('email','email1')" id="email"><br><br>
                <input type="submit" name="submit" value=" Submit " id="email1" disabled="disabled">
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script type="text/javascript">
    var check = function() {
      if (document.getElementById('password').value ==  document.getElementById('confirm_password').value && document.getElementById('password').value.length != 0 ) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        document.getElementById('submit').disabled = '';
      }
      else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        document.getElementById('submit').disabled = 'disabled';
      }
    }
    function checkSubmit(n, m){
      if (document.getElementById(n).value.length != 0) {
        document.getElementById(m).disabled = '';
      }
      else{
        document.getElementById(m).disabled = 'disabled';
      }
    }
  </script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
</html>
<?php
}
else{
  header('Location: connexion.php');

  exit;
}

//Check if the string look like an email address
function valid_email($str) {
  return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
 ?>

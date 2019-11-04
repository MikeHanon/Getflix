<?php
session_start();
echo $_POST['email'];
if(isset($_POST['email']) && isset($_POST['subject'])&& $_POST['email'] !=""){
  $to      = 'yassin.assecoum@hotmail.com';
  $subject = $_POST['subject'];
  $message = $_POST['text'];
  $headers = array(
      'From' => $_POST['email'],
      'Reply-To' => 'yassin.assecoum@hotmail.com',
      'X-Mailer' => 'PHP/' . phpversion()
  );
  echo "dlalda";


mail($to, $subject, $message, $headers);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style4.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="css/media/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="css/media/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="css/media/favicon/favicon-16x16.png">
    <link rel="manifest" href="css/media/favicon/site.webmanifest">
    <title>SeriesAddict</title>
</head>

<header>
<!--On inclut la NavBar-->
<?php include('NavBar.php'); ?>
</header>
<body class="contact">
<div class="container">
  <div class="row">
    <div class="col-md">
    </div>
    <div class="col-md col-sm-12 col-xs-12 mt-3">
<div id="main">
   <h3 class="title1">Contact Us</h3>
   <form method="POST">
  <div class="form-group m-2">
    <label for="exampleFormControlInput1" class="titrep">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="yourmail@example.com">
  </div>
  <div class="form-group m-2">
    <label for="exampleFormControlSelect1" class="titrep">Your subjet: </label>
    <select class="form-control" name="subject" id="exampleFormControlSelect1">
      <option>Question</option>
      <option>Complain</option>
      <option>Advice</option>
    </select>
  </div>
  <div class="form-group m-2">
    <label for="exampleFormControlTextarea1" class="titrep">Your text:  </label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-danger m-2 mb-0">Send</button>
  </form>
   

</div>
    </div>
    <div class="col-md">
    </div>
  </div>
        </div>
    </div>

</div>

</body>

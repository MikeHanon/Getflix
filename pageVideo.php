<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>SeriesAddict</title>
</head>

<body>
<!--On inclut la NavBar-->
<?php include('NavBar.php'); ?>
<!--Video à ajouter-->



<!--Collapse-->
<div class="row d-flex justify-content-around mb-2 ml-1 mr-1">
  <div class="col">
  <button class="btn" id="button" data-toggle="collapse" href=".collapse.multi-collapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Informations</button>
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
<!--Information du film--> blablabla
      </div>
    </div>
  </div>
  <div class="col">
  <button class="btn" id="button" type="button" data-toggle="collapse" href=".collapse.multi-collapse1" aria-expanded="false" aria-controls="multiCollapseExample2">Reviews</button>
    <div class="collapse multi-collapse1"  id="multiCollapseExample2">
      <div class="card card-body">
<!--Commentaires--> blabla
      </div>
    </div>
  </div>
  <div class="col">
  <button class="btn" id="button" type="button" data-toggle="collapse" href=".collapse.multi-collapse2" aria-expanded="false" aria-controls="multiCollapseExample3">More like this</button>
    <div class="collapse multi-collapse2" id="multiCollapseExample3">
      <div class="card card-body">
<!--Film Simmilaire-->
      </div>
    </div>
  </div>
</div>

<!--On inclut le footer-->
<?php include('footer.php'); ?>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/75bed6266a.js"></script>

</html>
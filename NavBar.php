<?php
if (isset($_SESSION['username'])) {

  $user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/css/media/minicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <title>SeriesAddict</title>
</head>

<body>
<!-- NavBar -->

<nav class="navbar navbar-expand-lg navbar-transparent" data-toggle="collapse">
        <a class="navbar-brand" href="index.php"></a>
        <div class="logo"><a href="index.php"><img src="css/media/logo.gif" width="80%" alt='logo'></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Film
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="action.php">Action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="adventure.php">Adventure</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="comedy.php">Comedy</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="horror.php">Horror</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="thriller.php">Thriller</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="drama.php">Drama</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="family.php">Family</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="history.php">History</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="mistery.php">Mystery</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="romantic.php">Romantic</a>
        </div>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="series.php">Series TV</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="animation.php">Animation</a>
        </li>

 
        
                <li class="nav-item">
                    <a class="nav-link" href="recently.php">Recently Added</a>
                </li>
            </ul>

            <!-- Button Search -->

            <form class="form-inline ml- 2 my-lg-0" id="dropdown" action="#">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" id="search" name="input"  list="movies" >
                <datalist id="movies">
                </datalist>
            </form>

            <!-- Button déroulant -->
            <li class="nav-item form-inline">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"></a>
                   <?php echo "<span id ='user'>".$user."</span>" ;?>
                </a>

                <div class="dropdown-menu dropdown-menu-lg-right dropdown-menu-md-left dropdown-menu-sm-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Sign out</a>


                </div>





        </div>
    </nav>
    <div id="recherche">

    </div>

    <script >
     
      var id = 0

      const input = document.getElementById('search')
      input.onkeyup = (e)=>recherche(e)

      //Recherche dans la db, e = touche pressée
      function recherche(e){
        var recu = ""
        if(e.key != 'ArrowDown' && e.key != 'ArrowUp'){
          //Si le recherche est vide on n'affiche rien
          if(document.getElementById('search').value.length == 0){
            document.getElementById("recherche").innerHTML = recu;
          }
          //Si il a qqch a rechercher on affiche ce que la db renvoie
          else if(document.getElementById('search').value.length != 0 ) {
            
            var str = document.getElementById('search').value;
            fetch("https://api.themoviedb.org/3/search/movie?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US&query=" + str + "&include_adult=false").then(response => response.json())
            .then(data=>{
              affiche(data.results)
                for (var i = 0; i < data.results.length; i++) {
                  if(data.results[i].poster_path !=null){
                    recu +="<a class='pochette' href='pageVideo.php?id="+data.results[i].id+"'><img width= 15% src=http://image.tmdb.org/t/p/w185//".concat(data.results[i].poster_path,"></img> </a>" )
                  }
                }
                document.getElementById("recherche").innerHTML = recu;
              });
          }
        }
      }

      //Affiche les 5 premiers éléments du tableau dans la datalist, sous l'input
      function affiche(array){
        var msg = "";
        for (var i = 0; i < 5; i++) {
          msg += "<option value='" + array[i].title + "'>";
        }
        document.getElementById('movies').innerHTML = msg;
      }

    </script>

  <script src="https://kit.fontawesome.com/75bed6266a.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
<?php
}
else {
  header('Location: ./connexion.php');

  exit;
}
 ?>

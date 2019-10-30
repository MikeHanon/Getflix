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
    <link rel="stylesheet" href="css/cssIndex.css"> 
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
<script>
            function afficherFilm(nombre,url,id){
                var content=document.getElementById(id);
                page=1;
                id="";
                nombre=6;
                genre="";
                url1=url+page;
                function movie(page){
                    fetch(url)
                    .then(reponse =>reponse.json())
                    .then (data => {
                    for(var i=0;i<nombre;i++){
                    var test  =data.results[i].poster_path;
                    var id = data.results[i].id;
                    content.innerHTML+="<div class='col-md-2 pochette'><a href='pageVideo.php?id="+id+"'><img width= 80% src=http://image.tmdb.org/t/p/w185//".concat(test,"></img> </a></div>" );
                    }
                    // var test  =data.results[i].poster_path;
                    // content.innerHTML="<img src=http://image.tmdb.org/t/p/w185//".concat(test,"></img>");
                    // console.log(test);
                    })
                    }
            movie();
            }
    
    //mettre titre a chaque pochette quand mouseOver       /pas fonctionnel
//     var titre = document.getElementByClassname("pochette");
  
  
//   // ce gestionnaire sera exécuté une seule fois lorsque le curseur passera au dessus de la liste non ordonnée
//   test.addEventListener("mouseover", function( event ) {   
//     // met en surbrillance la cible de mouseenter
//     event.target.style.color = "purple";

//     // réinitialise la couleur après un court moment
//     setTimeout(function() {
//       event.target.style.color = "";
//     }, 500);
//   }, false);
  
</script>
<?php include('NavBar.php'); ?>
<!-- Vidéo Principale -->
        <section class='corps'>
        <iframe src="https://www.youtube.com/embed/AbyJignbSj0" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="enter" style="width: 100%; ">
        </iframe>
        </section>
<!-- Fin Vidéo Principale -->
<!-- Top Film -->
        <section class="container-fluid corps">   
            <h2 class="sousTitre"><a class="souTitre" href=''>Top-rated</a></h2>
            <div id="topRated" class="row">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/movie/top_rated?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US&page=","topRated");
            </script>
            </div>

<!--  Récents -->
            <h2 class="sousTitre"><a class="souTitre" href='recently.php'>Recently Added</a></h2>
            <div id="recently" class="row">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US&page=","recently");
            </script>
            </div>

            
            <h2 class="sousTitre"><a class="souTitre" href='action.php'>Action Movies</a></h2>
            <div id="action" class="row">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=28","action");
            </script>
            </div>
      
            <h2 class="sousTitre"><a class="souTitre" href='adventure.php'>Adventure Movies</a></h2>
            <div id="adventure" class="row">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=12&page=2","adventure");
            </script>
            </div>
      
            <h2 class="sousTitre"><a class="souTitre" href='comedy.php'>Comedy Movies</a></h2>
            <div id="comedy" class="row">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=35","comedy");
            </script>
            </div>

            <h2 class="sousTitre"><a class="souTitre" href='horror.php'>Horror Movies</a></h2>
            <div id="horror" class="row">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=27","horror");
            </script>
            </div>
     
            <h2 class="sousTitre"><a class="souTitre" href='romantic.php'>Romantic Movies</a></h2>
            <div id="romance" class="row bas">
            <script>
                afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=10749","romance");
            </script>
            </div>

        </section>
        <?php include('footer.php'); ?>

    
<script src="https://kit.fontawesome.com/75bed6266a.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
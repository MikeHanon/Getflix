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
    <link rel="stylesheet" href="./css/categorie.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="css/media/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="css/media/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="css/media/favicon/favicon-16x16.png">
    <link rel="manifest" href="css/media/favicon/site.webmanifest">
    <title>SeriesAddict</title>
</head>

<body class="genre">
<!--On inclut la NavBar-->
<script>
            function afficherFilm(nombre,url,id,page){
                var content=document.getElementById(id);
                page=1;
                id="";
                nombre=6;
                genre="";
                url1=url+"&page="+page;
                function movie(page){
                    fetch(url)
                    .then(reponse =>reponse.json())
                    .then (data => {
                    for(var i=0;i<nombre;i++){
                    var test  =data.results[i].poster_path;
                    var idFilm = data.results[i].id;
                    content.innerHTML+="<div class='col-md-2' id='movie'><a alt ='"+data.results[i].title+"' class='pochette' href='pageVideo.php?id="+idFilm+"'><img alt='Movie poster' src=http://image.tmdb.org/t/p/w185//".concat(test,"></img> </a><p id='title'>"+data.results[i].title+"</p></div>" );
                    }

                    })
                    }
            movie();
            }

</script>
<?php include('NavBar.php'); ?>
<h2 class="titre">Horror Movies</h2>
<p class="genreDesc">A horror story is told to deliberately scare or frighten the audience, through suspense, violence or shock.</p>
<h4 id="genreTitle">Check our Horror movies catalogue</h4>
<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a id='btnLeft' class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a id ='btnRight' class="btn-floating" href="#multi-item-example" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
    <li data-target="#multi-item-example" data-slide-to="3"></li>
    <li data-target="#multi-item-example" data-slide-to="4"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
    <div class="row" id="firstRow">
        <script> afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=27",'firstRow'); </script>

    </div>
    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
    <div class="row" id="secondRow">
        <script> afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=27&page=2",'secondRow'); </script>

    </div>
    </div>

    <!--/.Second slide-->

    <!--Third slide-->
    <div class="carousel-item">
    <div class="row" id="thirdRow">
        <script> afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=27&page=3",'thirdRow'); </script>

    </div>
    </div>

    <div class="carousel-item">
    <div class="row" id="fourRow">
        <script> afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=27&page=4",'fourRow'); </script>

    </div>
    </div>

    <div class="carousel-item">
    <div class="row" id="fiveRow">
        <script> afficherFilm(6,"https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&with_genres=27&page=5",'fiveRow'); </script>

    </div>
    </div>

  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->

<!--On inclut le footer-->
<?php include('footer.php'); ?>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/75bed6266a.js"></script>

</html>

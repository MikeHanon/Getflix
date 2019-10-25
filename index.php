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
    <link rel="stylesheet" href="css/style2.css"> 
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
<?php include('NavBar.php'); ?>
<!-- Vidéo Principale -->
        <section class='corps'>
<script>

function movie(){
    fetch('https://https://api.themoviedb.org/3/discover/movie?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US')
    .then(reponse =>reponse.json())
    .then (data => {
    console.log(data.results['0'])
})

}
</script>
        </section>
<!-- Fin Vidéo Principale -->
<!-- Top Film -->
        <section class="container-fluid corps">   
            <h2 class=>Top-films</h2>
            <div class="row">
                <div class="col-md-2">
                    <iframe class='film' src="https://www.youtube.com/embed/inAFW2CluQ4" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen >
                    </iframe>
                </div>
                <div class="col-md-2">
                <iframe class='film' src="https://www.youtube.com/embed/wV-Q0o2OQjQ" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
                </div>
                <div class="col-md-2">
                <iframe class ='film'src="https://www.youtube.com/embed/cMRqlDBkdwo" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/Q1cdiNgoPq0" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/h6GdOpjD3Oc" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                    <iframe class="film" src="https://www.youtube.com/embed/xlWaVQ6T6BU" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
<!--  Récents -->
            <h2 class=>Recently added</h2>
            <div class="row">
                <div class="col-md-2">
                    <iframe class='film' src="https://www.youtube.com/embed/inAFW2CluQ4" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen >
                    </iframe>
                </div>
                <div class="col-md-2">
                <iframe class='film' src="https://www.youtube.com/embed/wV-Q0o2OQjQ" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
                </div>
                <div class="col-md-2">
                <iframe class ='film'src="https://www.youtube.com/embed/cMRqlDBkdwo" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/Q1cdiNgoPq0" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/h6GdOpjD3Oc" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                    <iframe class="film" src="https://www.youtube.com/embed/xlWaVQ6T6BU" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
<!-- Drama -->
            <h2 class=>Drama</h2>
            <div class="row">
                <div class="col-md-2">
                    <iframe class='film' src="https://www.youtube.com/embed/inAFW2CluQ4" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen >
                    </iframe>
                </div>
                <div class="col-md-2">
                <iframe class='film' src="https://www.youtube.com/embed/wV-Q0o2OQjQ" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
                </div>
                <div class="col-md-2">
                <iframe class ='film'src="https://www.youtube.com/embed/cMRqlDBkdwo" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/Q1cdiNgoPq0" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/h6GdOpjD3Oc" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                    <iframe class="film" src="https://www.youtube.com/embed/xlWaVQ6T6BU" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
<!--Action-->
            <h2 class=>Action</h2>
            <div class="row">
                <div class="col-md-2">
                    <iframe class='film' src="https://www.youtube.com/embed/inAFW2CluQ4" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen >
                    </iframe>
                </div>
                <div class="col-md-2">
                <iframe class='film' src="https://www.youtube.com/embed/wV-Q0o2OQjQ" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
                </div>
                <div class="col-md-2">
                <iframe class ='film'src="https://www.youtube.com/embed/cMRqlDBkdwo" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/Q1cdiNgoPq0" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                <iframe class="film" src="https://www.youtube.com/embed/h6GdOpjD3Oc" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-2">
                    <iframe class="film" src="https://www.youtube.com/embed/xlWaVQ6T6BU" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

        </section>
        <?php include('footer.php'); ?>
<script type="type/javascript" src="js.js"></script>
<script src="https://kit.fontawesome.com/75bed6266a.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
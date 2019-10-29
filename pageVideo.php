<?php 
session_start();
try{

  //On se connecte à MySQL
  $bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch (Exception $e) {

  //En cas d'erreur on affiche un message et on arrete tout
  die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT id FROM video WHERE id = :id');
$req->execute(array(
    'id' => $_GET['id']
    )); 
$resultat = $req->fetch();
//deja dans la table
if($resultat){
}
// id pas repertorié dans la table ? => ajout
  else{
  $add = $bdd->prepare('INSERT INTO video(id) VALUES(:id)') or die(print_r($bdd->errorInfo()));
  $add->execute(array(
    'id'=> $_GET['id']

  ));

}

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


<script>
//recuperation de du GET[id] en javascript
var get = window.location.search ;
var id="";
for(var i = 4;i<get.length;i++){
    id+=get[i];
}

//recuper le trailer
var url = "https://api.themoviedb.org/3/movie/"+id+"/videos?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US";
function getTrailer(){
                    fetch(url)
                    .then(reponse =>reponse.json())
                    .then (data => {
                    var key=data.results[0].key;
                    var trailer = document.getElementById('trailer');
                    trailer.innerHTML+="<iframe width='800' height='515' src='https://www.youtube.com/embed/"+key+"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>"

                    })

                    }

function getTitre(){
  var url = "https://api.themoviedb.org/3/movie/"+id+"?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US";
  fetch(url)
                    .then(reponse =>reponse.json())
                    .then (data => {
                    var title=document.getElementById('titleMovie');
                    title.innerHTML=data.title;
})
}
function getInfo(){
  var url = "https://api.themoviedb.org/3/movie/"+id+"?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US";
  fetch(url)
                    .then(reponse =>reponse.json())
                    .then (data => {
                    var info=document.getElementById('infoMovie');
                    info.innerHTML="<label>"+data.title+"</br> Budget : "+data.budget+"<br> Release date : "+data.release_date+" </label>";
})
}
function getSimilar(){
  var url = "https://api.themoviedb.org/3/movie/"+id+"/similar?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US";
  fetch(url)
                    .then(reponse =>reponse.json())
                    .then (data => {
                      console.log(data.results[0].title);
                    var sim=document.getElementById('similarMovie');
                    var idVid = data.results[0].id;
                    sim.innerHTML+="<label>"+data.results[0].title+"<br> <a href='pageVideo.php?id="+idVid+"'><img src=http://image.tmdb.org/t/p/w185//"+data.results[0].poster_path+"></img></label>";
})
}
getTrailer();
                    getTitre();
                    getInfo();
                    getSimilar();

</script>

<!--les 3 sections -->

<div class="container-fluid ">
<div class="row">

<div class="col">
<h2 onclick='info()' id='information2' class="disabled">Information</h2>
</div>
<div class="col">



<h2 onclick='com()' id='commentaire2' class="active">Commentaires</h2>
</div>


<div class="col ">
<h2 onclick="vid()" id='video2' class="disabled">Vidéo simmilaire</h2>
</div>
</div>

<!--Information -->

<div id="information" style='display:none' >
Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis porro, aperiam ullam vero alias ipsum officia asperiores incidunt. Hic est omnis ex illum aspernatur odit veniam assumenda voluptatem mollitia sapiente?
</div>

<!--Commentaires-->

<div id="commentaire" style='display:block'>
<?php //Ajout du php pour les commentaires
//on verifie que le com existe
$bdd = new PDO('mysql:host=localhost;dbname=Getflix', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$id5=$_GET['id'];
        if(isset($_POST['com']) AND !empty($_POST['com'])){
//si le com existe et qu'il n'est pas vide:
        $userid=$_SESSION['id_user'];
        $commentaire= htmlspecialchars($_POST['com']);
            $ins = $bdd->prepare('INSERT INTO comments(id_vid, id_user, comment, date_comment) 
            VALUES (?,?,?,NOW())');
            $ins->execute(array($id5 , $userid ,$commentaire));

            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
        } else {
            $c_msg = "Erreur: Le commentaire n'a pas pu être enregistrer";
        }
        
        ?>
<div class="row">
<div class="col-md-4">
        <h4>Ajouter un commentaire:</h4>
        <form method="POST">
            <textarea id="story" name='com'  rows="6" cols="80">
            </textarea> <br>
            <input class="valider" type="submit">
            </form>
        </div>
        <div class="col-md-4">
        <h4 class='listeCom'> Anciens commentaires:</h4>
        <?php
    $requete=$bdd->prepare('SELECT comment , date_comment, username FROM comments c INNER JOIN users u  
    ON c.id_user= u.id WHERE id_vid =? ORDER BY date_comment DESC'); 

      $requete=$bdd->prepare("SELECT * FROM comments WHERE id_vid =$id5 ORDER BY date_comment DESC "); 
      $requete->execute(array($id5));
      while($ligne = $requete->fetch()){
        echo "<article> <section> "./*à changer*/$_SESSION ['username']." - ".$ligne['date_comment'].
        "</section><section>". $ligne['comment']." <br> </section> </article> <br>";
    }


    ?>
            </div>
</div>


</div>

<!--Vidéo simmilaire-->

<div id="video" style="display:none">

</div>






</div>


<!--On inclut le footer-->
<?php include('footer.php'); ?>


</body>
<script src='pageVideo.js'>
</script>
<!--
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/75bed6266a.js"></script>-->

</html>
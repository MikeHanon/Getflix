<?php
session_start();
?>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$id=$_SESSION['id_user'];
$sql = "SELECT * FROM commande WHERE id = $id";

$statement=$bdd->query($sql);
$result=$statement->fetchAll();

?>
<?php include('NavBar.php'); ?>
<link rel="stylesheet" href="css/styleEshop.css">
<link rel="stylesheet" href="css/cssIndex.css">
<h1 class="m-0 px-5 pt-3">Eshop</h1>

<form action="eshopB2.php" method="post" class="d-flex flex-column p-5">
<table>
  <tr>
    <th>ID Movie</th>
    <th>Poster</th>
    <th>Movie Name</th>
    <th>Quantity</th>
    <th>Total Price</th>
  </tr>
  <script>let test2 = [];
  let test ='';</script>
<?php
$i=0;
foreach($result as $row){?>

<script>
<?="
test =".$row['id_vid'].
"
test2.push(test)
"; ?>
</script>
  <tr>
  <td><?=$row['id_vid']?></td>
  <td id="moviePoster<?=$i?>" style="width: 30%"></td>
  <td id="movieName<?=$i?>"></td>
  
  <td><select name="Qty" id="" onchange="updateCost(this.value)">
        <option value="1"<?=($row['qty'] === '1' ? 'selected' : '');?>>1</option>
        <option value="2"<?=($row['qty'] === '2' ? 'selected' : '');?>>2</option>
        <option value="3"<?=($row['qty'] === '3' ? 'selected' : '');?>>3</option>
        <option value="4"<?=($row['qty'] === '4' ? 'selected' : '');?>>4</option>
        <option value="5"<?=($row['qty'] === '5' ? 'selected' : '');?>>5</option>
        <option value="6"<?=($row['qty'] === '6' ? 'selected' : '');?>>6</option>
        <option value="7"<?=($row['qty'] === '7' ? 'selected' : '');?>>7</option>
        <option value="8"<?=($row['qty'] === '8' ? 'selected' : '');?>>8</option>
        <option value="9"<?=($row['qty'] === '9' ? 'selected' : '');?>>9</option>
        <option value="10"<?=($row['qty'] === '10' ? 'selected' : '');?>>10</option>
      </select></td>

  <td id="prix"><?=$row['prix'];?></td>
  <td><a href="deleteItem.php?id=<?=($row['id_vid']);?>"><i class="far fa-trash-alt"></i></a></td>
  </tr>
<?php $i++ ;
} ?>


<script>
function updateCost(qty)
{
   var prixFilm = <?=$row['prix'];?>;
   document.getElementById("prix").innerHTML = qty * prixFilm;
}
</script>


</table>
  
<label for="">Lastname</label>
    <input type="text" class="w-50" name="nom">
    <label for="">Name</label >
    <input type="text" class="w-50" name="prenom">
    <label for="">Mail</label >
    <input type="text" class="w-50" name="email">
    <label for="">Adress</label >
    <input type="text" class="w-50" name="adresse">
    <label for="">Choose your country</label>
    <select name="select" class="w-50">
      <option value="Belgium">Belgium</option>
      <option value="EU">EU</option>
      <option value="Non-European">Non-European</option>
    </select>
    <label for="">Code promo</label>
    <input type="text" class="w-50" name="codePromo">
    <button type="submit" class="mt-4 w-25" >Valider la commande</button>
  </form>
  <script>

  
  console.log(test2, 3)
  function id (test){
  
    for(let i=0; i<test.length; i++){
    let id = test[i];
    console.log(id,4);
    fetch(`https://api.themoviedb.org/3/movie/${id}?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US`)
    .then(response => response.json())
    .then(data=>{
      console.log(document.getElementById(`movieName${i}`))
      document.getElementById(`movieName${i}`).innerHTML += `<td>${data['original_title']}</td>`
      document.getElementById(`moviePoster${i}`).innerHTML += `<td><img  src="https://image.tmdb.org/t/p/w200/${data['poster_path']}" style="width:20%" ></img></td>`
    
    
    })}
  };
  id(test2);
  </script>
  <h3></h3>
<?php include('footer.php'); ?>


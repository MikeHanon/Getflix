<?php
session_start();
?>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$id=$_SESSION['id_user'];
$sql = "SELECT * FROM commande WHERE id = $id";

$statement=$bdd->query($sql);
$result=$statement->fetchAll()

?>
<?php include('NavBar.php'); ?>
<h1 class="m-0 px-5 pt-3">Eshop</h1>

<form action="" class="d-flex flex-column p-5">
<table>
  <tr>
    <th>ID Movie</th>
    <th>Poster</th>
    <th>Movie Name</th>
    <th>Quantity</th>
    <th>Total Price</th>
  </tr>
<?php
foreach($result as $row){?>
  
  <tr>
  <td><?=$row['id_vid']?></td>
  <td id="moviePoster" style="width: 30%"></td>
  <td id="movieName"></td>
  <td><select name="Qty" id="">
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
  <td><?=$row['prix'];?></td>
  </tr>
<?php } ?>

</table>
  
    <label for="">Nom</label>
    <input type="text" class="w-50">
    <label for="">Prenom</label>
    <input type="text" class="w-50">
    <label for="">Adresse</label>
    <input type="text" class="w-50">
    <label for="">Code promo</label>
    <input type="text" class="w-50">
    <button type="submit" class="mt-4 w-25">Valider la commande</button>
  </form>
  <script>
   
  function id (){
    let id = "<?=$row['id_vid'] ?>"
    fetch(`https://api.themoviedb.org/3/movie/${id}?api_key=b53ba6ff46235039543d199b7fdebd90&language=en-US`)
    .then(response => response.json())
    .then(data=>{
      console.log(data['original_title'])
      
      document.getElementById(`movieName${i}`).innerHTML = `<td>${data['original_title']}</td>`
      document.getElementById(`moviePoster${i}`).innerHTML = `<td><img  src="https://image.tmdb.org/t/p/w200/${data['poster_path']}" style="width:20%" ></img></td>`
      
    
    })
  };
  id();
  </script>
<?php include('footer.php'); ?>


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

<table>
  <tr>
    <th>id film</th>
    <th>quantité</th>
    <th>prix</th>
  </tr>
<?php
foreach($result as $row){
  
  echo '<tr><td>'.$row['id_vid'].'</td>'. 
  '<td>'.$row['qty'].'</td>'. 
  '<td>'.$row['prix'].'</td>';
}
?>
</table>
  <h1 class="m-0 px-5 pt-3">Eshop</h1>

  <form action="" class="d-flex flex-column p-5">
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
<?php include('footer.php'); ?>


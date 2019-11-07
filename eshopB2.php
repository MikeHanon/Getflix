<?php
session_start();
?>
<?php include('NavBar.php'); ?>

<h1 class="m-0 px-5 pt-3">Eshop</h1>

<?php $bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 

$id=$_SESSION['id_user'];
$sql = "SELECT * FROM commande WHERE id = $id";

$statement=$bdd->query($sql);
$result=$statement->fetchAll();

?>

<h2 class="px-5">Commande Validé</h2>

<h3 class="px-5">Vos données :</h3>

<?php

 echo "<section class='px-5'>" . "<b> Commmande au nom de : </b> " . $_POST['nom'] . " " . $_POST['prenom'] . "<br>" . "<b> Adresse de livraison: </b> " . $_POST['adresse'] . "</section>" . "</br>";
 
 if ($_POST['codePromo']=="MikeEstTropCool" ){
  echo "<span class='px-5'> <b> REDUCTION 10% ACTIVÉ </b> </span>";
} else {
  echo "<span class='px-5'> <b> PAS DE REDUCTION </b> </span>" . "<br>";
} 
?>
 
<h3 class="px-5">Récapitulatif de votre commande</h3>

<table>
<tr>
<th class="pl-5">Id Film</th>
<th>Quantité</th>
<th>Prix</th>
</tr>
<?php
foreach($result as $row){?>

<tr>
<td class="pl-5"><?=$row['id_vid'];?></td>
<td><?=$row['qty'];?></td>
<td><?=$row['prix'];?></td>

<?php ;}?>
</tr>
</table>


<?php include('footer.php'); ?>


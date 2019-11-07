<?php
session_start();
?>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$id = $_SESSION['id_user'];

$sql="DELETE FROM commande WHERE id = $id";
$statement = $bdd->query($sql);

?>

<?php include('NavBar.php'); ?>

<p class="p-5">Your order has been sent successfully.</p>

<?php include('footer.php'); ?>
<?php
$title = "supprimer";
// $_GET['...'];
ob_start();
?>
<p>voulez vous vraiment supprimer cette column</p>
<a href="index.php?action=destroy&id=<?php echo  $id ?>" class="btn btn-danger">valider la suppression</a>
<a href="index.php?action=list" class="btn btn-warning" >annuler la suppression</a>
<?php
$content =ob_get_clean();
 include 'views/layout.php';
?>
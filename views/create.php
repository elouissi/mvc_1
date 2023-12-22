<?php
    $title = " ajouter   equipes";
 
  
ob_start();
 ?>
<form action="index.php?action=store" method="POST">
    <div class="form-group">
        <label>nom</label>
        <input type="text" class="form-control" name="nom" required> 
    </div>
    <label>description</label>
    <div class="form-group">
        <input type="text" class="form-control" name="description" required> 
    </div>
   
    

    <div class="form-group">
        <input type="submit" class="btn btn-success my-2"  value="Ajouter" name="ajouter"> 

    </div>
</form>
    <?php $content = ob_get_clean(); ?>
    <?php     include 'layout.php';?>
 
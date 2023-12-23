<?php
    $title = " ajouter   equipes";
 
  
ob_start();
 ?>
<form action="index.php?action=store" method="POST">
    <div class="form-group">
        <label>nom</label>
        <input type="text" class="form-control" name="nom" required> 
    </div>
    <label>Federation</label>
    <div class="form-group">
        <input type="text" class="form-control" name="Federation" required> 
    </div>
    <label>Stade_national</label>
    <div class="form-group">
        <input type="text" class="form-control" name="Stade_national" required> 
    </div>
    <label>description</label>
    <div class="form-group">
        <input type="text" class="form-control" name="description" required> 
    </div>
   
    

    <div class="form-group">
        <input type="submit" class="btn btn-warning my-2"  value="Ajouter" name="ajouter"> 

    </div>
</form>
    <?php $content = ob_get_clean(); ?>
    <?php     include 'layout.php';?>
 
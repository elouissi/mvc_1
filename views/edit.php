<?php
    $title = " modifier   equipe";
  
  
ob_start();
 ?>
<form action="index.php?action=update" method="POST">
    <div class="form-group">
        <label>id</label>
        <input type="hidden" class="form-control" name="id" value="<?php echo $equipe->id ?>"> 
    </div>
    <div class="form-group">
        <label>nom</label>
        <input type="text" class="form-control" name="nom" value="<?php echo $equipe->nom ?>"> 
    </div>
    <label>description</label>
    <div class="form-group">
        <input type="text" class="form-control" name="description" value="<?php echo $equipe->description ?>"> 
    </div>
 

    <div class="form-group">
        <input type="submit" class="btn btn-success my-2"  value="Modifier" name="modifier"> 

    </div>
</form>
    <?php
  
     $content = ob_get_clean(); ?>
    <?php     include 'layout.php';?>
 
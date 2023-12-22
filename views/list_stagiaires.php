<?php
    $title = "list des equipes";
 
  
ob_start();
 ?>
 <a href="index.php?action=create" class="btn btn-primary">ajouter</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>description</th>
                <th>actions</th>
            
       
            </tr>
        </thead>
        <tbody>
        <?php foreach($equipes as $equipe):
    
            ?>
            <tr>
                <td><?= $equipe->id ?></td>
                <td><?= $equipe->nom ?></td>
                <td><?= $equipe->description ?></td>
             
                <td>
                    <a href="index.php?action=edit&id=<?php echo  $equipe->id ?> " class="btn btn-primary btn-sm" >modifier</a>
                    <a href="index.php?action=delete&id=<?php echo  $equipe->id ?> " class="btn btn-danger btn-sm" >supprimer</a>

            </td>
            </tr>
            <?php endforeach?>
        </tbody>

    </table> 
    <?php $content = ob_get_clean(); ?>
    <?php     include 'layout.php';?>
 
<?php
require 'model/stagiaire.php';

 class Controller extends CrudEquipe{

      function index(){
        $equipes = $this->latest();
        require 'views/list_stagiaires.php';
     }
     function createAction(){
        require 'views/create.php'; 

     }
     function storeAction(){ 
         $data = array(
            'nom' => $_POST['nom'],
            'Federation' => $_POST['Federation'],
            'Stade_national' => $_POST['Stade_national'],
            'description' => $_POST['description'] ,);
            $create=$this->create( $table="equipes", $data);
         header('location:index.php?action=list');
     }
      function editAction(){ 
            $id = $_GET['id'];
            
            $equipe =$this->view($id);
            require 'views/edit.php';
      }
     function updateAction(){
    
        extract($_POST);
        $data = array(
         'nom' => $_POST['nom'],
         'Federation' => $_POST['Federation'],
         'Stade_national' => $_POST['Stade_national'],
         'description' => $_POST['description'] ,);
        $edit = $this->edit($table='equipes',$data,$id);
        header('location:index.php?action=list');
        // $id = $_GET['id'];
        // destroy($id);
        // header('location:index.php');

     }
     function deleteAction(){
        $id = $_GET['id'];
        require 'views/delete.php';

     }
     function destroyAction(){
        $id = $_GET['id'];
        $destroy =$this->destroy($table="equipes",$id);
        header('location:index.php?action=list');

     }
   }

 

<?php
require 'model/stagiaire.php';

 
      function index()
    {
        $equipes = latest();
        require 'views/list_stagiaires.php';
     }
     function createAction(){
        require 'views/create.php'; 

     }
     function storeAction(){
        create();
        header('location:index.php?action=list');
     }
     function editAction(){
        
            $id = $_GET['id'];
            $equipe = view($id);
            require 'views/edit.php';
       
    }
     function updateAction(){
    
        extract($_POST);
         edit($nom, $description,$id);
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
        destroy($id);
        header('location:index.php?action=list');

     }

 

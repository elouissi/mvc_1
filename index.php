<?php 
require 'controller/stagiaire_controller.php';
 if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch($action){
        case 'create':
            $create = new Controller();
            $create->createAction();
            break;
        case 'list':
            $index = new Controller();
            $index->index();
            break;
        case 'destroy':
            $destroy =new controller();
            $destroy->destroyAction(); 
            break;
        case 'edit':
            $edit = new controller();
            $edit->editAction();
            break;
        case 'store':
            $store = new Controller();
            $store->storeAction(); 
            break;
        case 'update':
            $update = new controller();
            $update->updateAction();
            break;
        case 'delete':
            $delete = new controller();
            $delete-> deleteAction();
           
            break;
    }
 }
  
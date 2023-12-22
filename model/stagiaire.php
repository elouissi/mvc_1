<?php


    function data_base(){
        return  $pdo = new PDO('mysql:dbname=caf;host=localhost', 'root', '');

    }
    function latest(){
        $pdo = data_base();
        return  $pdo->query('SELECT * FROM equipes')->fetchAll(PDO::FETCH_OBJ);
          


    }
    function create(){

         extract($_POST); 
        $pdo = data_base(); 
        $sqlState = $pdo->prepare("INSERT INTO equipes VALUES (null,?,?)"); 
        return $sqlState->execute([$nom, $description ]);
    }
    
     function store(){
        var_dump($_POST);
     }
     function edit($nom,$description,$id){
        $pdo = data_base(); 
        $sqlState = $pdo->prepare("UPDATE   equipes SET nom= ?,description = ?   WHERE id=? "); 
        return $sqlState->execute([$nom, $description, $id]);


     }
     function destroy($id){
        $pdo = data_base();
        $sqlState = $pdo->prepare("DELETE FROM equipes WHERE id=? ");  
        return $sqlState->execute([$id]);
 
     }
     function view($id){
        $pdo = data_base();
        $sqlState = $pdo->prepare(" SELECT * FROM equipes WHERE id=? ");  
          $sqlState->execute([$id]);
          return $sqlState->fetch(PDO::FETCH_OBJ);

     }

<?php
include'Connexion.php';

 class CrudEquipe extends Connexion {
  protected PDO $pdo;
  public function __construct() {
    parent::__construct(); // Appel du constructeur de Connexion pour initialiser la connexion PDO
}




 

   //  function getConnection(){
   //      return  $pdo = new PDO('mysql:dbname=caf;host=localhost', 'root', '');

   //  }
 
    function create($table, $data){

         extract($_POST); 
         $pdo = $this->getConnection();
        //  $sqlState = $pdo->prepare("INSERT INTO equipes VALUES (null,?,?,?,?)"); 
        // return $sqlState->execute([$nom,$Federation,$Stade_national, $description ]); 
         $columns = implode(',', array_keys($data));
         $values = implode(',', array_fill(0, count($data), '?'));

      $sql = "INSERT INTO $table ($columns) VALUES ($values)";

      try {
          $stmt = $pdo->prepare($sql);

          if (!$stmt) {
              die("Error in prepared statement: " . $this->pdo->errorInfo()[2]);
          }
          $types = str_repeat('s', count($data));
          $params = array_values($data);

          // Bind parameters
          foreach ($params as $key => &$value) {
              $stmt->bindParam($key + 1, $value, PDO::PARAM_STR); // Assuming all values are strings
          }

          $result = $stmt->execute();

          $stmt->closeCursor(); // Close the cursor to allow for the next query

          return $result;
      } 
      catch (PDOException $e) {
          die("Error: " . $e->getMessage());
      }
 
  }
   
    
     function store(){
        var_dump($_POST);
    } 
     function edit($nom, $Federation, $Stade_national, $description, $id){
      $pdo = $this->getConnection();
      $sqlState = $pdo->prepare("UPDATE equipes SET nom=?, Federation=?, Stade_national=?, description=? WHERE id=?"); 
      return $sqlState->execute([$nom, $Federation, $Stade_national, $description, $id]);
    } 
     function destroy($id){
      $pdo = $this->getConnection();
      $sqlState = $pdo->prepare("DELETE FROM equipes WHERE id=? ");  
        return $sqlState->execute([$id]);
 
    }
     function view($id){
      $pdo = $this->getConnection();
      $sqlState = $pdo->prepare(" SELECT * FROM equipes WHERE id=? ");  
          $sqlState->execute([$id]);
          return $sqlState->fetch(PDO::FETCH_OBJ);

    } 
     function latest(){
      
        $pdo = $this->getConnection();
        return  $pdo->query('SELECT * FROM equipes')->fetchAll(PDO::FETCH_OBJ);    
    }

  }
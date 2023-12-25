<?php
include'Connexion.php';

 class CrudEquipe extends Connexion {
  protected PDO $pdo;
  public function __construct() {
    parent::__construct(); // Appel du constructeur de Connexion pour initialiser la connexion PDO
}

 
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
     function edit($table,$data, $id){
      $pdo = $this->getConnection();
      // $sqlState = $pdo->prepare("UPDATE equipes SET nom=?, Federation=?, Stade_national=?, description=? WHERE id=?"); 
      // return $sqlState->execute([$nom, $Federation, $Stade_national, $description, $id]);

 
        // Use prepared statements to prevent SQL injection
        $placeholders = [];
        foreach ($data as $key => $value) {
            $placeholders[] = "$key = :$key";
        }

        $sql = "UPDATE $table SET " . implode(', ', $placeholders) . " WHERE id = :id";
        $data['id'] = $id;

        $stmt = $pdo->prepare($sql);

        // Bind parameters to the prepared statement
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Execute the prepared statement
        $result = $stmt->execute();

        return $result;
    
    } 
     function destroy($table,$id){
    
          $pdo = $this->getConnection(); 
          // Use a prepared statement to prevent SQL injection
          $sql = "DELETE FROM $table WHERE id = :id";
          $stmt = $pdo->prepare($sql);

          // Bind parameters to the prepared statement
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);

          // Execute the prepared statement
          $result = $stmt->execute();
          if($result){
              echo "\n<br>delete complete \n";
          }else{
             echo " no succusful delete ";
          } 
          // Close the statement
          $stmt->closeCursor();

          return $result;

  
 
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
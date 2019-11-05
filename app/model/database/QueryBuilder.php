<?php
namespace App\Model\Database;

use PDO;

class QueryBuilder {

  private $pdo;

  public function __construct(PDO $pdo){
    $this->pdo= $pdo;
  }
  function getAll($table) {
   
    $sql = "SELECT * FROM {$table}";
    $statement= $this->pdo->prepare($sql);
    $statement->execute();
    
   return $statement->fetchAll(PDO::FETCH_ASSOC); 
  }

  public function create($table, $data)
  {
    $keys = implode(',', array_keys($data));
    $tags = ":" . implode(', :', array_keys($data));

    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";

    $statement = $this->pdo->prepare($sql);
    $statement->execute($data);
    
  }
}
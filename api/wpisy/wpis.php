<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "rachunki";
 
    // object properties
    public $id;
    public $tytul;
    public $data;
    public $kwota;
    public $kategoria;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
function read(){
 
  // select all query
  $query = "SELECT p.id, p.tytul, p.data, p.kwota, p.kategoria
            FROM
              " . $this->table_name . " p";

  // prepare query statement
  $stmt = $this->conn->prepare($query);

  // execute query
  $stmt->execute();

  return $stmt;
}
}
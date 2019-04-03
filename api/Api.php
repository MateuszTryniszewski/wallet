<?php
class API {

  // // specify your own database credentials
  // private $host = "localhost";
  // private $db_name = "wallet";
  // private $username = "root";
  // private $password = "";
  // public $connect;

  // function __construct(){ 
  //   $this->getConnection();
  // }

  // // get the database connection
  // public function getConnection(){

  //     $this->connect = null;
  //     try{
  //         $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
  //         $this->connect->exec("set names utf8");
  //     }catch(PDOException $exception){
  //         echo "Connection error: " . $exception->getMessage();
  //     }

  //     return $this->connect;
  // }
    private $connect = '';
    function __construct() {
      $this->database_connection();
    }
    function database_connection() {
      $this->connect = new PDO("mysql:host=localhost;dbname=wallet", "root","");
      $this->connect->query('SET NAMES utf8');
      $this->connect->query('SET CHARACTER_SET utf8_unicode_ci');
    }

  function fetch_all() {
    $query = "SELECT * FROM rachunki ORDER BY id";
    $statement = $this->connect->prepare($query);
    if($statement->execute()) {
      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
      return $data;
    }
  }

  function insert () {
    if(isset($_POST['tytul'])) {
      $form_data = array (
        ':tytul'   => $_POST['tytul'],
        ':kategoria'   => $_POST['kategoria'],
        ':kwota'   => $_POST['kwota']
      );
    
      $query = " INSERT INTO rachunki (tytul, kategoria, kwota) VALUES ( :tytul, :kategoria, :kwota)";
      $statement = $this->connect->prepare($query);
      if($statement->execute($form_data)) {
        $data[] = array(
          'succes' => '1'
        );
      } else {
        $data[] = array(
          'succes' => '0'
        );
      }
    } else {
      $data[] = array(
        'succes' => '0'
      );
    }
    return $data;
  }
  

}

?>
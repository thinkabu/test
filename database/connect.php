<?php
class User
{ 
private  $con ;


  public function __construct( )
  {
   
  }

  public   function db_connect()
  {
      $dsn = "mysql:host=localhost;dbname=testok";
      $user  = "root";
      $pass  = "";
    try {
          $this->con  = new PDO($dsn, $user , $pass );  
          
      
  } catch (PDOException $e) {
      $error_message = $e->getMessage();
     echo "lỗi : ". $error_message;
}}
  
  // Create
  public   function createUser($username, $email, $password)
  {
    global $con ;
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$username, $email, $password]);
    return $stmt->rowCount();
  }
  //read all
  public   function getUserAll()
  {

    $sql = "SELECT * FROM users";
    $stmt = $this->con->prepare($sql);
    $stmt->execute();
    return $stmt ->fetchAll(PDO::FETCH_ASSOC);
  }
  // Read
  public   function getUser($id)
  {

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Update
  public   function updateUser($id, $username, $email, $password)
  {
    global $con ;

    $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$username, $email, $password,$id]);
    return $stmt->rowCount();
  }

  // Delete
  public  function deleteUser($id)
  {

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt =  $this->con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->rowCount();
  }
}

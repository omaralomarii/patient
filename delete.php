<?php 
   require_once './conn.php';
   
   $id = $_GET["id"];

   $sql = "DELETE from resturant WHERE id=:id ";

   $query = $db->prepare($sql);

   $query->bindParam(':id',$id, PDO::PARAM_STR);

   $result = $query->execute();

   header("location: index.php");

?>
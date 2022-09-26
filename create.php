<?php
   require_once './conn.php';

   if(isset($_POST['submit'])){
     $image = $_POST["image"];
     $name = $_POST["name"];
     $ingredients = $_POST["ingredients"];
     $price = $_POST["price"];

    //  echo $name;


    $sql = "INSERT INTO resturant (name,image,ingredients,price) VALUES (:name, :image, :ingredients, :price )";

    $query = $db->prepare($sql);

    $query->bindParam(':name',$name, PDO::PARAM_STR);
    $query->bindParam(':image',$image, PDO::PARAM_STR);
    $query->bindParam(':ingredients',$ingredients, PDO::PARAM_STR);
    $query->bindParam(':price',$price, PDO::PARAM_STR);

    $result = $query->execute();

    header("location: index.php");

   }



   ?>
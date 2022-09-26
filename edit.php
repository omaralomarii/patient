<?php 
   require_once './conn.php';
   
   $id = $_GET["id"];

//    echo $id;

$sql ="SELECT * FROM resturant WHERE id =$id";

$getData = $db->query($sql);

$food = $getData->fetchAll(PDO::FETCH_OBJ);

print_r($food);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

<form action="#" method="post">
                <div class="mb-3">
                    <label class="form-label"> Image URL</label>
                    <input type="text" class="form-control" name="image" value="<?php echo $food[0]->image?>">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $food[0]->name?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ingredients</label>
                    <input type="text" class="form-control" name="ingredients" value="<?php echo $food[0]->ingredients?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $food[0]->price?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </form>



</body>

</html>

<?php 

if(isset($_POST["submit"])){
    $image = $_POST["image"];
    $name = $_POST["name"];
    $ingredients = $_POST["ingredients"];
    $price = $_POST["price"];


    $sql = "UPDATE resturant SET name=:name, image=:image, ingredients=:ingredients, price=:price WHERE id=$id";


    $query = $db->prepare($sql);

    $query->bindParam(':name',$name, PDO::PARAM_STR);
    $query->bindParam(':image',$image, PDO::PARAM_STR);
    $query->bindParam(':ingredients',$ingredients, PDO::PARAM_STR);
    $query->bindParam(':price',$price, PDO::PARAM_STR);


    $result = $query->execute();

    header("location: index.php");
}



?>
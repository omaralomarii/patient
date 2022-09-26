<?php 

   require_once './conn.php';

   $sql = 'SELECT * FROM resturant';

   $getData = $db->query($sql);

   $food = $getData->fetchAll(PDO::FETCH_OBJ);

//    print_r( $food);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
        <form action="./create.php" method="post">
                <div class="mb-3">
                    <label class="form-label"> Image URL</label>
                    <input type="text" class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ingredients</label>
                    <input type="text" class="form-control" name="ingredients">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="row">
        <div class="row">
            <table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach($food as $type) { ?>
                    <tr>         <!-- src= "https://www.business2community.com/wp-content/uploads/20" -->
                        <td><img src="<?php echo $type->image ?>" width="50px" height="50px"/></td>
                        <td><?php echo $type->name ?></td>
                        <td><?php echo $type->ingredients ?></td>
                        <td><?php echo $type->price ?></td>
                        <td><a href="edit.php?id=<?php echo $type->id ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $type->id ?>" >Delete</a></td>
                    </tr>

                <?php } ?>
        

            </table>

        </div>


        </div>
    </div>


</body>

</html>
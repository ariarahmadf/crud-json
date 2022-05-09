<?php
    // Memanggil data json
    $file = "data.json";
    $user = file_get_contents($file);
    $dataUser = json_decode($user, true);
    foreach($dataUser as $user){
        if($user["name"] == $_GET["name"]){
            $name = $user["name"];
            $email = $user["email"];
            $address = $user["address"];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP CRUD JSON</title>
    </head>
    <body>
        <h2>Input New User</h2>
        <form action="" method="post">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name?>">
            <br><br>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email?>">
            <br><br>
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $address?>">
            <br><br>
            <input type="submit" name="Update" value="Update">
        </form>
    </body>
</html>

<?php 
    if(isset($_POST['Update'])) {
        foreach($dataUser as $index => $d){
            if($user["name"] == $_GET["name"]){
                $dataUser[$index]["name"] = $_POST['name'];
                $dataUser[$index]["email"] = $_POST['email'];
                $dataUser[$index]["address"] = $_POST['address'];
            }
            $count++;
        }
        
        $jsonFile = json_encode($dataUser, JSON_PRETTY_PRINT);
        $user = file_put_contents($file, $jsonFile);
        header('location: user.php');
    }
?>
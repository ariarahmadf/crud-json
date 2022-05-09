<?php
    // Memanggil data json
    $file = "data.json";
    $user = file_get_contents($file);
    $dataUser = json_decode($user, true);
    $countDataUser = count($dataUser);
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
            <input type="text" name="name" placeholder="Enter name">
            <br><br>
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email">
            <br><br>
            <label>Address</label>
            <input type="text" name="address">
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <br>
        <hr>
    
        <h2>User List</h2>
        <table style="width:60%" border="1">
            <tr>
                <th>S#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            
            $i = 1; 
            foreach($dataUser as $user) {
                $name = $user['name'];
            ?>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['address']; ?></td>
                    <td>
                        <a href="edit.php?name=<?php echo $name; ?>">Edit</a>
                        <a href="delete.php?name=<?php echo $name; ?>">Delete</a>
                    </td>
                </tr> 
            <?php }?>
        </table>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])) {
        $dataUser[] = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "address" => $_POST['address']
        );
        
        $jsonFile = json_encode($dataUser, JSON_PRETTY_PRINT);
        $user = file_put_contents($file, $jsonFile);
        header('location: user.php');
    }
?>
<?php
// if($_SERVER['REQUEST_METHOD'] == "POST"){
// echo "CORRECT";
// }; // Outputs GET or POST

include("connect.php");
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $task = $_POST['task'];
    $insert = "INSERT INTO `todolist`( `task`) VALUES ('$task')";
    $insertQuery = mysqli_query($connect, $insert);
}

// fetch from the database
$select = "SELECT * FROM `todolist`";
$query = mysqli_query($connect, $select);

// delete code
if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $delete = "DELETE FROM `todolist` WHERE id = '$del'";
    $deleteQuery = mysqli_query($connect, $delete);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <h2>To Do List</h2>
        <div class="enter">
            <input type="text" name="task" id="enterTask" placeholder="Add your task">
            <input type="submit" name="submit" value="Add" id="submit">
        </div>
        <?php
        while ($fetch = mysqli_fetch_assoc($query)) { ?>
            <div class="show">
                <h4> <?php echo $fetch['task']; ?></h4>
                <div class="btn">
                    <button type="submit" id="edit"><a href="./edit.php?edit=<?php echo $fetch['id']; ?>">Edit</a></button>
                    <button type="submit" id="delete"><a href="?delete=<?php echo $fetch['id']; ?>">Delete</a></button>
                </div>
            </div>
        <?php } ?>

    </form>

</body>

</html>
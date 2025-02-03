<?php
include("./connect.php");


// edit code
if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    // fetch task
    $select = "SELECT * FROM `todolist`";
    $selectQuery = mysqli_query($connect, $select);
    $fetch = mysqli_fetch_assoc($selectQuery);

    // edit
    if (isset($_POST['update'])) {
        $task = $_POST['task'];
        $update = "UPDATE `todolist` SET `task`='$task' WHERE id = $edit";
        $query = mysqli_query($connect, $update);
        header('location: index.php');
    }
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
        <h2>Edit List</h2>
        <div class="enter">
            <input type="text" name="task" id="enterTask" value="<?php echo $fetch['task'] ?>">
            <input type="submit" name="update" value="Update" id="submit">
        </div>


    </form>

</body>

</html>
<?php
// require_once "../database/connect.php";
require_once "../database/addTaskDB.php";
?>
<?php
$sql = "SELECT * FROM task";
$data = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>insert data</title>
</head>

<body>
    <div class="container">
        <form action="" class="" method="POST">
            <div class="mt-3">
                <label for="" class="form-label">Name:</label>
                <input type="text" class="form-control" name="hoten" placeholder="Example: Hoàng Đạt">
            </div>
            <div class="mt-3">
                <label for="" class="form-label">nhiệm vụ:</label>
                <input type="text" class="form-control" name="task" placeholder="Example: football">
            </div>
            <div class="mt-3">
                <input type="submit" class="btn btn-success p-6" value="xác nhận" name="action">
            </div>
        </form>
        <div class="danhsach mt-5">
            <table class="table table-striped" border="1">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Tên </td>
                        <td>Nhiệm vụ</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $task) { ?>

                        <tr>
                            <td><?php echo $task['userId'] ?></td>
                            <td><?php echo $task['name'] ?></td>
                            <td><?php echo $task['nameTask'] ?></td>
                            <td><a href="../database/updateTaskDB.php?userId=<?php echo $task['userId']?>">Edit</a></td>
                            <td><a href="#">Delete</a></td>j
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
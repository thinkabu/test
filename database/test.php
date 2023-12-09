<?php
include_once('connect.php');
$user = new User();
$user->db_connect();
$action = filter_input(INPUT_POST, 'action');
if (isset($action)) {
    $username = filter_input(INPUT_POST, 'user');
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');
    if (!empty($username) && !empty($email) && !empty($pass)) {
        $user->createUser($username, $email, $pass);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list tài khoản</title>

</head>
<style>
    div {
        padding: 0;
    }
</style>

<body>
    <form action="" method="POST">
        <label for="">name:</label>
        <input type="text" name="user"><br><br>
        <label for="">email:</label>
        <input type="text" name="email"><br><br>
        <label for="">pass:</label>
        <input type="text" name="pass"><br><br>
        <input type="hidden" name="action" value="send">
        <input type="submit" name="action" value="send">
    </form>
    <div class="container">
        <div>
            <div class="row " style="display: flex; justify-content:center;">
                <?php
                $data = $user->getUserAll();
                ?>
                <?php foreach ($data as $key) { ?>
                    <div class="card col-sm-6  col-md-4 col-lg-3 col-xl-2" style="padding:0; margin: 10px 5px; width: 230px; border: 1px solid #000;">
                        <div class="card-header"><b>id:</b><?php echo $key['id'] ?></div>
                        <div class="card-body"><b>email:</b>:<?php echo $key['email'] ?></div>
                        <div class="card-footer"><b>pass:</b>:<?php echo $key['password'] ?></div>
                        <div style="display: flex; justify-content: space-around; margin-bottom: 12px;">
                            <a href="update.php?id=<?php echo $key['id'] ?>" class="btn btn-primary">update</a>
                            <a onclick="confirm('xác nhận xóa')" href="delete.php?id=<?php echo $key['id'] ?>" class="btn btn-danger">delete</a>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</body>

</html>
<?php
include_once('connect.php');
$user = new User();
$user->db_connect();
$action = filter_input(INPUT_POST, 'action');
$id = filter_input(INPUT_GET, 'id');

if (isset($action) && isset($id)) {
    $username = filter_input(INPUT_POST, 'user');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (!empty($username) && !empty($email) && !empty($password)) {     
        $user->updateUser($id, $username, $email, $password);
        header("location:test.php");
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

<body>
    <form action="" method="POST">
        <?php $data = $user->getUser($id); ?>
        <label for="">name:</label>
        <input type="text" name="user" value="<?php echo $data['username'] ?>"><br><br>
        <label for="">email:</label>
        <input type="text" name="email" value="<?php echo $data['email'] ?>"><br><br>
        <label for="">pass:</label>
        <input type="text" name="password" value="<?php echo $data['password'] ?>"><br><br>
        <!-- <input type="hidden" name="action" value="send" > -->
        <input type="submit" name="action" value="send" onclick="confirm('xác nhận thay đổi')" >
    </form>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>id</td>
                    <td>tên</td>
                    <td>email</td>
                    <td>pass</td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['password'] ?></td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
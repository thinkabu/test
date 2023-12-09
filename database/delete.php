<?php
include_once('connect.php');
$user = new User();
$user->db_connect();
$id = filter_input(INPUT_GET, 'id');
if(isset($id)){
    $user-> deleteUser($id);
    header("location:test.php");
}

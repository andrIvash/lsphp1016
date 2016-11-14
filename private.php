<?php
require_once 'login.php';
$connection = @new mysqli($db_hostname, $db_username, $db_password, $db_database);
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}


//$user_id = $_COOKIE["user_id"];
$user_id = 1;

$sql = "SELECT * FROM `users` WHERE (id = '$user_id')";
$result = $connection->query($sql);
if ($result->num_rows == 0) {
    echo 'Пользователь не найден';
} else {
    $records = $result->fetch_all(MYSQLI_ASSOC);
    $dir    = '/tmp/'.$user_id;
    $files = @scandir($dir, 1);
    if ($files) {
        echo json_encode(array('user_info' => $records, 'user_files' => $files));
    } else {
        echo json_encode(array('user_info' => $records, 'user_files' => "файлов нет"));
    }
}



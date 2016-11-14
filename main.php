<?php
require_once 'login.php';
$connection = @new mysqli($db_hostname, $db_username, $db_password, $db_database);
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

//$login = trim($_GET['login']);
//$password = trim($_GET['password']);
//$login = strip_tags($login);
//$password = strip_tags($password);
$login = 'test';
$password = 'test1';

$sql = "SELECT `password` FROM `users` WHERE (login = '$login')";
$result = $connection->query($sql);
if ($result->num_rows == 0) {
    echo 'Пользователь не найден';
} else {
    $records = $result->fetch_all(MYSQLI_ASSOC);
    if ($records[0]['password'] !== $password) {
        echo 'Пароль не верен';
    } else {
        echo 'ok';
        # Ставим куки
        //setcookie("id", $data['user_id'], time()+60*60*24*30);
        //setcookie("hash", $hash, time()+60*60*24*30);

    }
}

mysqli_close($connection);

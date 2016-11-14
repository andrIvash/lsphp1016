<?php

$host = 'localhost';
$base = 'lsphp1016';
$user = 'root';
$pass = '';

$connection = @new mysqli($host, $user, $pass, $base);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$connection->query('SET NAMES "UTF-8"');


 $sql = "
 CREATE TABLE `users` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `login` varchar(150) NOT NULL,
   `password` varchar(150) NOT NULL,
   `description` varchar(255) NOT NULL,
   `foto` varchar(255) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
$connection->query($sql);
$connection->close();

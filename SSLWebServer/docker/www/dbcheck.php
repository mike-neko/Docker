<?php

$dsn = 'mysql:host=' . $_ENV['MYSQL_PORT_3306_TCP_ADDR'];
$user = 'docker';
$password = 'docker';

$dbh = new PDO($dsn, $user, $password);

$sql = "SELECT version();";

foreach ($dbh->query($sql, PDO::FETCH_ASSOC) as $row) {
    var_dump($row);
}

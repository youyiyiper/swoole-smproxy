<?php
/**
 * Created by PhpStorm.
 * User: louislivi
 * Date: 2018-12-09
 * Time: 10:10
 */
$servername = "127.0.0.1";
$username = "root";
$password = "xiongpeng";
$dbname = "test";
$port   = 3366;
try {
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    // Check connection
    if ($conn->connect_error) {
        fwrite(STDERR, "Connect failed!" . $conn->connect_error . PHP_EOL);
    }
    fwrite(STDOUT, 'Connect succeeded!' . PHP_EOL);

    $sql = "SELECT `account`,`time` FROM `sm_user` limit 1";
    $result = $conn->query($sql);
    fwrite(STDOUT, 'Executed query:' . $sql . PHP_EOL);
    if ($result->num_rows > 0) {
        fwrite(STDOUT,  'Result: ' . json_encode($result->fetch_assoc()) . PHP_EOL);
    } else {
        fwrite(STDERR, "Result empty!" . PHP_EOL);
    }

    // $sql = "insert into sm_user(`account`,`time`) values('".rand(0,999)."','".time()."')";
    // $result = $conn->query($sql);
    // fwrite(STDOUT, 'Executed query:' . $sql . PHP_EOL);
    // fwrite(STDOUT,  'Result: ' . json_encode($result) . PHP_EOL);

    $conn->close();
} catch (\Exception $exception) {
    fwrite(STDERR, $exception ->getMessage());
}
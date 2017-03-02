<?php
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*');
$username = $_REQUEST['username'];
$comments = $_REQUEST['comments'];
$imgurl = $_REQUEST['imgurl'];
$now = $_REQUEST['now'];

$servername = "172.17.21.123";
$username = "root";
$password = "";
$dbname = "cgalaxy";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
$sql = "INSERT INTO commentlist (name, imgurl, comments,addtime) VALUES('$username', '$imgurl', '$comments','$now')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
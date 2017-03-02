<?php
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*');
header("Content-Type: text/html; charset=utf-8");

$name = $_REQUEST['username'];
$comments = $_REQUEST['comments'];
$imgurl = $_REQUEST['imgurl'];
$now = $_REQUEST['now'];

$servername = "bdm256830299.my3w.com";
$username = "bdm256830299";
$password = "catgalaxy";
$dbname = "bdm256830299_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
mysqli_query($conn,'SET NAMES UTF8');
$sql = "INSERT INTO catgalaxy_commentlist (name, imgurl, comments,addtime) VALUES('$name', '$imgurl', '$comments','$now')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
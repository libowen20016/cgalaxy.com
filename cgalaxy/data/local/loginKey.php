<?php
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*');
header("Content-Type: text/html; charset=gbk");

$servername = "bdm256830299.my3w.com";
$username = "bdm256830299";
$password = "catgalaxy";
$dbname = "bdm256830299_db";

$loginkey = $_REQUEST['loginkey'];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

//mysqli_query($conn,'SET NAMES UTF8');
$sql = "SELECT key_ FROM cgalaxy_key WHERE key_ = '$loginkey'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo $row["key_"];
        break;
    }
} else {
    echo "0";
}
$conn->close();
?>

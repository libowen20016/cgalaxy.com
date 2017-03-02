<?php
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*');

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

$sql = "SELECT * FROM commentList";
$result = $conn->query($sql);
$arrList=array();
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        //echo "<br> id: ". $row["id"]. " - Name: ". $row["username"].$now;
        $arr = array ('username'=>$row["name"],'imgurl'=>$row["imgurl"],'comments'=>$row["comments"],'addtime'=>$row["addtime"]);
        array_push($arrList,$arr);
    }
} else {
    echo "0 个结果";
}
echo json_encode($arrList);
$conn->close();
?>

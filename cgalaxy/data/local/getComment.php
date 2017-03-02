<?php
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*');
header("Content-Type: text/html; charset=utf-8");

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
$sql = "SELECT * FROM catgalaxy_commentlist";
$result = $conn->query($sql);
$arrList=array();
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        //echo "<br> id: ". $row["id"]. " - Name: ". $row["comments"];
        //$arr = array ('username'=>$row["name"],'imgurl'=>$row["imgurl"],'comments'=>$row["comments"],'addtime'=>$row["addtime"]);
        //$arr = array('username'=>$row["name"],'imgurl'=>$row["imgurl"],'comments'=>$row["comments"],'addtime'=>$row["addtime"]);
        //$arr = implode('-',$arr);
        $str = '{id:"'.$row["id"].'",username:"'.$row["name"].'",comments:"'.$row["comments"].'",imgurl:"'.$row["imgurl"].'",addtime:"'.$row["addtime"].'"}';
        array_push($arrList,$str);
    }
    
} else {
    echo "0 个结果";
}
$string = implode(',',$arrList);
echo '['.$string.']';
$conn->close();
?>

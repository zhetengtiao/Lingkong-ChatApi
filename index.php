<?php
/**
 * Lingkong-ChatApi
 * Powerd By Zhetengtiao-LKT
 * 2020.5.22
 */
//--------------------------------------------------------配置
$passwd = "Ab1234"; //passwd，管理员密码，用于创建apikey，使用前最好改一下
$servername = "localhost"; //servername，数据库连接地址
$username = "root"; //username，用户名
$password = "123456"; //password，密码
$dbname = "ChatApi"; //dbname,如果是系统自动创建那么就不用改
//--------------------------------------------------------配置
$version = "1.1.3";
$o = $_GET["o"];
$r = $_GET["r"];
$apikey = $_GET["apikey"];
$passwd1 = $_GET["passwd"];
$text = $_GET["text"];
function qrand($len) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $string = time();
    for (; $len >= 1; $len--) {
        $position = rand() % strlen($chars);
        $position2 = rand() % strlen($string);
        $string = substr_replace($string, substr($chars, $position, 1) , $position2, 0);
    }
    return $string;
}
//我自己都不知道我写的啥子？？？
switch ($o) {
    case "v":
        echo "Lingkong_ChatApi-Powerd By LingkongTeam. Version " . $version;
    case "r":
        if ($passwd1 === $passwd) {
            $conn = new mysqli($servername, $username, $password);
            // 创建数据库
            $sql = "CREATE DATABASE ChatApi";
            $conn->query($sql);
            $conn->close();
            echo "Done!";
        } else {
            echo "Admin Password Error!";
            return 0;
        }
        return 0;
    case "n":
        $conn = new mysqli($servername, $username, $password, $dbname);
        $time = date("Y-m-d");
        $sql = "insert into $apikey (text) values('$text')";
        $conn->query($sql);
        $conn->close();
        return 0;
    case "l":
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM $apikey;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row1 = array();
            while ($row = $result->fetch_assoc()) {
                array_push($row1, $row);
            }
            echo json_encode($row1);
        } else {
            echo "0 ";
        }
        $conn->close();
        return 0;
    case "a":
        if ($passwd1 === $passwd) {
            $apkey = qrand(rand(1, 10));
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "CREATE TABLE " . $apkey . " (
TEXT VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
            $conn->query($sql);
            $conn->close();
            echo $apkey;
            return 0;
        } else {
            echo "Admin Password Error!";
            return 0;
        }
    default:
        echo "Waring : No parameters passed in.";
        return 0;
}
?>       

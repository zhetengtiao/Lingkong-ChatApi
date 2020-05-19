<?php
/**
 * Lingkong-ChatApi
 * Powerd By Zhetengtiao-LKT
 *
 *  What you laughed at me yesterday, I turned it into motivation today.
 *  And I will never forget the "power" you gave me.
 *  Don't forget that there are more powerful people besides you, and don't be arrogant.
 *  Otherwise that's how you get in the way of yourself.
 *  I hope you can remember that,Don't be like them.
 *  :)
 *
 */
//--------------------------------------------------------配置
$passwd = "Ab1234";//passwd，管理员密码，用于创建apikey，使用前最好改一下
$servername = "localhost";//servername，数据库连接地址
$username = "root";//username，用户名
$password = "123456";//password，密码
$dbname = "ChatApi";//dbname,如果是系统自动创建那么就不用改
//--------------------------------------------------------配置
$version = "1.1.2";
$o = $_GET["o"];
$r = $_GET["r"];
$apikey = $_GET["apikey"];
$passwd1 = $_GET["passwd"];
$text = $_GET["text"];
function qrand($len)
{
    $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $string=time();
    for(;$len>=1;$len--)
    {
        $position=rand()%strlen($chars);
        $position2=rand()%strlen($string);
        $string=substr_replace($string,substr($chars,$position,1),$position2,0);
    }
    return $string;
}
//我自己都不知道我写的啥子？？？
switch ($o) {
    case "v":
        echo "Lingkong_ChatApi-Powerd By LingkongTeam. Version " . $version;
    case "r":
        if ($r === "no_CD") {
            if ($passwd1 === $passwd) {
                $conn = new mysqli($servername, $username, $password, $dbname);
                // 检测连接
                if ($conn->connect_error) {
                    die("连接失败: " . $conn->connect_error);
                }
                $sql = "CREATE TABLE ApiKey (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
                if ($conn->query($sql) === TRUE) {
                    echo "数据库创建成功";
                } else {
                    echo "Error creating database: " . $conn->error;
                }
                $conn->close();
            } else {
                echo "Admin Password Error!";
                return 0;
            }
        } else {
            if ($passwd1 === $passwd) {
                $conn = new mysqli($servername, $username, $password);
                // 创建数据库
                $sql = "CREATE DATABASE ChatApi";
                if ($conn->query($sql) === TRUE) {
                    echo "数据库创建成功";
                } else {
                    echo "Error creating database: " . $conn->error;
                }
                $conn->close();
                $conn = new mysqli($servername, $username, $password, $dbname);
                // 检测连接
                if ($conn->connect_error) {
                    die("连接失败: " . $conn->connect_error);
                }
                $sql = "CREATE TABLE ApiKey (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
                if ($conn->query($sql) === TRUE) {
                    echo "数据表创建成功";
                } else {
                    echo "Error creating database: " . $conn->error;
                }
                $conn->close();
            } else {
                echo "Admin Password Error!";
                return 0;
            }
            return 0;
        }
    case "a":
        if ($passwd1 === $passwd) {
            $apkey = qrand(rand(1, 10));
            $conn = new mysqli($servername, $username, $password, $dbname);
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            $sql = "CREATE TABLE " . $apkey . " (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
            if ($conn->query($sql) === FALSE)
            {
                echo "Error creating database: " . $conn->error;
            }
            $conn->close();
            echo $apkey;
            return 0;
        } else {
            echo "Admin Password Error!";
            return 0;
        }
    default :
        echo "Waring : No parameters passed in.";
        echo "Lingkong_ChatApi-Powerd By LingkongTeam. Version " . $version;
}
?>
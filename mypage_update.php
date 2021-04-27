<?php
mb_internal_encoding("utf8");
session_start();
try{
//DB接続
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。</p>");
}
//prepared statement
$stmt = $pdo->prepare("update login_mypage set name = ?,mail = ?,password = ?,picture = ?,comments = ? where id = ?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);
$stmt->bindValue(6,$_SESSION['id']);


$stmt->execute();

/*
echo $_POST['name'];
echo $_POST['mail'];
echo $_POST['password'];
echo $_POST['picture'];
echo $_POST['comments'];
echo $_SESSION['id'];
*/

//クエリ（ここではinsert）を実行
$stmt = $pdo->prepare("select * from login_mypage where id = ?");
//
$stmt->bindValue(1,$_SESSION["id"]);

//クエリ（ここではinsert）を実行
$stmt->execute();
//DB切断
$pdo = NULL;

while ($row = $stmt->fetch()){
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
   // $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
}


header("Location:mypage.php",true,307);

?>

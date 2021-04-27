<?php
mb_internal_encoding("utf8");
try{
//DB接続
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。</p>");
}
//prepared statement
$stmt = $pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);
//echo $_POST['name'];
//echo $_POST['mail'];
//echo $_POST['password'];
//echo $_POST['picture'];
//echo $_POST['comments'];
//クエリ（ここではinsert）を実行
$stmt->execute();
//DB切断
$pdo = NULL;

header("Location:after_register.html");
?>

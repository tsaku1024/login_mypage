<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){
    try{
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    }catch(PDOEception $e){
        die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスできません。<br>しばらくしてから再度ログインをしてください。</p>
           <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
           );
    }

    //prepared statement
    $stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");
    //
    $stmt->bindValue(1,$_POST["mail"]);
    $stmt->bindValue(2,$_POST["password"]);

    //クエリ（ここではinsert）を実行
    $stmt->execute();
    //DB切断
    $pdo = NULL;

    while ($row = $stmt->fetch()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['comments'] = $row['comments'];
    }
    
    if(!empty($_POST['login_keep'])){
    $_SESSION['login_keep']=$_POST['login_keep'];
    }
    
    if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){
        setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
        setcookie('password',$_SESSION['password'],time()+60*60*24*7);
        setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
    } else if(empty($_SESSION['login_keep'])){
        setcookie('mail',time()-1);
        setcookie('password',time()-1);
        setcookie('login_keep',time()-1);
    }
}

if(empty($_SESSION['mail']) && empty($_SESSION['password'])){
    header("Location:http:login_error.php");
}


?>

<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>マイページ登録</title>
        <div class="login"><a href="log_out.php">ログアウト</a></div>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>
    
   <body>
        <header>
           <img src="4eachblog_logo.jpg">
       </header>
       
       <main>
           <div class="confirm_box">
               <h2>会員情報</h2>
               <p>こんにちは！ <?php echo $_SESSION['name']; ?>さん</p>
               <img src="<?php echo "./image/".$_SESSION['picture']; ?>" alt="<?php echo $_SESSION['picture'];?>" >
               <p>氏名:<?php echo $_SESSION['name']; ?></p>
               <p>メール:<?php echo $_SESSION['mail']; ?></p>
               <p>パスワード:<?php echo $_SESSION['password']; ?></p>
               <div class="co"><?php echo $_SESSION['comments']; ?></div>
               <form action="mypage_hensyu.php" method="post" class="form_center">
                   <input type="hidden" value="<?php echo rand(1,10);?>" name="form_mypage">
                    <div class="toroku">
                        <input type="submit" class="submit_button" size="35" value="編集する">
                   </div>
               </form>
               
           </div>
       </main>
       
       <footer>
           @2018 InterNous.inc All rights reserved
       </footer>
   </body>
</html>



<?php
mb_internal_encoding("utf8");
session_start();

$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$password = $_SESSION['password'];
$picture = $_SESSION['picture'];
$comments = $_SESSION['comments'];

if(!isset($_POST['form_mypage'])){
    header("Location:login_error.php");
}

?>


<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>マイページ編集</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>
    
    <body>
       <header>
           <img src="4eachblog_logo.jpg">
       </header>
       
       <main>
          <form action="mypage_update.php" method="post" enctype="multipart/form-data">
            <div class="confirm_box">
               <h2>会員情報</h2>
               <p>こんにちは！ <?php echo $_SESSION['name']; ?>さん</p>
               <img src="<?php echo "./image/".$_SESSION['picture']; ?>" alt="<?php echo $_SESSION['picture'];?>" >
              
               <div class="name">
                       <label>氏名</label>
                       <input type="text" class="formbox" size="40" name="name"  value = "<?php echo $name?>" required>
                   </div>
                 <br>
               <div class="mail">
                       <label>メール</label>
                       <input type="text" class="formbox" size="40" name="mail" value = "<?php echo $mail?>"  pattern ="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                   </div>
                   <br>
               <div class="password">
                       <label>パスワード</label>
                       <input type="text" class="formbox" size="40" name="password" value = "<?php echo $password?>"  pattern ="^[a-zA-z0-9]{6,}$" required>
                   </div>
                   <br>
                   <input type="hidden" name="picture" value="<?php echo $picture?>">
               <div class="co">
                   <div class="comments">
                       <label>コメント</label><br>
                        <textarea rows="5" cols="60" name="comments"><?php echo $comments?></textarea>
                   </div>
                </div>
                  <div class="toroku">
                        <input type="submit" onclick="location.href='./mypage_hensyuu.php'"  class="submit_button" value="この内容に変更する">
                   </div>
               </div>
           </form>
        </main>
    </body>
</html>
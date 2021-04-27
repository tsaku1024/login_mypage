<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    
    <body>
       <header>
           <img src="4eachblog_logo.jpg">
           <div class="login"><a href="login.php">ログイン</a></div>
       </header>
       
       <main>
           <form action="mypage.php" method="post" enctype="multipart/form-data">
               <div class="form_comments">
                   
                    <div class="mail">
                       <label>メールアドレス</label><br>
                       <input type="text" class="formbox" size="40" name="mail" pattern ="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value = "<?php 
                                                                                                                                                if(isset($_COOKIE['mail'])){
                                                                                                                                                    echo $_COOKIE['mail'];
                                                                                                                                                }
                                                                                                                                             ?>" required>
                   </div>
                    <div class="password">
                       <label>パスワード</label><br>
                       <input type="password" class="formbox" size="40" name="password" id="password" pattern ="^[a-zA-z0-9]{6,}$" value = "<?php 
                                                                                                                                                if(isset($_COOKIE['password'])){
                                                                                                                                                    echo $_COOKIE['password'];
                                                                                                                                                }
                                                                                                                                             ?>"  required>
                   </div>
                   
                   <div class="check">
                       <input type="checkbox" name="login_keep" value="login_keep"
                           <?php
                            if(isset($_COOKIE['login_keep'])){
                                echo "checked='checked'";
                            }
                           ?>>
                           ログイン状態を保持する
                     
                   </div>
                    <div class="toroku">
                        <input type="submit" class="submit_button" size="35" value="ログイン">
                   </div>
                   
               </div>
           </form>
       </main>
       
       <footer>
           @2018 InterNous.inc All rights reserved
       </footer>
       
       <script>
        function ConfirmPassword(confirm){
            var input1 = password.value;
            var input2 = confirm.value;
            if(input1 != input2){
                confirm.setCustomValidity("パスワードが一致しません。");
            }else{
                confirm.setCustomValidity("");
            }
        }
        </script>
    </body>
</html>
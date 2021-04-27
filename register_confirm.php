<?php
    //仮保存のファイル名で画像ファイルを取得
    $temp_pic_name = $_FILES['picture']['tmp_name'];
    //元のファイル名で画像ファイルを取得 /imageに画像をアップ
    $original_pic_name = $_FILES['picture']['name'];
    $path_filename = './image/'.$original_pic_name;
    move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $comments = $_POST['comments'];
?>

<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>会員登録確認</title>
        <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>
    
   <body>
        <header>
           <img src="4eachblog_logo.jpg">
       </header>
       
       <main>
           <div class="confirm_box">
               <h2>会員登録確認</h2>
               <h3>こちらの内容で登録しても宜しいでしょうか？</h3>
               <p>
                    氏名:<?php echo $_POST['name'];?>
                </p>
                <p>
                    メール:<?php echo $_POST['mail'];?>
                </p>
                <p>
                    パスワード:<?php echo $_POST['password'];?>
                </p>
                <p>
                    プロフィール写真:<?php echo $original_pic_name;?>
                </p>
                <p>
                    コメント:<?php echo $_POST['comments'];?>
                </p>
                <div class="button">
                    <form action="register.php">
                        <input type="submit" class="button1" value="戻って修正する" />
                    </form>
                    <form action="register_insert.php" method="post">
                       <input type="hidden" name="max_file_size" value="1000000" />
                       <input type="hidden" name="name" value=<?php echo $_POST['name'];?> />
                       <input type="hidden" name="mail" value=<?php echo $_POST['mail'];?> />
                       <input type="hidden" name="picture" value=<?php echo $_FILES['picture']['name'];?> />
                       <input type="hidden" name="password" value=<?php echo $_POST['password'];?> />
                       <input type="hidden" name="comments" value=<?php echo $_POST['comments'];?> />
                        <input type="submit" class="button2" value="登録する" />
                    </form>
                </div>
           </div>
       </main>
       
       <footer>
           @2018 InterNous.inc All rights reserved
       </footer>
   </body>
</html>
<?php
if(isset($_SESSION['join']) && isset($_REQUEST['action']) && ($_REQUEST['action'] == 'rewrite') ){
    $_POST =$_SESSION['join'];
}
session_start();
require('dbconnect.php');
if (!empty($_POST) ){
        $_SESSION['join'] = $_POST;
        header('Location: test3.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>会員登録画面</title>
</head>
<body>
<h1>会員登録画面</h1>
<form action="" method="post" enctype="multipart/form-data" class="registrationform">

    <p>ニックネーム<input type="text" name="name" style="width:150px" value="<?php echo htmlspecialchars($_POST['name']??"", ENT_QUOTES); ?>"></p>
    <p>email<input type="text" name="email" style="width:150px" value="<?php echo htmlspecialchars($_POST['email']??"", ENT_QUOTES); ?>"></p>
    <p>パスワード<input type="password" name="password" style="width:150px" value="<?php echo htmlspecialchars($_POST['password']??"", ENT_QUOTES); ?>"></p>
    <p>パスワード再入力<span class="red">*</span><input type="password" name="password2" style="width:150px"></p>
<input type="submit" value="確認する" class="button">
<input type="button" onclick="location.href='test.php?action=rewrite'" value="修正する" name="rewrite" class="button02">
</form>
</body>
</html>
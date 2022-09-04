<?php
if(isset($_SESSION['join']) && isset($_REQUEST['action']) && ($_REQUEST['action'] == 'rewrite') ){
    $_POST =$_SESSION['join'];
}
session_start();
require('dbconnect.php');

if (!empty($_POST) ){

    if ($_POST['name'] == "" ) {
        $error['name'] = 'blank';
    }
    if ($_POST['email'] == "" ) {
        $error['email'] = 'blank';
    }
    if ($_POST['password'] == "" ) {
        $error['password'] = 'blank';
    }
    if ($_POST['password2'] == "" ) {
        $error['password2'] = 'blank';
    }

    if (strlen($_POST['password'] )< 6 ) {
        $error['password'] = 'length';
    }

    if (($_POST['password'] != $_POST['password2']) && ($_POST['password2'] != "")){
        $error['password2'] = 'difference';
    }
    if(empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location: test3.php');
        exit();
    }
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
    <p>ニックネーム<input type="text" name="name" style="width:400px" value="<?php echo htmlspecialchars($_POST['name']??"", ENT_QUOTES); ?>">
    <?php if (isset($error['name']) && ($error['name'] == "blank")): ?>
        <p class="error">名前を入力してください"</p>
    <?php endif; ?>
    </p>
    <p>email<input type="text" name="email" style="width:150px" value="<?php echo htmlspecialchars($_POST['email']??"", ENT_QUOTES); ?>">
    <?php if (isset($error['email']) && ($error['email'] == "blank")): ?>
        <p class="error">emailを入力してください</p>
    <?php endif; ?>
    </p>

    <p>パスワード<input type="password" name="password" style="width:150px" value="<?php echo htmlspecialchars($_POST['password']??"", ENT_QUOTES); ?>">
    <?php if (isset($error['password']) && ($error['password'] == "blank")): ?>
        <p class="password"> パスワードを入力してください</p>
    <?php endif; ?>
    <?php if (isset($error['password']) && ($error['password'] == "length")): ?>
        <p class="error"> 6文字以上で指定してください</p>
    <?php endif; ?>
    </p>
    <p>パスワード再入力<span class="red">*</span><input type="password" name="password2"  style="width:150px">
    <?php if (isset($error['password2']) && ($error['password2'] == "blank")): ?>
        <p class="error"> パスワードを入力してください</p>
    <?php endif; ?>
    <?php if (isset($error['password2']) && ($error['password2'] == "difference")): ?>
        <p class="error"> パスワードが上記と違います</p>
    <?php endif; ?>
    </p>
<input type="submit" value="確認する" class="button">
<input type="button" onclick="location.href='test.php?action=rewrite'" value="修正する" name="rewrite" class="button02">
</form>
</body>
</html>
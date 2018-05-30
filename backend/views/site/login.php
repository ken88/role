<?php $error = $model->getFirstErrors(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>crm</title>
    <link href="/dist/login/style_log.css" rel="stylesheet" type="text/css">
</head>
<body class="login" mycollectionplug="bind">
    <div class="login_m">
        <div class="login_logo">
            <img src="/dist/login/logo2.png" width="240" height="60">
        </div>
        <form action="/site/login" method="post">
            <div class="login_boder">
                <div class="login_padding" id="login_model">
                    <h2>用户名</h2>
                    <label>
                        <input type="text" id="username" name="username" class="txt_input txt_input2">
                    </label>
                    <h2>密码</h2>
                    <label>
                        <input type="password" name="password" id="password" class="txt_input"  >
                    </label>
                    <div style="color: red; height: 20px;">
                        <?php  if (!empty($error)) echo $error['error']; ?>
                    </div>

                    <div class="rem_sub">
                        <label>
                            <input type="submit" class="sub_button" name="button" id="button" value="登录" style="opacity: 0.7;">
                        </label>
                    </div>
                </div>
            </div><!--login_boder end-->
        </form>
    </div><!--login_m end-->
</body>
</html>
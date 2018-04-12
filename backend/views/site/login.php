<?php $error = $model->getFirstErrors();?>
<form action="/site/login" method="post">
    用户名： <input type="text" name="username">
    密码：<input type="password" name="password">
    <span><? if (!empty($error)) {echo $error['error'];} ?></span>
    <input type="submit" value="登陆">
</form>
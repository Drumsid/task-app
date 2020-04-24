<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION['admin']) {
    $_SESSION['login'] = 'Только для зарегестрированых пользователей!';
    header("Location: /");
    exit;
}
?>
<h3>Регистрация</h3>
<form action="/account/create" method="POST">
    <p>Логин</p>
    <p><input type="text" name="login"></p>
    <p>Пароль</p>
    <p><input type="password" name="password"></p>
    <b><button type="submit" name="reg" value='1'>Регистрация</button></b>
</form>

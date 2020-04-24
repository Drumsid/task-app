<h3>Вход</h3>
<?php

if (isset($_SESSION['error'])) :?>
    <p class="alert alert-danger"><?= $_SESSION['error'] ?></p>   
    <?php unset($_SESSION['error']);
endif; ?>
<form action="/account/check" method="POSt">
    <p>Логин</p>
    <p><input type="text" name="login" required></p>
    <p>Пароль</p>
    <p><input type="text" name="password" required></p>
    <b><button type="submit" name="enter" value="2">Вход</button></b>
</form>

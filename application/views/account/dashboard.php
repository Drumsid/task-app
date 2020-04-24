<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION['admin']) {
    $_SESSION['login'] = 'Только для зарегестрированых пользователей!';
    header("Location: /");
    exit;
}
if (isset($_SESSION['error'])) :?>
    <p class="alert alert-success"><?= $_SESSION['error'] ?></p> 
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<h3>Админка</h3>

<form method="POST" action="/account/logout">
    <button id = "deleted" type="submit">Выйти</button>
</form>

<a class="nav-link" href="/account/register">Регистрация</a>
      
<script>
let button = document.querySelector("#deleted");
button.addEventListener("click", function() {
    let del = confirm('Вы уверены?');
    if (del === false) {
    event.preventDefault();
    }
});
</script>

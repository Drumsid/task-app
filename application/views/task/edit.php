<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION['admin']) {
    $_SESSION['login'] = 'Только для авторизированых пользователей!';
    header("Location: /");
    exit;
}
?>
<h4>Редактировать задачу</h4>
<?php
if (isset($_SESSION['task'])) :?>
    <div class="alert alert-danger"><?= $_SESSION['task'] ?></div>   
    <?php unset($_SESSION['task']);
endif; ?>
<a class="btn btn-info btn-sm mt-3 mb-3" href="/">назад</a>
<form action="/task/update" method="POST">
<input type="hidden" name="id" value="<?= $task[0]['id'] ?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Имя</label>
        <input 
        name="username" 
        type="text" 
        class="form-control" 
        id="exampleInputEmail1"
        value="<?= $task[0]['username'] ?>"
        require>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Email</label>
        <input 
        name="email" 
        type="email" 
        class="form-control" 
        id="exampleInputEmail2" 
        aria-describedby="emailHelp" 
        value="<?= $task[0]['email'] ?>"
        require>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" <?= $task[0]['status'] == 1 ? 'checked' : ''?>>
        <label class="form-check-label" for="exampleCheck1">Выполнено</label>
  </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Описание задачи</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $task[0]['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="update" value='3'>Отправить</button>
</form>


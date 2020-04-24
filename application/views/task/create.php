<h4>Создать задачу</h4>
<?php

if (isset($_SESSION['task'])) :?>
    <div class="alert alert-danger"><?= $_SESSION['task'] ?></div>   
    <?php unset($_SESSION['task']);
endif; ?>
<form action="/task/store" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Имя</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail1" require>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" require>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Описание задачи</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="create" value='1'>Отправить</button>
</form>

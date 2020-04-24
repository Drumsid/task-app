<p>Главная страница</p>
<?php

if (isset($_SESSION['login'])) :?>
    <div class="alert alert-danger"><?= $_SESSION['login'] ?></div>   
    <?php unset($_SESSION['login']);
endif;

if (isset($_SESSION['task'])) :?>
    <div class="alert alert-success"><?= $_SESSION['task'] ?></div>   
    <?php unset($_SESSION['task']);
endif; ?>

<h4>Задачи</h4>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">
        <div class="wrapp-sort">
          Автор
          <div class="block-arrow">
            <a href="/?page=1&sort=username ASC"><ion-icon name="caret-up-outline"></ion-icon></a>
            <a href="/?page=1&sort=username DESC"><ion-icon name="caret-down-outline"></ion-icon></a>
          </div>
        </div>
      </th>
      <th scope="col">
      <div class="wrapp-sort">
        Email
        <div class="block-arrow">
          <a href="/?page=1&sort=email ASC"><ion-icon name="caret-up-outline"></ion-icon></a>
          <a href="/?page=1&sort=email DESC"><ion-icon name="caret-down-outline"></ion-icon></a>
        </div> 
      </div>
      </th>
      <th scope="col" class="crutch">Описание</th>
      <th scope="col">
      <div class="wrapp-sort">
        Статус
        <div class="block-arrow">
          <a href="/?page=1&sort=status DESC, id DESC"><ion-icon name="caret-up-outline"></ion-icon></a>
          <a href="/?page=1&sort=status ASC, id ASC"><ion-icon name="caret-down-outline"></ion-icon></a>
        </div> 
      </div>
      </th>
      <th scope="col" class="crutch">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (count($tasks) > 0) : ?>
        <?php foreach ($tasks as $key => $task) : ?>
        <tr>
            <td><?= $task['username'] ?></td>
            <td><?= $task['email'] ?></td>
            <td><?= (mb_strlen($task['description']) > 20) ? mb_substr($task['description'], 0, 20) . "..." : $task['description'] ?></td>
            <td>
            <span class="badge <?= $task['status'] == 1 ? 'badge-success' : 'badge-danger' ?>"><?= $task['status'] == 1 ? 'выполнено' : 'не выполнено' ?></span><br>
              <span class="badge badge-success <?= (isAdminUpdated($logsTable, $task['id']) ? '' : 'd-none') ?>">Отредактировано администратором</span>
            </td>
            <td>
                <a title = "Посмотреть подробнее" href="/task/show?id=<?= $task['id'] ?>" class="btn btn-primary waves-effect">
                    <ion-icon class="icons" name="eye-outline"></ion-icon>
                </a>
                <?php if (isset($_SESSION['admin'])) : ?>
                <a title = "Редактировать" href="/task/edit?id=<?= $task['id'] ?>" class="btn btn-primary waves-effect">
                    <ion-icon class="icons" name="create-outline"></ion-icon>
                </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <th>Задач нет! Мб напишите одну .... или парочку? </th>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php

if (isset($_GET['sort'])) :
    $sortPage = $_GET['sort'];
else :
        $sortPage = '';
        $_GET['page'] = 1;
endif; ?>
<a href="/?page=<?= $page < 2 ? 1 : $page - 1 ?>&sort=<?= $sortPage ?>">previous</a> 
    <?php for ($i = 1; $i <= $pagesCount; $i++) : ?>
  <a class="<?= $_GET['page'] == $i ? '' : 'pages'?> " href="/?page=<?= $i ?>&sort=<?= $sortPage ?>"><?= $i ?></a>
    <?php endfor; ?>
<a href="/?page=<?= $page + 1 ?>&sort=<?= $sortPage ?>">next</a>


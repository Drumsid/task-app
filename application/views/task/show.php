<h4>Задача №<?= $task[0]['id'] ?></h4>
<a class="btn btn-info btn-sm mt-3 mb-3" href="/">назад</a>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Задача от: <span class="font-italic"><?= $task[0]['username'] ?></span></h5>
    <p class="card-text">Email: <span class="font-italic"><?= $task[0]['email'] ?></span></p>
    <p class="card-text">Описание: <span class="font-italic"><?= $task[0]['description'] ?></span></p>
    <p class="card-text">Статус: <span class="badge <?= $task[0]['status'] == 1 ? 'badge-success' : 'badge-danger' ?>"><?= $task[0]['status'] == 1 ? 'выполнено' : 'не выполнено' ?></span></p>
  </div>
</div>

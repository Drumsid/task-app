<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class TaskController extends Controller
{
    public function indexAction()
    {
        if (isset($_GET['page'])) {
            $vars['page'] = $_GET['page'];
        } else {
            $vars['page'] = 1;
        }
        
        $taskOnPage = 3;
        $start = ($vars['page'] - 1) * $taskOnPage;

        $countTasks = $this->model->getTasks();
        $vars['logsTable'] = $this->model->getLogs();
        $vars['tasksTable'] = $countTasks;
        $vars['pagesCount'] = ceil(count($countTasks) / $taskOnPage);


        if (empty($_GET['sort'])) {
            $vars['tasks'] = $this->model->chankTasks($start, $taskOnPage);
        } else {
            $taskSortValue = $_GET['sort'];
            $db = new Db();
            $vars['tasks'] = $db->row("SELECT id, username, email, description, status FROM tasks ORDER BY $taskSortValue LIMIT $start, $taskOnPage");
        }

        $this->view->render('Главная страница', $vars);
    }

    public function createAction()
    {
        $this->view->render('Create task');
    }

    public function storeAction()
    {
        if (array_key_exists('create', $_POST) && isNotEmpty($_POST)) {
            $username = clean($_POST['username']);
            $email = clean($_POST['email']);
            $description = clean($_POST['description']);
            
            $_SESSION['task'] = 'Задача успешно создана!';
            $db = new Db();
            $db->query(
                "INSERT INTO tasks (username, email, description) VALUES(:username, :email, :description)",
                ['username' => $username, 'email' => $email, 'description' => $description]
            );
            $this->view->redirect('/');
        }
        $_SESSION['task'] = 'Не все поля заполнены корректно!';
        $this->view->redirect($_SERVER['HTTP_REFERER']);
    }

    public function showAction()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new Db();
            $vars['task'] = $db->row("SELECT * FROM tasks WHERE id=$id");
        }
        $this->view->render('Show task', $vars);
    }

    public function editAction()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $db = new Db();
            $vars['task'] = $db->row("SELECT * FROM tasks WHERE id=$id");
        }
        $this->view->render('Edit task', $vars);
    }

    public function updateAction()
    {
        if (isset($_SESSION['admin'])) {
            if (array_key_exists('update', $_POST) && isNotEmpty($_POST)) {
                $id = $_POST['id'];
                $username = clean($_POST['username']);
                $email = clean($_POST['email']);
                $description = clean($_POST['description']);
                $status = isset($_POST['status']) ? 1 : 0;

                $_SESSION['task'] = 'Задача успешно изменена!';
                $db = new Db();
                $db->query(
                    "UPDATE tasks SET username=:username, email=:email, description=:description, status=:status WHERE id=$id",
                    ['username' => $username, 'email' => $email, 'description' => $description, 'status' => $status]
                );
                $this->view->redirect('/');
            }
            $_SESSION['task'] = 'Не все поля заполнены корректно!';
            $this->view->redirect($_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['login'] = 'Нет прав!!! Вы должны сначала авторизироваться';
            $this->view->redirect('/');
        }
    }
}

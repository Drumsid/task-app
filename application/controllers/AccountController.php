<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        $this->view->render('Регистрация');
    }

    public function dashboardAction()
    {
        $this->view->render('Админка');
    }

    public function checkLoginAction()
    {
        $db = new Db();
        $users = $db->row('SELECT login, password FROM users');
        if ($_POST['enter'] && checkLogin($users, $_POST)) {
                $_SESSION['admin'] = 'admin';
                $_SESSION['error'] = 'Welcome!';
                $this->view->redirect('/dashboard');
        } else {
            $_SESSION['error'] = 'Не верные данные!';
            $this->view->redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function createAction()
    {
        if (array_key_exists('reg', $_POST) && isNotEmpty($_POST)) {
            $login = clean($_POST['login']);
            $password = clean($_POST['password']);
            
            $db = new Db();
            $db->query("INSERT INTO users (login, password) VALUES(:login, :password)", ['login' => $login, 'password' => $password]);
            $this->view->redirect('/');
        }
        $this->view->redirect($_SERVER['HTTP_REFERER']);
    }

    public function logoutAction()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        $this->view->redirect('/');
    }
}

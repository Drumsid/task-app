<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

function niceDebug($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function stringCat($str)
{
    $res = '';
    $len = strlen($str);
    for ($i = 0; $i <  $len; $i++) {
        if ($str[$i] == '?') {
            return $res;
        }
        $res .= $str[$i];
    }
    return $res;
}
function clean($value)
{
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}

function isNotEmpty($post)
{
    foreach ($post as $value) {
        if (! strlen($value)) {
            return false;
        }
    }
    return true;
}

function checkLogin($dbData, $loginData)
{
    foreach ($dbData as ['login' => $login, 'password' => $password]) {
        if ($login == htmlspecialchars($loginData['login']) && $password == htmlspecialchars($loginData['password'])) {
            return true;
        }
    }
    return false;
}

function catParams($str)
{
    $res = '';
    $len = strlen($str);
    for ($i = 0; $i <  $len; $i++) {
        if ($str[$i] == '?') {
            return $res;
        }
        $res .= $str[$i];
    }
    return $res;
}

function isAdminUpdated($logsTable, $taskId)
{
    $result = array_filter($logsTable, function ($log) use ($taskId) {
        return $log['task_id'] === $taskId;
    });

    return (count($result) > 0) ? true : false;
}

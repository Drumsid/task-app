<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?= $title; ?></title>
    <style>
        .content {
            width: 100%;
            padding: 50px 30px;
        }
        
        .icons {
            font-size: 22px;
        }
        .wrapp-sort {
            display: flex;
            align-items: center;
            font-size: 17px;
            line-height: 0px;
            padding: 0 0 0px 0;
        }
        .block-arrow {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 5px;
        }
        .crutch {
            padding-bottom: 15px!important;
        }
        .pages {
            color: grey;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="container">
        <nav class="nav">
            <a class="nav-link" href="/">Главная</a>
            <?php

            if (!isset($_SESSION['admin'])) : ?>
                <a class="nav-link" href="/account/login">login</a>
            <?php endif; ?>
            <a class="nav-link" href="/task/create">Создать задачу</a>
            <?php

            if (isset($_SESSION['admin'])) : ?>
            <a class="nav-link" href="/dashboard">Админка</a>
            <?php endif; ?>
        </nav>
        <div class="row">
            
            <div class="content">
                <?= $content; ?>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>

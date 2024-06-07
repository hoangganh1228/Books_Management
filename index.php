<?php
    session_start();
    require_once('config.php');
    require_once('./models/connect.php');
    
    require_once('./models/functions.php');
    require_once('./models/database.php');
    require_once('./models/session.php');

    require_once('./controllers/add.controller.php');
    require_once('./controllers/delete.controller.php');
    require_once('./controllers/edit.controller.php');
    require_once('./controllers/search.controller.php');

    

    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }
    $path = 'views/books/';
    switch ($action) {
        case 'add':
            require_once($path.'add.php');
            break;
        case 'delete':
            require_once($path.'delete.php');
            break;
        case 'edit':
            require_once($path.'edit.php');
            break;
        case 'search':
            require_once($path.'search.php');
            break;
        default:
            require_once($path.'list.php');
            break;
    }


    
?>
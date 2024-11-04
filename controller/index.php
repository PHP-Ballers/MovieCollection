<?php
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

if ($action == 'movie_list') {
    include '../view/movie_list.php';
}

?>
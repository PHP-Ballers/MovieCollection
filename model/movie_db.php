<?php
require_once 'database.php';

function get_movie_list() {
    global $db;
    $query = 'SELECT * FROM 1000_movies';
    $statement = $db->prepare($query);
    $statement->execute();
    $movie_list = $statement->fetchAll();
    $statement->closeCursor();
    return $movie_list;
}

?>
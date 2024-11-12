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


function add_movie($poster_link, $series_title, $released_year, $certificate, $runtime, $genre, $imdb_rating,
$overview, $meta_score, $director, $star1, $star2, $star3, $star4, $no_of_votes, $gross, $id){
    global $db;
    $query = 'INSERT INTO 1000_movies
                (POSTER_LINK, SERIES_TITLE, RELEASED_YEAR, CERTIFICATE, RUNTIME, GENRE, IMDB_RATING, 
                 OVERVIEW, META_SCORE, DIRECTOR, STAR1, STAR2, STAR3, STAR4, NO_OF_VOTES, GROSS, ID)
                 VALUES(:poster_link, :series_title, :released_year, :certificate, :runtime, :genre, 
                        :imdb_rating, :overview, :meta_score, :director, :star1, :star2, :star3, 
                        :star4, :no_of_votes, :gross, :id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':poster_link', $poster_link);
    $statement->bindValue(':series_title', $series_title);
    $statement->bindValue(':released_year', $released_year);
    $statement->bindValue(':certificate', $certificate);
    $statement->bindValue(':runtime', $runtime);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':imdb_rating', $imdb_rating);
    $statement->bindValue(':overview', $overview);
    $statement->bindValue(':meta_score', $meta_score);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':star1', $star1);
    $statement->bindValue(':star2', $star2);
    $statement->bindValue(':star3', $star3);
    $statement->bindValue(':star4', $star4);
    $statement->bindValue(':no_of_votes', $no_of_votes);
    $statement->bindValue(':gross', $gross);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

?>

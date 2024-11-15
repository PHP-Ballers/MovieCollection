<?php
require_once 'database.php';
$records_per_page = 10;

function get_movie($id) {
    global $db;
    $query = 'SELECT * FROM 1000_movies WHERE ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $id);
    $statement->execute();
    $movie = $statement->fetch();
    $statement->closeCursor();
    return $movie;
}

function get_movie_list() {
    global $db;

    $query = 'SELECT * FROM 1000_movies';
    $statement = $db->prepare($query);
    $statement->execute();
    $movie_list = $statement->fetchAll();
    $statement->closeCursor();
    return $movie_list;
}

function paginate_movie_list() {
    global $db;
    global $records_per_page;
    #Initialize values for data pagination
    #$records_per_page = 12; #number of movies displayed per page
    $page = filter_input(INPUT_GET, 'page');  
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }

    if (!$page) {
        $page = '1'; #initialize to 1 if there is no current page
    }
    
    #$records_per_page = 1; #number of movies displayed per page
    $offset = (int)($page - 1) * $records_per_page;
    $total_records = $db->query("SELECT COUNT(*) FROM 1000_movies")->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);

    $sql = 'SELECT * FROM 1000_movies LIMIT :records_per_page OFFSET :offset';
    $statement = $db->prepare($sql);
    $statement->bindValue(':records_per_page', $records_per_page, PDO::PARAM_INT);
    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function calculate_total_pages() {
    global $db;
    global $records_per_page;
    $total_records = $db->query("SELECT COUNT(*) FROM 1000_movies")->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);
    return $total_pages;
}

function generatePaginationLinks($page, $total_pages, $action) {
    global $records_per_page;
    $output = '<div class="pagination">';

    // Previous Button
    if ($page > 1) {
        $output .= '<a href="?action='. $action . '&page=' . ($page - 1) . '">&laquo;</a>';
    }

    // First Page
    if ($page > 3) {
        $output .= '<a href="?action='. $action . '&page=1">1</a>';
        if ($page > 4) {
            $output .= '<span>...</span>';
        }
    }

    // Current and Nearby Pages
    for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
        if ($i == $page) {
            $output .= '<a class="active">' . $i . '</a>';
        } else {
            $output .= '<a href="?action=' . $action . '&page=' . $i . '">' . $i . '</a>';
        }
    }

    // Last Page
    if ($page < $total_pages - 2) {
        if ($page < $total_pages - 3) {
            $output .= '<span>...</span>';
        }
        $output .= '<a href="?action='. $action .'&page=' . $total_pages . '">' . $total_pages . '</a>';
    }

    // Next Button
    if ($page < $total_pages) {
        $output .= '<a href="?action='.$action . '&page=' . ($page + 1) . '">&raquo;</a>';
    }

    $output .= '</div>';
    return $output;
}



function add_movie($poster_link, $series_title, $released_year, $certificate, $runtime, $genre, $imdb_rating,
$overview, $meta_score, $director, $star1, $star2, $star3, $star4, $no_of_votes, $gross){
    global $db;
    $query = 'INSERT INTO 1000_movies
                (POSTER_LINK, SERIES_TITLE, RELEASED_YEAR, CERTIFICATE, RUNTIME, GENRE, IMDB_RATING, 
                 OVERVIEW, META_SCORE, DIRECTOR, STAR1, STAR2, STAR3, STAR4, NO_OF_VOTES, GROSS)
                 VALUES(:poster_link, :series_title, :released_year, :certificate, :runtime, :genre, 
                        :imdb_rating, :overview, :meta_score, :director, :star1, :star2, :star3, 
                        :star4, :no_of_votes, :gross)';
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
    $statement->execute();
    $statement->closeCursor();
}

function delete_movie($id) {
    global $db;
    $query= 'DELETE FROM 1000_movies WHERE ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $id);
    $statement->execute();
    $statement->closeCursor();
}

function edit_movie($poster_link, $series_title, $released_year, $certificate, $runtime, $genre, $imdb_rating,
$overview, $meta_score, $director, $star1, $star2, $star3, $star4, $no_of_votes, $gross, $id) {
    global $db;
    $query = 'UPDATE 1000_movies
              SET POSTER_LINK = :poster_link, SERIES_TITLE = :series_title, RELEASED_YEAR = :released_year, CERTIFICATE = :certificate, RUNTIME = :runtime, GENRE = :genre, 
                        IMDB_RATING = :imdb_rating, OVERVIEW = :overview, META_SCORE = :meta_score, DIRECTOR = :director, STAR1 = :star1, STAR2 = :star2, STAR3 = :star3, 
                        STAR4 = :star4, NO_OF_VOTES = :no_of_votes, GROSS = :gross
              WHERE ID = :id';

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

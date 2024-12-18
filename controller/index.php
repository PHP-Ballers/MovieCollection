<?php
require_once '../model/database.php';
require_once '../model/movie_db.php';

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

if ($action == 'movie_list_manager') {
    $search_query = filter_input(INPUT_GET, 'search_query'); // Capture the search query from the URL
    $movies = get_movie_list();
    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }

    if (!$page) {
        $page = '1'; #initialize to 1 if there is no current page
    }

    // Fetch the filtered movie list if there's a search query
    if ($search_query) {
        $limited_pages = paginate_movie_list($search_query); // Pass the search query to the paginate function
    } else {
        $limited_pages = paginate_movie_list(); // Fetch all movies if no search query is provided
    }


    #$limited_pages = paginate_movie_list(); #get movie_list in chunks for easier readability
    $total_pages = calculate_total_pages(); #get value for total number of pages for iteration in 'movie_list.php'
    $page_links = generatePaginationLinks($page, $total_pages, $action);
    include '../view/movie_list_manager.php';
}
else if ($action == 'show_add_movie_form') {
    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }

    include '../view/add_movie_form.php';
}
else if ($action == 'add_movie') {
   $poster_link = filter_input(INPUT_POST, 'poster_link');
   $series_title = filter_input(INPUT_POST, 'series_title');
   $released_year = filter_input(INPUT_POST, 'released_year', FILTER_VALIDATE_INT);
   $certificate = filter_input(INPUT_POST, 'certificate');
   $runtime = filter_input(INPUT_POST, 'runtime');
   $genre = filter_input(INPUT_POST, 'genre');
   $imdb_rating = filter_input(INPUT_POST, 'imdb_rating', FILTER_VALIDATE_FLOAT);
   $overview = filter_input(INPUT_POST, 'overview');
   $meta_score = filter_input(INPUT_POST, 'meta_score', FILTER_VALIDATE_INT);
   $director = filter_input(INPUT_POST, 'director');
   $star1 = filter_input(INPUT_POST, 'star1');
   $star2 = filter_input(INPUT_POST, 'star2');
   $star3 = filter_input(INPUT_POST, 'star3');
   $star4 = filter_input(INPUT_POST, 'star4');
   $no_of_votes = filter_input(INPUT_POST, 'no_of_votes', FILTER_VALIDATE_INT);
   $gross = filter_input(INPUT_POST, 'gross', FILTER_VALIDATE_INT);
   $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

   add_movie($poster_link, $series_title, $released_year, $certificate, $runtime, $genre, $imdb_rating, $overview,
      $meta_score, $director, $star1, $star2, $star3, $star4, $no_of_votes, $gross, $id);

   add_movie_genre_relationship($id);

   $page = filter_input(INPUT_GET, 'page'); 
   if(!$page) {
       $page = filter_input(INPUT_POST, 'page'); 
   }

   header("Location: .?action=movie_list_manager&page=$page");
}
else if ($action == 'delete_movie') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    delete_movie($id);

    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }

    header("Location: .?action=movie_list_manager&page=$page");
}
else if ($action == 'show_edit_movie') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $movie = get_movie($id);
    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }
    include '../view/edit_movie_form.php';
}
else if ($action == 'edit_movie') {
    $poster_link = filter_input(INPUT_POST, 'poster_link');
    $series_title = filter_input(INPUT_POST, 'series_title');
    $released_year = filter_input(INPUT_POST, 'released_year', FILTER_VALIDATE_INT);
    $certificate = filter_input(INPUT_POST, 'certificate');
    $runtime = filter_input(INPUT_POST, 'runtime');
    $genre = filter_input(INPUT_POST, 'genre');
    $imdb_rating = filter_input(INPUT_POST, 'imdb_rating', FILTER_VALIDATE_FLOAT);
    $overview = filter_input(INPUT_POST, 'overview');
    $meta_score = filter_input(INPUT_POST, 'meta_score', FILTER_VALIDATE_INT);
    $director = filter_input(INPUT_POST, 'director');
    $star1 = filter_input(INPUT_POST, 'star1');
    $star2 = filter_input(INPUT_POST, 'star2');
    $star3 = filter_input(INPUT_POST, 'star3');
    $star4 = filter_input(INPUT_POST, 'star4');
    $no_of_votes = filter_input(INPUT_POST, 'no_of_votes', FILTER_VALIDATE_INT);
    $gross = filter_input(INPUT_POST, 'gross', FILTER_VALIDATE_INT);
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    edit_movie($poster_link, $series_title, $released_year, $certificate, $runtime, $genre, $imdb_rating,
            $overview, $meta_score, $director, $star1, $star2, $star3, $star4, $no_of_votes, $gross, $id);

    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }    

    header("Location: .?action=movie_list_manager&page=$page");
}
else if ($action == 'movie_list_viewer') {
    $search_query = filter_input(INPUT_GET, 'search_query'); // Capture the search query from the URL
    $movies = get_movie_list();
    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }

    if (!$page) {
        $page = '1'; #initialize to 1 if there is no current page
    }

     // Fetch the filtered movie list if there's a search query
    if ($search_query) {
        $limited_pages = paginate_movie_list($search_query); // Pass the search query to the paginate function
    } else {
        $limited_pages = paginate_movie_list(); // Fetch all movies if no search query is provided
    }

    #$limited_pages = paginate_movie_list(); #get movie_list in chunks for easier readability
    $total_pages = calculate_total_pages(); #get value for total number of pages for iteration in 'movie_list.php'
    $page_links = generatePaginationLinks($page, $total_pages, $action);
    include '../view/movie_list_viewer.php';
}
else if($action == 'movie_viewer') {
    $id = filter_input(INPUT_GET, 'id'); 
    if(!$id) {
        $id = filter_input(INPUT_POST, 'id'); 
    }
    $movie = get_movie($id);
    $page = filter_input(INPUT_GET, 'page'); 
    if(!$page) {
        $page = filter_input(INPUT_POST, 'page'); 
    }

    #determines if the movie viewer is a manager or a viewer
    $prev_action = filter_input(INPUT_GET, 'prev_action');
    if(!$prev_action) {
        $prev_action = filter_input(INPUT_POST, 'prev_action');
    }

    include '../view/movie_viewer.php';
    
}

?>

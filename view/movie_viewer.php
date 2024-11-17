<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Information</title>

</head>
<body>

<div class="container">
    <div class="movie-header">
        <!-- Poster Image -->
        <img src="<?php echo $movie['POSTER_LINK'];?>" alt="Poster image of the movie <?php echo $movie['SERIES_TITLE'];?>">
        <h1><?php echo $movie['SERIES_TITLE'];?></h1>
        <p><?php echo $movie['OVERVIEW'];?></p>
    </div>

    <div class="movie-details">
        <div>
            <h3>Genre</h3>
            <p><?php echo $movie['GENRE']?></p>
        </div>
        <div>
            <h3>Actors</h3>
            <p><?php echo $movie['STAR1'] . ', ' . $movie['STAR2'] . ', ' . $movie['STAR3'] . ', ' . $movie['STAR4'];?></p>
        </div>
        <div>
            <h3>IMDb Rating</h3>
            <p><?php echo $movie['IMDB_RATING']?>/10</p>
        </div>
        <div>
            <h3>Gross Earnings</h3>
            <p><?php echo $movie['GROSS']?></p>
        </div>

        <div>
            <h3>Director</h3>
            <p><?php echo $movie['DIRECTOR']?></p>
        </div>
        <div>
            <h3>Release Year</h3>
            <p><?php echo $movie['RELEASED_YEAR']?></p>
        </div>
        <div>
            <h3>Certificate</h3>
            <p><?php echo $movie['CERTIFICATE']?></p>
        </div>

        <div>
            <h3>Number of Votes</h3>
            <p><?php echo $movie['NO_OF_VOTES']?></p>
        </div>
    </div>
</div>


<?php
/******************
* Determine if user is a manager or client in a simple way
*******************/

 if ($prev_action == 'movie_list_viewer') {?>
<p><a href="?action=movie_list_viewer&page=<?php echo $page;?>">View Movie Collection</a></p>
<?php } 
 else if ($prev_action == 'movie_list_manager') {?>
    <p><a href="?action=movie_list_manager&page=<?php echo $page;?>">View Movie Collection</a></p>
<?php }
else {
    echo 'Bad Hyperlink';
}
?>


</body>
</html>

<?php
    include_once 'footer.php';
?>
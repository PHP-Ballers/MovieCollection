<?php include 'header.php'; ?>
<body>
<header><h1>Update Movie In Catalog</h1></header>
<main>
    <h1>Edit Movie</h1>
    <form action="." method="post"
          id="edit_movie_form">
        <input type="hidden" name="action" value="edit_movie">

        <label>Poster Link</label>
        <input type="text" name="poster_link" value="<?php echo $movie['POSTER_LINK']?>"><br>

        <label>Series Title</label>
        <input type="text" name="series_title" value="<?php echo $movie['SERIES_TITLE']?>"><br>

        <label>Released Year</label>
        <input type="number" name="released_year" value="<?php echo $movie['RELEASED_YEAR']?>"><br>

        <label>Certificate</label>
        <input type="text" name="certificate" value="<?php echo $movie['CERTIFICATE']?>"><br>

        <label>Runtime (minutes)</label>
        <input type="text" name="runtime" value="<?php echo $movie['RUNTIME']?>"><br>

        <label>Genre</label>
        <input type="text" name="genre" value="<?php echo $movie['GENRE']?>"><br>

        <label>IMDB Rating</label>
        <input type="number" name="imdb_rating" value="<?php echo $movie['IMDB_RATING']?>"><br>

        <label>Overview</label>
        <input type="text" name="overview" value="<?php echo $movie['OVERVIEW']?>"><br>

        <label>Meta Score</label>
        <input type="number" name="meta_score" value="<?php echo $movie['META_SCORE']?>"><br>

        <label>Director</label>
        <input type="text" name="director" value="<?php echo $movie['DIRECTOR']?>"><br>

        <label>Star 1</label>
        <input type="text" name="star1" value="<?php echo $movie['STAR1']?>"><br>

        <label>Star 2</label>
        <input type="text" name="star2" value="<?php echo $movie['STAR2']?>"><br>

        <label>Star 3</label>
        <input type="text" name="star3" value="<?php echo $movie['STAR3']?>"><br>

        <label>Star 4</label>
        <input type="text" name="star4" value="<?php echo $movie['STAR4']?>"><br>

        <label>Number Of Votes</label>
        <input type="number" name="no_of_votes" value="<?php echo $movie['NO_OF_VOTES']?>"><br>

        <label>Gross</label>
        <input type="text" name="gross" value="<?php echo $movie['GROSS']?>"><br>

        <input type="hidden" name="id" value = "<?php echo $movie['ID']?>">

        <label> </label>
        <input type="submit" value="Update Movie"><br>
    </form>
    <p><a href="?action=movie_list_manager">View Movie Collection</a></p>
</main>
</body>
<?php include 'footer.php'; ?>

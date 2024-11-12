<?php include 'header.php'; ?>
<body>
<header><h1>Add Movie To Catalog</h1></header>
<main>
    <h1>Add Movie</h1>
    <form action="." method="post"
          id="add_movie_form">
        <input type="hidden" name="action" value="add_movie">

        <label>Poster Link</label>
        <input type="text" name="poster_link"><br>

        <label>Series Title</label>
        <input type="text" name="series_title"><br>

        <label>Released Year</label>
        <input type="number" name="released_year"><br>

        <label>Certificate</label>
        <input type="text" name="certificate"><br>

        <label>Runtime (minutes)</label>
        <input type="number" name="runtime"><br>

        <label>Genre</label>
        <input type="text" name="genre"><br>

        <label>IMDB Rating</label>
        <input type="number" name="imdb_rating"><br>

        <label>Overview</label>
        <input type="text" name="overview"><br>

        <label>Meta Score</label>
        <input type="number" name="meta_score"><br>

        <label>Director</label>
        <input type="text" name="director"><br>

        <label>Star 1</label>
        <input type="text" name="star1"><br>

        <label>Star 2</label>
        <input type="text" name="star2"><br>

        <label>Star 3</label>
        <input type="text" name="star3"><br>

        <label>Star 4</label>
        <input type="text" name="star4"><br>

        <label>Number Of Votes</label>
        <input type="number" name="no_of_votes"><br>

        <label>Gross</label>
        <input type="number" name="gross"><br>

        <label> </label>
        <input type="submit" value="Add Movie"><br>
    </form>
    <p><a href="?action=movie_list">View Movie Collection</a></p>
</main>
</body>
<?php include 'footer.php'; ?>

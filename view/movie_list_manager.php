<?php 
    include_once 'header.php';
    $prev_action = $action;

?>

<header><h2>Movie List Manager</h2></header>

<main>


<!--Search Form-->
    <form action="index.php" method="get">
        <input type="hidden" name="action" value="movie_list_manager"> <!-- Ensures that the form submits to the correct action -->
        <input type="text" name="search_query" placeholder="Search movies..." value="<?php echo isset($_GET['search_query']) ? $_GET['search_query'] : ''; ?>">
        <button type="submit">Search</button>

    </form>

    <?php
    #display page links
    echo $page_links;
    ?>
    <!--     Check if there are no movies found for the search query -->
    <?php if (empty($limited_pages)): ?>
        <p>No movies found for your search query.</p>
    <?php else: ?>
        <!--         Movie List Table -->
        <table class="table-dark">
            <th>POSTER</th>
            <th>SERIES_TITLE</th>
            <th>RELEASED_YEAR</th>
            <th>RUNTIME</th>
            <th>GENRE</th>
            <th>IMDB_RATING</th>
            <th>DIRECTOR</th>
            <th>GROSS</th>

            <?php foreach ($limited_pages as $movie): ?>
                <tr>
                    <td><img src="<?php echo $movie['POSTER_LINK']?>" alt="Poster image of the movie <?php echo $movie['SERIES_TITLE']?>"></td>
                    <td><?php echo $movie['SERIES_TITLE']; ?></td>
                    <td><?php echo $movie['RELEASED_YEAR']; ?></td>
                    <td><?php echo $movie['RUNTIME']; ?></td>
                    <td><?php echo $movie['GENRE']; ?></td>
                    <td><?php echo $movie['IMDB_RATING']; ?></td>
                    <td><?php echo $movie['DIRECTOR']; ?></td>
                    <td><?php echo $movie['GROSS']; ?></td>
                    <td><a href="?action=movie_viewer&id=<?php echo $movie['ID'];?>&page=<?php echo $page;?>&prev_action=<?php echo $prev_action ?>">More Info</a></td>
                    <td>
                        <form action='.' method='post'>
                            <input type="hidden" name="action" value="show_edit_movie">
                            <input type="hidden" name="page" value="<?php echo $page; ?>">
                            <input type="hidden" name="id" value="<?php echo $movie['ID'];?>">
                            <input type='submit' value='Edit'>
                        </form>
                    </td>
                    <td>
                        <form action='.' method='post'>
                            <input type="hidden" name="action" value="delete_movie">
                            <input type="hidden" name="page" value="<?php echo $page; ?>">
                            <input type="hidden" name="id" value="<?php echo $movie['ID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>


  
  <p><a href="index.php?action=show_add_movie_form&page=<?php echo $page ?>">Add Movie</a></p>
</main>




<?php include_once 'footer.php'?>

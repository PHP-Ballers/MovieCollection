<?php 
    include_once 'header.php';
?>

<header><h1>Movies</h1></header>

<main>
<?php
#display page links 
    echo $page_links;
?>

    <table>
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
                <td><img src="<?php echo $movie['POSTER_LINK']?>" alt="Poster image of the movie <?php echo $movie['SERIES_TITLE']?>">
                <td><?php echo $movie['SERIES_TITLE']; ?></td>
                <td><?php echo $movie['RELEASED_YEAR']; ?></td>
                <td><?php echo $movie['RUNTIME']; ?></td>
                <td><?php echo $movie['GENRE']; ?></td>
                <td><?php echo $movie['IMDB_RATING']; ?></td>
                <td><?php echo $movie['DIRECTOR']; ?></td>
                <td><?php echo $movie['GROSS']; ?></td>
                <td>
                <form action='.' method='post'>
					<input type="hidden" name="action" value="show_edit_movie">
					<input type="hidden" name="id" value=<?php echo $movie['ID']; ?> >
					<input type='submit' value='Edit'>
				</form>
                </td>
                <td>
				<form action='.' method='post'>
					<input type="hidden" name="action" value="delete_movie">
					<input type="hidden" name="id" value=<?php echo $movie['ID']; ?> >
					<input type="submit" value="Delete">
				</form>
			</td>
            </tr>
        <?php endforeach; ?>
    </table>
  <p><a href="index.php?action=show_add_movie_form">Add Movie</a></p>
</main>




<?php include_once 'footer.php'?>

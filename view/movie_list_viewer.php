<?php 
    include_once 'header.php';
?>

<main>
<?php
#display page links 
    echo $page_links;
?>

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
                <td><img src="<?php echo $movie['POSTER_LINK']?>" alt="Poster image of the movie <?php echo $movie['SERIES_TITLE']?>">
                <td><?php echo $movie['SERIES_TITLE']; ?></td>
                <td><?php echo $movie['RELEASED_YEAR']; ?></td>
                <td><?php echo $movie['RUNTIME']; ?></td>
                <td><?php echo $movie['GENRE']; ?></td>
                <td><?php echo $movie['IMDB_RATING']; ?></td>
                <td><?php echo $movie['DIRECTOR']; ?></td>
                <td><?php echo $movie['GROSS']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php
    include_once 'footer.php';
?>
<?php 
    include_once 'header.php';
?>



<header><h1>Movies</h1></header>
<main>
<?php
#display page links 
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?action=movie_list&page=$i'>$i</a> ";
    }
?>

    <table>
        <th>SERIES_TITLE</th>
        <th>RELEASED_YEAR</th>
        <th>RUNTIME</th>
        <th>GENRE</th>
        <th>IMDB_RATING</th>
        <th>DIRECTOR</th>
        <th>GROSS</th>


        <?php foreach ($limited_pages as $movie): ?>
            <tr>

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
  <p><a href="index.php?action=show_add_movie_form">Add Movie</a></p>
</main>




<?php include_once 'footer.php'?>

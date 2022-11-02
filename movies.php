<?php


$standard_query = "SELECT posterUrl, title, description, id
FROM movies";

$query = $standard_query;

if (isset($_POST['submitBtn'])) {
  $query = $standard_query;
}
if (isset($_POST['titleAscBtn'])) {
  $query = "  SELECT posterUrl, title, description FROM movies
ORDER BY title ASC";
}
if (isset($_POST['titleDescBtn'])) {
  $query = "SELECT posterUrl, title, description FROM movies
ORDER BY title DESC";
}
if (isset($_POST['releaseAscBtn'])) {
  $query = "SELECT posterUrl, title, description FROM movies
ORDER BY release_date ASC";
}
if (isset($_POST['releaseDescBtn'])) {
  $query = "SELECT posterUrl, title, description FROM movies
ORDER BY release_date DESC";
}
$conn = mysqli_connect('localhost', 'root', '', 'movie_bu');
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo '<pre>';
//var_dump($movies);
echo '</pre>';
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movies</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <?php require_once 'nav.html'; ?>

  <h1>Movies List</h1>

  <?php foreach ($movies as $movie) : ?>

    <p>
      <strong>Title : </strong>
      <?= $movie['title']; ?>
    </p>

    <p>
      <strong>Poster : </strong>
      <img src="<?= $movie['posterUrl']; ?>" width="200px">
    </p>

    <p class="description">
      <strong>Description : </strong>
      <?=
      $description = $movie['description'];
      $description = substr($description, 0, 30) . '...';
      echo  $description ?>
    </p>

    <a href="./movies-details.php?id=<?= $movie['id']; ?>">Detail page</a>
    <hr>
  <?php endforeach; ?>
  <form method="post">
    <input type="text" name="movie_title" placeholder="Title of movie"><br>
    <input type="Submit" name="submitBtn" value="Submit"><br>
    <input type="Submit" name="titleAscBtn" value="Title Asc"><br>
    <input type="Submit" name="titleDescBtn" value="Title Desc"><br>
    <input type="Submit" name="releaseAscBtn" value="Release Date Asc"><br>
    <input type="Submit" name="releaseDescBtn" value="Release Date Desc"><br>
  </form>
</body>

</html>
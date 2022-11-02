<?php

require_once 'database.php';

$query =
  "SELECT title, description, release_date, id, posterUrl
FROM movies
WHERE id = " . $_GET['id'];

// echo "query : " . $query;


$result = mysqli_query($conn, $query);
$movie = mysqli_fetch_assoc($result);
mysqli_close($conn);
foreach ($movies as $movie) ?>

<p>
  <strong>Movie id : </strong>
  <?= $movie['id']; ?>
</p>
<?php
$movie_id = $movie['id'];
//setcookie('movie_id', $movie['id'], time()+60);

if (isset($GET['addMovieToWatchlist'])) {

  $user_id = $_COOKIE['UserId'];


  $conn = mysqli_connect('localhost', 'root', '', 'movie_bu');
  $query = "INSERT INTO `watch_list` (`movie_id`, `user_id`) VALUES ('$movie_id', '$user_id');";
  $result = mysqli_query($conn, $query);

  if ($result)
    echo "Successful Insert";
  else
    echo "Error while Inserting";

  mysqli_close($conn);



  /*
  $conn = mysqli_connect('localhost', 'root', '', 'movie_bu');
  $query = "INSERT INTO `watch_list` (`movie_id`, `user_id`) VALUES ('$movie_id', '$user_id');";
  $result = mysqli_query($conn, $query);
*/

  if ($result)
    echo "Successful Insert";
  else
    echo "Error while Inserting";

  mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

















  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <?php require_once 'nav.html'; ?>

  <h1>Movie Details</h1>

  <p>
    <strong>Title : </strong>
    <?= $movie['title']; ?>
  </p>
  <p>
    <strong>Description : </strong>
    <?= $movie['description']; ?>
  </p>
  <p>
    <strong>Release date : </strong>
    <?= $movie['release_date']; ?>
  </p>

  <img src="<?= $movie['posterUrl']; ?>" width="200px">
  <hr>
  <form>
    <input type="Submit" name="addMovieToWatchlist" value="Add movie to watchlist"><br>
  </form>

</body>

</html>
<?php
$movie_id = '11';
$user_id = $_COOKIE['UserId'];


$conn = mysqli_connect('localhost', 'root', '', 'movie_bu');
$query = "INSERT INTO `watch_list` (`movie_id`, `user_id`) VALUES ('$movie_id', '$user_id');";
$result = mysqli_query($conn, $query);

if ($result)
echo "Successful Insert";
else
echo "Error while Inserting";

mysqli_close($conn);

// add this to account (add it to a "delete Movie" Button) Also add a list of all the movies on the watchlist to the account
SELECT * FROM watch_list WHERE user_id = user.id;

"DELETE FROM watch_list
WHERE movie_id = movie.id AND user_id = user.id";

?>
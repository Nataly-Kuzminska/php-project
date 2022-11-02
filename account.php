<>
  <form method="post">
    <input type="Submit" value="Log out" name="logoutBtn">
  </form>
  </head>

  <?php
  session_start();
  $user_id = $_COOKIE['UserId'];

  $query = 'SELECT * FROM watch_list WHERE user_id = $user_id';
  $conn = mysqli_connect('localhost', 'root', '', 'movie_bu');
  $result = mysqli_query($conn, $query);
  $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //echo '<pre>';
  //var_dump($movies);
  // echo '</pre>';
  mysqli_close($conn); ?>
  <ul>
    <?php foreach ($movies as $movie) : ?>
      <li>
        <?= $movie['title'] ?>
        <form method='post'>
          <input id=$id type="Submit" value="Delete Movie" name="delmovie">
        </form>
      </li>
    <? endforeach ?>
  </ul>

  <?php


  if (isset($_POST['delmovie'])) {
    "DELETE FROM watch_list
WHERE movie_id = movie.id AND user_id = user.id";
  }
  if (isset($_SESSION['email'])) {
    echo 'Welcome user, email : ' . $_SESSION['email'];
  } else {
    header("Location: login.php");
    exit();
  }

  // Click on logout0
  if (isset($_POST['logoutBtn'])) {
    unset($_SESSION['email']);
    header("Location: login.php");
    exit();
  }

<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    if (isset($_POST['InsertNewMovieBtn'])) {
        $errorsDetected = false;
        $errors = [
            'movieTitle' => 'movie title is mandatory<br>',
            'description' => 'movie description is mandatory<br>',
            'posterUrl' => 'posterUrl is mandatory<br>',
            'director_id' => 'Director is mandatory<br>',
        ];

        if (!empty($_GET['Director_id'])) {
            $director_id = $_GET['Director_id'];
        } else {
            $director_id = 1;
        }
        
        //$director_id = $_POST['Director_id'];
        $description = $_POST['Description'];
        $posterUrl = $_POST['PosterUrl'];
        $movieTitle = $_POST['MovieTitle'];
        $movieReleaseDate = $_POST['MovieReleaseDate'];


        $movieTitle = htmlspecialchars($movieTitle);
        $movieTitle = strip_tags($movieTitle);
        $description = htmlspecialchars($description);
        $description = strip_tags($description);
        $posterUrl = htmlspecialchars($posterUrl);
        $posterUrl = strip_tags($posterUrl);

        //Validations
        if (empty($movieTitle)) {
            echo $errors['movieTitle'];
            $errorsDetected = true;
        }
        if (empty($description)) {
            echo $errors['description'];
            $errorsDetected = true;
        }
        if (empty($posterUrl)) {
            echo $errors['posterUrl'];
            $errorsDetected = true;
        }

        if (!$errorsDetected) { // if no errors

            // now copy paste the code for entering new movie
            $conn = mysqli_connect('localhost', 'root', '', 'movie_bu');
            $query = "INSERT INTO movies (id, title, description, release_date, director_id, posterUrl) VALUES (NULL, '$movieTitle', '$description', '$movieReleaseDate', '$director_id', '$posterUrl')";
            $result = mysqli_query($conn, $query);

            if ($result)
                echo "Successful Insert";
            else
                echo "Error while Inserting";

            mysqli_close($conn);
        }
    }
    ?>
    <form method="POST">
        <div class="flex column form">
            <label for="MovieTitle">Title:</label>
            <input type="input" name="MovieTitle" placeholder="title" />
            <label for="PosterUrl">Poster</label>
            <input type="input" name="PosterUrl" placeholder="posterUrl" />
            <label for="MovieReleaseDate">Release date : </label>
            <input type="date" name="MovieReleaseDate" placeholder="" />
            <label for="Director_id">Director : </label>
            <select name="Director_id">
                <option value="Select">Select</option>}
                <option value="Vineet">James Cameron</option>
                <option value="Sumit">Jaume Collet-Serra</option>
                <option value="Dorilal">Adam Shankman</option>
                <option value="Omveer">Colin Trevorrow</option>
            </select>
            <textarea name="Description" placeholder="Description..."></textarea>
            <input type="Submit" name="InsertNewMovieBtn" value="Click to insert new movie" />
        </div>
    </form>
</body>

</html>
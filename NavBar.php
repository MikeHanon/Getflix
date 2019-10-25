<?php 

$user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/css/media/minicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <title>SeriesAddict</title>
</head>

<body>
<!-- NavBar -->

    <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
        <a class="navbar-brand" href="index.php">
            <img src="css/media/logo.gif">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Series TV</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Film
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="action.php">Action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="adventure.php">Adventure</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="comedy.php">Comedy</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="horror.php">Horror</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="thriller.php">Thriller</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="drama.php">Drama</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="family.php">Family</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="history.php">History</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="mistery.php">Mystery</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="romantic.php">Romantic</a>
        </div>
      </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" href="#">Recently Added</a>
                </li>
            </ul>

            <!-- Button Search -->

            <form class="form-inline ml- 2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
            </form>

            <!-- Button déroulant -->
            <li class="nav-item form-inline dropleft">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"></a>
                   <?php echo $user ;?>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Sign out</a>
                   

                </div>
                




        </div>
    </nav>

<script src="https://kit.fontawesome.com/75bed6266a.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>

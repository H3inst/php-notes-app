<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="public/css/main.css">
    <title>Notes App</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container"><a class="navbar-brand" href="home">Notes App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ml-auto">

                    <?php if (isset($_SESSION["isLogged"])) : ?>
                    <?php if ($_SESSION["isLogged"] == 1) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["user"] ?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="logout">Salir</a>
                        </div>
                    </li>
                    <?php endif ?>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>

                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    if (isset($_GET["page"])) {
        if ($_GET["page"] == "home") {
            include "pages/home.php";
        } else if ($_GET["page"] == "login") {
            include "pages/login.php";
        } else if ($_GET["page"] == "register") {
            include "pages/register.php";
        } else if ($_GET["page"] == "logout") {
            include "pages/logout.php";
        } else {
            include "pages/404.php";
        }
    } else {
        include "pages/home.php";
    }

    ?>
    <footer>
        <div class="mx-auto">
            <a href="" class="git-button" target="blank">
                <i class="fab fa-github fa-2x"></i>
            </a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>
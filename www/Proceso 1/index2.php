<?php session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
} else {
    // header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script defer src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" 
                            aria-expanded="false">Cruds</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item">Usuarios</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="secEncabezadoPagina" class="container-fluid">
        <div class="row">
            <div class="divLogoTipo col-lg-2 col-md-2 col-sm-10 ">
                <img src="./img/text.png" alt="" srcset="">
            </div>
            <div class="col-lg-8 col-md-8 d-none d-md-block">
                <!-- <img src="./img/text2.png" alt="" srcset="" >   -->
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 divLog">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="logout.php">';
                    echo '<img src="./img/logOut.png">';
                    echo '</a>';
                } else {
                    echo '<a href="logIn.php">';
                    echo '<img src="./img/logIn.png" alt="Imagen login">';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
    </section>
    <section id="secMenuPagina" class="container-fluid"></section>
    <section id="secContenidoPagina" class="container-fluid"></section>
</body>

</html>